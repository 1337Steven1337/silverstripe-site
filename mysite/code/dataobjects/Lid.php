<?php

class Lid extends DataObject
{
    private static $singular_name = 'Lid';
    private static $plural_name = 'Leden';


    private static $db = array(
        'WSBLidnr' => 'Int',
        'KNBSBLidnr' => 'Varchar(20)',
        'Voornaam' => 'Varchar(25)',
        'Tussenvoegsel' => 'Varchar(25)',
        'Achternaam' => 'Varchar(25)',
        'Team' => 'Varchar(10)',
        'Straat' => 'Varchar(50)',
        'Huisnr' => 'Varchar(6)',
        'Postcode' => 'Varchar(10)',
        'Plaats' => 'Varchar(25)',
        'TelHuis' => 'Varchar(25)',
        'TelMobiel' => 'Varchar(25)',
        'Email' => 'Varchar(50)'
    );


    private static $summary_fields = array(
        'WSBLidnr' => 'WSB Lidnr.',
        'KNBSBLidnr' => 'KNBSB Lidnr.',
        'getVolledigeNaam' => 'Naam',
        'Team' => 'Team',
        'getAdres' => 'Adres',
        'TelHuis' => 'Telefoon (Huis)',
        'TelMobiel' => 'Telefoon (Mobiel)',
        'Email' => 'E-mail'
    );

    public function getVolledigeNaam(){
        if($this->Tussenvoegsel){
            return $this->Voornaam.' '.$this->Tussenvoegsel.' '.$this->Achternaam;
        }else{
            return $this->Voornaam.' '.$this->Achternaam;
        }
    }

    private static $searchable_fields = array(
        'WSBLidnr',
        'KNBSBLidnr',
        'Voornaam',
        'Achternaam',
        'Team',
        'Straat',
        'Plaats',
        'Email'
    );

    public function getAdres(){
        return $this->Straat.' '.$this->Huisnr.'    '.$this->Postcode.'    '.$this->Plaats;
    }


    public function getCMSFields()
    {
        $fields =  parent::getCMSFields();

        $fields->addFieldToTab('Root.Main',DropdownField::create('Team')->setSource(TeamPagina::get()->map('Teamcode','Title')),'Straat');

        return $fields;
    }

}