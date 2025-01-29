<?php

namespace WPML\Import\Integrations\WooCommerce\ImportHooks;

use WPML\Import\Fields;
use WPML\Import\Integrations\WooCommerce\ImportHooks;
use WPML\LIB\WP\Hooks;
use WPML\FP\Fns;
use function WPML\FP\spreadArgs;

class Create extends ImportHooks {

	/**
	 * Temporary SKU replacement:
	 * _wpml_import_sku_{LANGUAGE_CODE}_{ORIGINAL_SKU}.
	 */
	const SKU_PLACEHOLDER          = '_wpml_import_sku_%s_%s';
	const SKU_PLACEHOLDER_PREFIX   = '_wpml_import_sku_';
	const TRANSLATION_SKU_META_KEY = '_wpml_import_wc_translation_sku';
	const SKU_META_KEY             = '_sku';
	const ORIGINAL_ID_META_KEY     = '_original_id';

	const PRODUCT_IMPORTING_STATUS = 'importing';

	public function add_hooks() {
		Hooks::onFilter( 'woocommerce_product_importer_parsed_data', 10, 2 )
			->then( spreadArgs( [ $this, 'prefixProductSku' ] ) );

		Hooks::onFilter( 'woocommerce_product_import_pre_insert_product_object', 10, 2 )
			->then( spreadArgs( [ $this, 'restoreProductSku' ] ) );
	}

	/**
	 * @param  array                $data
	 * @param  \WC_Product_Importer $wcProductCsvImporter
	 *
	 * @return array
	 */
	public function prefixProductSku( $data, $wcProductCsvImporter ) {
		$params = $wcProductCsvImporter->get_params();
		if ( $params['update_existing'] ) {
			return $data;
		}

		/**
		 * First identify the importing language code and translation group,
		 * and use that data to find out the importing row among the raw data.
		 */
		$originalSku = $data['sku'] ?? '';
		$metaData    = $data['meta_data'] ?? [];

		if ( empty( $metaData ) ) {
			return $data;
		}

		$language         = $this->getMetaValue( $metaData, Fields::LANGUAGE_CODE );
		$translationGroup = $this->getMetaValue( $metaData, Fields::TRANSLATION_GROUP );
		if ( empty( $language ) || empty( $translationGroup ) ) {
			return $data;
		}

		$this->setImportRowData( $translationGroup, $language, $wcProductCsvImporter );

		if ( false === $this->hasImportRow() ) {
			return $data;
		}

		if ( empty( $originalSku ) ) {
			return $this->manageRelatedProducts( $data, $language );
		}

		$currentId  = $data['id'] ?? false;
		$originalId = $this->getImportValue( __( 'ID', 'woocommerce' ) );
		$newSku     = $this->prefixValue( $originalSku, $language );
		$existingId = $this->getProductIdBySkuMeta( $newSku );

		$data['sku'] = $newSku;
		$data        = $this->manageRelatedProducts( $data, $language );

		if ( $existingId ) {
			$data['id'] = $this->completeProduct( $existingId, $newSku, $originalSku, $originalId );
			if ( $existingId === $currentId ) {
				return $data;
			}
			// There is a product that was processed for this SKU and language.
			// However, WC provides here another product with the processed SKU:
			// - it might have been created anew by the import flow.
			// - it might have been processed in a previous batch or call for the smae import process.
			// So we will remove any product with this SKU without a TRANSLATION_SKU_META_KEY value.
			$this->removeProductsBySkuMeta( $originalSku );
			return $data;
		}

		if ( $currentId && $originalId ) {
			$originalForCurrentId = get_post_meta( $currentId, self::ORIGINAL_ID_META_KEY, true );
			if ( $originalId === $originalForCurrentId ) {
				// This product was just created for the importing row:
				// Fill the missing pieces and move on.
				$data['id'] = $this->completeProduct( $currentId, $newSku, $originalSku, $originalId );
				return $data;
			}
		}

		// WC managed to find another product with the same original SKU:
		// create a dedicated one, plus remove all leftovers.
		$data['id'] = $this->createProduct( $newSku, $originalSku, $originalId );
		return $data;
	}

	/**
	 * @param  \WC_Product $object
	 * @param  array       $data
	 *
	 * @return \WC_Product
	 */
	public function restoreProductSku( $object, $data ) {
		$originalSku = $data['sku'] ?? '';
		$metaData    = $data['meta_data'] ?? [];
		if ( empty( $originalSku ) || empty( $metaData ) ) {
			return $object;
		}
		if ( 0 !== strpos( $originalSku, self::SKU_PLACEHOLDER_PREFIX ) ) {
			return $object;
		}

		$language = $this->getMetaValue( $metaData, Fields::LANGUAGE_CODE );
		if ( empty( $language ) ) {
			return $object;
		}

		$setRestoredSku = function() use ( &$object, $originalSku, $language ) {
			$restoredSku = str_replace(
				$this->prefixValue( '', $language ),
				'',
				$originalSku
			);
			$object->set_sku( $restoredSku );
		};
		Hooks::callWithFilter( $setRestoredSku, 'wc_product_has_unique_sku', Fns::always( false ) );

		return $object;
	}

