<?php

/**
 * Fonctions pour Pagespeed
 *
 * @plugin     pagespeed
 * @copyright  2014
 * @author     cyp
 * @licence    GNU/GPL
 * @package    SPIP\pagespeed\fonctions
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * Récupére les données depuis l'api google pageSpeed
 *
 * @param string $href
 * @return array resultat
 */
function pagespeed_attrape_google($href) {

	include_spip('inc/distant');
	$url_pagespeed = 'https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url=';
	$result = recuperer_url($url_pagespeed.$href);

	$json = json_encode($result, true);

	if ($result['status'] == 200) {

		if ($result['page']) {
			$json = json_decode($result['page'], true);
			$score = $json['score'];

			$pagestats = $json['pageStats'];

			if ($json['formattedResults']) {
				$minifycss = $json['formattedResults']['ruleResults']['MinifyCss']['ruleImpact'];
				$minifycss_msg = $json['formattedResults']['ruleResults']['MinifyCss']['urlBlocks'];
				$minifycss_msg = $minifycss_msg[0]['header']['format'];

				$minifyhtml = $json['formattedResults']['ruleResults']['MinifyHTML']['ruleImpact'];
				$minifyhtml_msg = $json['formattedResults']['ruleResults']['MinifyHTML']['urlBlocks'];
				$minifyhtml_msg = $minifyhtml_msg[0]['header']['format'];

				$minifyjavascript = $json['formattedResults']['ruleResults']['MinifyJavaScript']['ruleImpact'];
				$minifyjavascript_msg = $json['formattedResults']['ruleResults']['MinifyJavaScript']['urlBlocks'];
				$minifyjavascript_msg = $minifyjavascript_msg[0]['header']['format'];
			}

			$tableau = array('score' => $score,
				'pagestats' => $pagestats,
				'minifycss' => $minifycss,
				'minifycss_msg' => $minifycss_msg,
				'minifyhtml' => $minifyhtml,
				'minifyhtml_msg' => $minifyhtml_msg,
				'minifyjavascript' => $minifyjavascript,
				'minifyjavascript_msg' => $minifyjavascript_msg);
		}

	}

	return $tableau;
}
