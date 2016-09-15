<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	'type' => 'MySQLPDODatabase',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'SS_WSB',
	'path' => ''
);

global $dagen;
$dagen = array(
    '1' => 'Maandag',
    '2' => 'Dinsdag',
    '3' => 'Woensdag',
    '4' => 'Donderdag',
    '5' => 'Vrijdag',
    '6' => 'Zaterdag',
    '7' => 'Zondag',
);

global $dagenKort;
$dagenKort = array(
    '1' => 'Ma',
    '2' => 'Di',
    '3' => 'Wo',
    '4' => 'Do',
    '5' => 'Vr',
    '6' => 'Za',
    '7' => 'Zo',
);

global $maanden;
$maanden = array(
    '1' => 'Januari',
    '2' => 'Februari',
    '3' => 'Maart',
    '4' => 'April',
    '5' => 'Mei',
    '6' => 'Juni',
    '7' => 'Juli',
    '8' => 'Augustus',
    '9' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'December'
);



global $maandenKort;
$maandenKort = array(
    '1' => 'Jan',
    '2' => 'Feb',
    '3' => 'Mrt',
    '4' => 'Apr',
    '5' => 'Mei',
    '6' => 'Jun',
    '7' => 'Jul',
    '8' => 'Aug',
    '9' => 'Sep',
    '10' => 'Okt',
    '11' => 'Nov',
    '12' => 'Dec'
);



// Set the site locale
i18n::set_locale('nl_NL');
