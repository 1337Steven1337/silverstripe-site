<?php
class HomePage extends Page
{

}

class HomePage_Controller extends Page_Controller
{
    public function index(SS_HTTPRequest $request){
        $aw = Wedstrijden::get()->exclude(array('Datum:LessThan'=> date('Y-m-d')))->limit(10,0)->sort('Datum');
        $paginatedwedstrijden = new PaginatedList($aw);
        $paginatedwedstrijden->setPageLength(2);


        $nieuws = BlogPost::get()->sort('ID');
        $paginatednieuwsartikelen = new PaginatedList($nieuws);
        $paginatednieuwsartikelen->setPageLength(4);


        return array(
          'AankomendeWedstrijden' => $paginatedwedstrijden,
          'NieuwsArtikelen' => $paginatednieuwsartikelen
        );
    }
}