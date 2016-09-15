<?php
class NieuwsberichtPagina extends Page
{
    private static $db = array(
        'Title' => 'Varchar(250)',
        'Description' => 'Varchar(4096)',
        'DatumGeplaatst' => 'Datetime',
        'DatumBeschikbaarTot' => 'Datetime',
    );

    private static $has_many = array(
      'Reacties' => 'Reactie'
    );
}

class NieuwsberichtPagina_Controller extends Page_Controller
{

}