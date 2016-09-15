<?php
class EvenementenPagina extends ListPage
{
    private static $allowed_children = array( 'EvenementPagina');

}

class EvenementenPagina_Controller extends ListPage_Controller
{


    public function index(SS_HTTPRequest $request)
    {
        $experiences = EvenementPagina::get()->sort('Datum DESC');
        return array(
            'Results' => $experiences
        );
    }

}