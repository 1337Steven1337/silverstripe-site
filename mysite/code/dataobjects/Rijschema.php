<?php

class Rijschema extends DataObject
{
    private static $singular_name = 'Rit';
    private static $plural_name = 'Rit';


    private static $db = array(
        'Bestuurders' => 'Varchar(500)',
    );

    private static $has_one = array(
        'Team' => 'Teampagina',
        'Wedstrijd' => 'Wedstrijden'
    );


    private static $summary_fields = array(
        'Wedstrijd.getDisplayDatum' => 'Datum',
        'Wedstrijd.WedstrijdNr' => 'Wedstrijd nummer',
        'Wedstrijd.getThuisTeam' => 'Thuis',
        'Wedstrijd.getUitTeam' => 'Uit',
        'Bestuurders' => 'Bestuurders'
    );
}