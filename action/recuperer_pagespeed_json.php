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
function action_recuperer_pagespeed_json_dist() {

	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();

	$site = sql_fetsel('id_syndic, url_site', 'spip_syndic', 'id_syndic=' . intval($arg));
	$result = pagespeed_attrape_google($site['url_site']);
	$json = json_encode($result, true);
	$dir_var = sous_repertoire(_DIR_VAR, 'pagespeed');

	ecrire_fichier($dir_var . 'pagespeed_' . intval($arg) . '.json', $json);
	sql_updateq('spip_syndic', array('score_pagespeed' => $result['score'], 'date_pagespeed' => date('Y-m-d H:i:s')), 'id_syndic=' . intval($arg));

	return true;

}