	/**
	 * @param  string $value
	 * @param  string $language
	 *
	 * @return string
	 */
	private function prefixValue( $value, $language ) {
		return sprintf( self::SKU_PLACEHOLDER, $language, $value );
	}

	/**
	 * @param  int    $productId
	 * @param  string $newSku
	 * @param  string $originalSku
	 * @param  int    $originalId
	 *
	 * @return int
	 */
	private function completeProduct( $productId, $newSku, $originalSku, $originalId ) {
		$product = wc_get_product( $productId );
		if ( ! $product ) {
			return $productId;
		}

		global $wpdb;
		$wpdb->update( $wpdb->postmeta,
			[
				'meta_key'   => '_sku',
				'meta_value' => $newSku,
			],
			[
				'post_id'    => $productId,
				'meta_key'   => '_sku',
				'meta_value' => $originalSku,
			]
		);
		$insertMetaQuery  = "INSERT INTO {$wpdb->postmeta} (post_id, meta_key, meta_value ) VALUES ";
		$insertMetaQuery .= $wpdb->prepare(
			// phpcs:disable Squiz.Strings.DoubleQuoteUsage.NotRequired
			"( %d, %s, %s )",
			[ $productId, self::TRANSLATION_SKU_META_KEY, $newSku ]
		);
		$insertMetaQuery .= $wpdb->prepare(
			// phpcs:disable Squiz.Strings.DoubleQuoteUsage.NotRequired
			",( %d, %s, %s )",
			[ $productId, self::ORIGINAL_ID_META_KEY, $originalId ]
		);
		// phpcs:disable WordPress.WP.PreparedSQL.NotPrepared
		$wpdb->query( $insertMetaQuery );

		$product->read_meta_data( true );
		$product->apply_changes();

		return $productId;
	}

	/**
	 * @param  string    $newSku
	 * @param  string    $originalSku
	 * @param  int|false $originalId
	 *
	 * @return int
	 */
	private function createProduct( $newSku, $originalSku, $originalId = false ) {
		$product = wc_get_product_object( 'simple' );
		$product->set_name( 'Import placeholder for ' . $newSku );
		$product->set_status( self::PRODUCT_IMPORTING_STATUS );
		$product->set_sku( $newSku );
		if ( $originalId ) {
			$product->add_meta_data( self::ORIGINAL_ID_META_KEY, strval( $originalId ), true );
		}
		$product->add_meta_data( self::TRANSLATION_SKU_META_KEY, $newSku, true );
		$importedId = $product->save();
		$this->removeProductsBySkuMeta( $originalSku );
		return $importedId;
	}

	/**
	 * @param  string $originalValue
	 * @param  string $language
	 * @param  int    $processedValue
	 *
	 * @return int
	 */
	protected function manageSimpleRelatedProduct( $originalValue, $language, $processedValue ) {
		if ( ! $this->shouldUpdateRelatedFieldValue( $originalValue ) ) {
			return $processedValue;
		}
		$itemSku = $this->prefixValue( $originalValue, $language );
		$itemId  = $this->getProductIdBySkuMeta( $itemSku );
		if ( 0 !== $itemId ) {
			$this->removeProductsBySkuMeta( $originalValue );
			return $itemId;
		}
		$existingId = $this->getProductIdBySkuAndLanguage( $originalValue, $language );
		if ( 0 !== $existingId ) {
			return $existingId;
		}
		return $this->createProduct( $itemSku, $originalValue );
	}

	/**
	 * @param  string $languageSku
	 *
	 * @return int
	 */
	private function getProductIdBySkuMeta( $languageSku ) {
		global $wpdb;
		$productId = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = %s AND meta_value = %s LIMIT 1;", self::TRANSLATION_SKU_META_KEY, $languageSku ) );
		return (int) $productId;
	}

	/**
	 * @param string $sku
	 */
	private function removeProductsBySkuMeta( $sku ) {
		global $wpdb;
		$products = $wpdb->get_col(
			$wpdb->prepare(
				"
					SELECT DISTINCT psku.post_id
					FROM {$wpdb->postmeta} AS psku
					LEFT JOIN {$wpdb->postmeta} AS tsku
					ON psku.post_id = tsku.post_id AND tsku.meta_key = %s
					WHERE psku.meta_key = %s
					AND psku.meta_value = %s
					AND tsku.meta_value IS NULL
					LIMIT 1
				",
				[
					self::TRANSLATION_SKU_META_KEY,
					self::SKU_META_KEY,
					$sku,
				]
			)
		);
		array_walk( $products, function( $productId ) {
			$product = wc_get_product( $productId );
			if ( $product && self::PRODUCT_IMPORTING_STATUS === $product->get_status() ) {
				$product->delete( true );
			}
		} );
	}

}
