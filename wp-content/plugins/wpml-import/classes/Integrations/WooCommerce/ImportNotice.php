<?php

namespace WPML\Import\Integrations\WooCommerce;

use WPML\Import\Fields;
use WPML\FP\Lst;
use WPML\LIB\WP\Hooks;
use WPML\Import\Integrations\Base\Notice;
use function WPML\FP\spreadArgs;

class ImportNotice extends Notice {

	const NOTICE_ID = 'woocommerce-import';

	/**
	 * @return string
	 */
	protected function getId() {
		return self::NOTICE_ID;
	}

	/**
	 * @return callable
	 */
	protected function getDisplayCallback() {
		return [ HooksFactory::class, 'isOnImportPage' ];
	}

	/**
	 * @return string
	 */
	protected function getMessage() {
		return $this->getShopImportMessage();
	}

}
