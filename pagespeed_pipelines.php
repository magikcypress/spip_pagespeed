<?php

/**
 * Pipeline pour Page Speed
 *
 * @plugin     Page Speed
 * @copyright  2014
 * @author     cyp
 * @licence    GNU/GPL
 * @package    SPIP\Page Speed\pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * Ajoute des scripts D3JS dans l'espace privé
 *
 * @param string $plugins 
 * @return string
**/
function pagespeed_d3js_plugins($plugins) {
	if (test_espace_prive()) {
		$plugins[] = 'gauge';
	}
	return $plugins;
}

/**
 * Ajoute les css pour pagespeed chargées dans le privé
 * 
 * @param string $flux Contenu du head HTML concernant les CSS
 * @return string       Contenu du head HTML concernant les CSS
 */
function pagespeed_header_prive_css($flux) {

	$css = find_in_path('css/pagespeed.css');
	$flux .= "<link rel='stylesheet' type='text/css' media='all' href='" . direction_css($css) . "' />\n";

	return $flux;
}

/**
 * Afficher page_speed milieu page site
 * @param array $flux
 * @return array
 */
function pagespeed_affiche_milieu($flux) {

	if (trouver_objet_exec($flux['args']['exec'] == 'site')) {
		$id_syndic = _request('id_syndic');

		$texte = recuperer_fond(
						'prive/squelettes/contenu/pagespeed',
						array(
							'id_syndic'=>$id_syndic
						)
		);

		if ($p=strpos($flux['data'], '<!--affiche_milieu-->')) {
			$flux['data'] = substr_replace($flux['data'], $texte, $p, 0);
		} else {
			$flux['data'] .= $texte;
		}
	}

	if (trouver_objet_exec($flux['args']['exec'] == 'configurer_identite')) {
		include_spip('inc/config');
		$id_syndic = lire_config('adresse_site');

		$texte = recuperer_fond(
						'prive/squelettes/contenu/pagespeed_identite',
						array(
							'id_syndic'=>$id_syndic
						)
		);

		if ($p=strpos($flux['data'], '<!--affiche_milieu-->')) {
			$flux['data'] = substr_replace($flux['data'], $texte, $p, 0);
		} else {
			$flux['data'] .= $texte;
		}
	}

	return $flux;
}

/**
 * Taches periodiques de pagespeed 
 *
 * @param array $taches_generales
 * @return array
 */
function pagespeed_taches_generales_cron($taches_generales) {
	$taches_generales['pagespeed'] = 24*3600;
	return $taches_generales;
}
