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

function attrape_pagespeed($href) {

	$result = pagespeed_attrape_google($href);
	return $result;
}

function pagespeed_tableau_pagestats($texte) {

	if (isset($texte)) {
		foreach ($texte as $cle => $valeur) {
			$pagestats[$cle] = $valeur;
		}
	}

	return $pagestats;
}
