<?php

class Traindata extends DataObject
{
    private static $db = array(
        'Dag' => 'Varchar',
        'Tijd' => 'Varchar',
        'Adres' => 'Varchar'
    );

    private static $has_one = array(
        'Team' => 'TeamPagina'
    );


    private static $summary_fields = array(
        'Team.Title' => 'Team',
        'combineerDagEnTijd' => 'Data'
    );

    public function getDagByID($id){
        global $dagen;
        return $dagen[$id];
    }

    public function combineerDagEnTijd(){
        return $this->getDagByID($this->getField('Dag')).' om '.$this->getField('Tijd');
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        global $dagen;

        $fields->addFieldToTab('Root.Main',
            DropdownField::create('TeamID','Team')
                ->setSource(TeamPagina::get()->map('ID','Title'))->setEmptyString('Selecteer een team')
        ,'Dag');


        $fields->addFieldsToTab('Root.Main',array(
            DropdownField::create('Dag','Dag')->setSource($dagen),
            TextField::create('Tijd','Tijd'),
            TextField::create('Adres','Adres')
        ));
        return $fields;
    }
}