<?php
/**
 * Page Speed
 *
 * @plugin	 Page Speed
 * @copyright  2014
 * @author	 cyp
 * @licence	GNU/GPL
 * @package	SPIP\genie\Pagespeed
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * Tâche de fond pour pagespeed
 *
 * @param string $t
 *
 */
function genie_pagespeed_dist($t) {

	// On limite le genie à l'adresse ip du serveur pour ne pas embêter les utilisateurs
	if ($_SERVER['REMOTE_ADDR'] == $_SERVER['SERVER_ADDR']) {

		include_spip('pagespeed_fonctions');
		include_spip('inc/flock');

		$site = sql_allfetsel('id_syndic, url_site', 'spip_syndic');
		foreach ($site as $valeur) {
			$result = pagespeed_attrape_google($valeur['url_site']);
			$json = json_encode($result, true);
			$dir_var = sous_repertoire(_DIR_VAR, 'pagespeed');
			ecrire_fichier($dir_var . 'pagespeed_' . intval($valeur['id_syndic']) . '.json', $json);
			sql_updateq('spip_syndic', array('score_pagespeed' => $result['score'], 'date_pagespeed' => date('Y-m-d H:i:s')), 'id_syndic=' . intval($valeur['id_syndic']));
		}

	}

	return false;

}
