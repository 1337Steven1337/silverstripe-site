<?php

class Taak extends DataObject
{
    private static $singular_name = 'Taak';
    private static $plural_name = 'Taken';

    private static $db = array(
        'Taakbeschrijving' => "Enum('Scheidsen,Kantinedienst')",
        'Datum' => 'Datetime',
        'Persoon' => 'MultiValueField'
    );

    private static $summary_fields = array(
        'getNiceDatumEnTijd' => 'Datum',
        'getAlleNamen' => 'Personen',
        'Taakbeschrijving' => 'Taakomschrijving'
    );

    public function getNiceDatumEnTijd(){
        $volledigedatum = date_format(date_create($this->Datum),'d-m-Y');
        global $maanden;
        return date('j',strtotime($volledigedatum)).' '.$maanden[date('n',strtotime($volledigedatum))].' '. date_format(date_create($this->Datum),'H:i');
    }


    public function getNiceDatum(){
        $volledigedatum = date_format(date_create($this->Datum),'d-m-Y');
        global $maanden;
        return date('j',strtotime($volledigedatum)).' '.$maanden[date('n',strtotime($volledigedatum))];
    }


    public function getNiceTijd(){
        $volledigedatum = date_format(date_create($this->Datum),'d-m-Y');
        global $maanden;
        return date_format(date_create($this->Datum),'H:i');
    }

    public function getAlleNamen(){
        $namen = "";
        $i = 0;
        $aantalnamen = count($this->Persoon->values);
        foreach($this->Persoon->values as $persoon){
            if($i < $aantalnamen - 1){
                $namen .= Lid::get()->byID($persoon)->getVolledigeNaam().', ';
            }else if ($i == $aantalnamen - 1){
                $namen .= Lid::get()->byID($persoon)->getVolledigeNaam();
            }
            $i++;
        }
        return $namen;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main',array(
            DropdownField::create('Taakbeschrijving')->setSource(singleton('Taak')->dbObject('Taakbeschrijving')->enumValues()),
            DatetimeField::create('Datum'),
            MultiValueDropdownField::create('Persoon','Personen')->setSource(Lid::get()->map('ID','getVolledigeNaam')->toArray())
        ));

        return $fields;
    }
}