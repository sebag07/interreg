<?php

namespace WPML\Import\Integrations\WPUltimateExporter;

use WPML\LIB\WP\Hooks;
use function WPML\FP\spreadArgs;
use WPML\Import\Integrations\Base\Languages;

class CountObjectsHooks implements \IWPML_Backend_Action, \IWPML_DIC_Action {
	use Languages;

	public function add_hooks() {
		Hooks::onFilter( 'get_terms_args' )->then( spreadArgs( [ $this, 'includeAllLanguagesInQuery' ] ) );
	}

}
