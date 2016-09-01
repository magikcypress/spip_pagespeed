<?php

/**
 * Administrations pour Page Speed
 *
 * @plugin     Page Speed
 * @copyright  2014
 * @author     cyp
 * @licence    GNU/GPL
 * @package    SPIP\Pagespeed\administrations
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * Installation/maj des tables pagespeed
 *
 * @param string $nom_meta_base_version
 * @param string $version_cible
 */
function pagespeed_upgrade($nom_meta_base_version, $version_cible) {
	
	$maj = array();

	$maj['create'] = array(
		// Ajout de champs dans spip_syndic
		array('maj_tables', array('spip_syndic'))
	);

	include_spip('base/upgrade');
	maj_plugin($nom_meta_base_version, $version_cible, $maj);
}

/**
 * Desinstallation/suppression des tables pagespeed
 *
 * @param string $nom_meta_base_version
 */
function pagespeed_vider_tables($nom_meta_base_version) {

	sql_alter('TABLE spip_syndic DROP COLUMN score_pagespeed');
	sql_alter('TABLE spip_syndic DROP COLUMN date_pagespeed');
	effacer_meta('pagespeed');
	effacer_meta($nom_meta_base_version);
}
