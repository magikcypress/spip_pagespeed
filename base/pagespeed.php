<?php
/**
 * Base pour Page Speed
 *
 * @plugin     Page Speed
 * @copyright  2014
 * @author     cyp
 * @licence    GNU/GPL
 * @package    SPIP\Pagespeed\base
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

function pagespeed_declarer_tables_objets_sql($tables) {
	// On ajoute un champ score_pagespeed et statut_log dans spip_syndic
	$tables['spip_syndic']['field']['score_pagespeed'] = 'varchar(255) NOT NULL';
	$tables['spip_syndic']['field']['date_pagespeed'] = 'datetime NOT NULL';

	return $tables;
}
