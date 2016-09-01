<?php

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

include_spip('pagespeed_fonctions');
include_spip('inc/flock');

/**
 * Récupérer le json de page speed dans un fichier json dant local/pagespeed
 * 
 * @param string $arg l'URL cible
 * @return string
 */
function action_recuperer_pagespeed_identite_json_dist() {

	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();

	$result = pagespeed_attrape_google($arg);
	$json = json_encode($result, true);
	$dir_var = sous_repertoire(_DIR_VAR, 'pagespeed');

	ecrire_fichier($dir_var . 'pagespeed.json', $json);

	return true;

}
