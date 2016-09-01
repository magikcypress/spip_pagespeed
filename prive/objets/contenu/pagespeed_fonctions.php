<?php

/**
 * Pipeline pour Page Speed
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
 * Traiter les données pour les afficher dans un tableau
 *
 * @param string $href
 * @return array resultat
 */
function attrape_pagespeed($href) {

	$result = pagespeed_attrape_google($href);
	return $result;
}

/**
 * Traiter les données plus profonde
 *
 * @param string $texte
 * @return array resultat
 */
function pagespeed_tableau_pagestats($texte) {

	if (isset($texte)) {
		foreach ($texte as $cle => $valeur) {
			$pagestats[$cle] = $valeur;
		}
	}

	return $pagestats;
}
