<?php
class TeamsPagina extends Page
{
    private static $allowed_children = array('TeamPagina');
}

class TeamsPagina_Controller extends Page_Controller
{
    public function index(SS_HTTPRequest $request)
        {
            $teams = TeamPagina::get();
            return array(
                'Teams' => $teams
            );
        }
}