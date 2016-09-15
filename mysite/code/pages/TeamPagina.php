<?php

class TeamPagina extends Page
{
    private static $can_be_root = false;
    private static $can_create = false;

    private static $singular_name = 'Teampagina';
    private static $plural_name = 'Teampaginas';

    private static $db = array(
        'Title' => 'Varchar',
        'Teamcode' => 'Varchar',
        'Competitie' => 'MultiValueField'
    );

    private static $has_one = array(
        'Teamfoto' => 'Image'
    );

    private static $has_many = array(
        'Spelers' => 'Lid',
        'Coaches' => 'Lid',
        'Teamtaken' => 'Taak',
        'Traindata' => 'Traindata',
        'Wedstrijden' => 'Wedstrijden'
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab('Root.Main', 'Content');
        $fields->removeFieldFromTab('Root.Main', 'MenuTitle');
        $fields->removeByName('Metadata');

        if(Permission::check('ADMIN')){
            $fields->addFieldToTab('Root.Main',
                Textfield::create('Teamcode')
            );
        }


        $fields->addFieldToTab('Root.Main',
        $teamfotofield = UploadField::create('Teamfoto','Teamfoto uploaden')
        );

        $teamfotofield->setAllowedExtensions('png','jpg','gif','bmp','jpeg');
        $teamfotofield->setFolderName('teamfotos');
        $teamfotofield->getValidator()->setAllowedMaxFileSize(10*1024*1024); //10mb max


        $fields->addFieldToTab('Root.Competitie',
            MultiValueTextField::create('Competitie', 'Teams'));

        if ($this->ID) {
            $wedstrijdengrid = GridFieldConfig::create()->addComponents(
                new GridFieldToolbarHeader(),
                new GridFieldAddNewButton('toolbar-header-right'),
                new GridFieldSortableHeader(),
                new GridFieldDataColumns(),
                new GridFieldPaginator(20),
                new GridFieldEditButton(),
                new GridFieldDeleteAction(),
                new GridFieldDetailForm()
            );
            $traindatagrid = GridFieldConfig::create()->addComponents(
                new GridFieldToolbarHeader(),
                new GridFieldAddNewButton('toolbar-header-right'),
                new GridFieldSortableHeader(),
                new GridFieldDataColumns(),
                new GridFieldPaginator(20),
                new GridFieldEditButton(),
                new GridFieldDeleteAction(),
                new GridFieldDetailForm()
            );
            $rijschemagrid = GridFieldConfig::create()->addComponents(
                new GridFieldToolbarHeader(),
                new GridFieldAddNewButton('toolbar-header-right'),
                new GridFieldSortableHeader(),
                new GridFieldDataColumns(),
                new GridFieldPaginator(20),
                new GridFieldEditButton(),
                new GridFieldDeleteAction(),
                new GridFieldDetailForm()
            );

            $wedstrijdenField = singleton('Wedstrijden')->getCMSFields();
            $competitie = new ArrayList();
            foreach($this->Competitie->value as $team){
                $competitie->add($team);
            }
            $wedstrijdenField->addFieldsToTab(
                'Root.Main',array(
                    DropdownField::create('Thuisploeg','Thuis')->setSource($competitie)->setEmptyString('Selecteer een team'),
                    DropdownField::create('Uitploeg','Uit')->setSource($competitie)->setEmptyString('Selecteer een team'),
                    new HiddenField('TeamID','Team',$this->ID)
                )
            );

            $trainDatafield = singleton('Traindata')->getCMSFields();
            $trainDatafield->addFieldsToTab(
                'Root.Main',array(
                    new HiddenField('TeamID','Team',$this->ID)
                )
            );


            $WSBID = -1;
            foreach($this->Competitie->values as $key=>$compteam){
                if(strpos('WSB',$compteam) !== false){
                    $WSBID = $key;
                }
            }

            $rijschemafield = singleton('Rijschema')->getCMSFields();
            $rijschemafield->addFieldsToTab(
                'Root.Main',array(
                    new HiddenField('TeamID','Team',$this->ID),
                    DropdownField::create('WedstrijdID','Wedstrijd')->setSource(Wedstrijden::get()->filter(array('TeamID' => $this->ID,'Uitploeg' => $WSBID))->map('ID','getDropdownDisplay'))->setEmptyString('Selecteer een wedstrijd'),
                )
            );



            $wedstrijdengrid->getComponentByType('GridFieldDetailForm')->setFields($wedstrijdenField);
            $traindatagrid->getComponentByType('GridFieldDetailForm')->setFields($trainDatafield);
            $rijschemagrid->getComponentByType('GridFieldDetailForm')->setFields($rijschemafield);

            $trainDatafield = new GridField("Traindata", "Traindata", Traindata::get()->filter(array('TeamID' => $this->ID)), $traindatagrid);
            $wedstrijdenfield = new GridField("Wedstrijden", "Wedstrijden", Wedstrijden::get()->filter(array('TeamID' => $this->ID))->sort('Datum'), $wedstrijdengrid);
            $rijschemafield = new GridField("Rijschema", "Rijschema", Rijschema::get()->filter(array('TeamID' => $this->ID)), $rijschemagrid);

            $fields->addFieldToTab("Root.Wedstrijden", $wedstrijdenfield);
            $fields->addFieldToTab("Root.Traindata", $trainDatafield);
            $fields->addFieldToTab("Root.Rijschema", $rijschemafield);
        }


        return $fields;
    }

}

class TeamPagina_Controller extends Page_Controller
{
    public function index(SS_HTTPRequest $request){
        $spelers = Lid::get()->filter(array('Team' => $this->Teamcode));
        $rijschema = Rijschema::get()->filter(array('TeamID' => $this->ID));

        $taken = new Arraylist;
        $alleTaken = Taak::get();
        foreach($alleTaken as $taak){
            foreach($taak->Persoon->values as $key=>$persoon){
                if(Lid::get()->byID($persoon)->Team == $this->Teamcode){
                    $taken->add($taak);
                }
            }
        }
        $taken->removeDuplicates('ID');

        return array(
            'Rijschema' => $rijschema,
            'Spelers' => $spelers,
            'Taken' => $taken
        );
    }
}