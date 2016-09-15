<?php

class Wedstrijden extends DataObject
{
    private static $db = array(
        'WedstrijdNr' => 'Varchar',
        'Datum' => 'Date',
        'Thuisploeg' => 'Varchar',
        'Uitploeg' => 'Varchar',
        'Tijd' => 'Time',
        'Uitslag' => 'Varchar',
        'Scheids' => 'Varchar'
    );

    private static $has_one = array(
        'Team' => 'TeamPagina'
    );


    private static $summary_fields = array(
        'WedstrijdNr' => 'Wed. Nr',
        'Team.Title' => 'Team',
        'getDisplayDatum' => 'Datum',
        'getThuisTeam' => 'Thuis',
        'getUitTeam' => 'Uit',
        'Tijd' => 'Tijd',
        'Uitslag' => 'Uitslag',
        'Scheids' => 'Scheidsrechter'
    );

    public function getThuisTeam(){
        return TeamPagina::get()->byID($this->TeamID)->Competitie->values[$this->Thuisploeg];
    }

    public function getUitTeam(){
        return TeamPagina::get()->byID($this->TeamID)->Competitie->values[$this->Uitploeg];
    }

    public function getDisplayDatum(){
        return date_format(date_create($this->Datum),'d-m-Y');
    }

    public function getDropdownDisplay(){
        $volledigedatum = date_format(date_create($this->Datum),'d-m-Y');
        global $maanden;
        return date('j',strtotime($volledigedatum)).' '.$maanden[date('n',strtotime($volledigedatum))].'    |   '.TeamPagina::get()->byID($this->TeamID)->Competitie->values[$this->Thuisploeg] .' tegen '. TeamPagina::get()->byID($this->TeamID)->Competitie->values[$this->Uitploeg];
    }

    public function getDisplayTijd(){
        return str_split($this->Tijd,5)[0];
    }

    public function getVerhaaltje(){
        $verhaaltje = '';
        if(strpos('WSB',TeamPagina::get()->byID($this->TeamID)->Competitie->values[$this->Thuisploeg]) !== false){
            $verhaaltje .= '<i>thuis</i>';
        }else{
            $verhaaltje .= '<i>uit</i>';
        }
        $verhaaltje .= ' tegen '.TeamPagina::get()->byID($this->TeamID)->Competitie->values[$this->Uitploeg];
        return $verhaaltje;
    }


    public function getDatumNiceLang(){
        global $maanden;
        $volledigedatum = date_format(date_create($this->Datum),'d-m-Y');
        return date('j',strtotime($volledigedatum)).' '.$maanden[date('n',strtotime($volledigedatum))];
    }



    public function getCMSFields()
    {
        $fields =  parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', array(
        DateField::create('Datum'),
        DropdownField::create('TeamID','Team')->setSource(TeamPagina::get()->map('ID','Title'))->setEmptyString('Selecteer een team')
        ));

        return $fields;
    }

}