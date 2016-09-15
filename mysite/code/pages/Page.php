<?php

class Page extends SiteTree
{

    private static $db = array();

    private static $has_one = array();

}

class Page_Controller extends ContentController
{

    //Add breadcrumbs to editprofilecontroller
    public function Breadcrumbs($maxDepth = 20, $unlinked = false, $stopAtPageType = false, $showHidden = false){
        if(strpos($this->Link(),'EditProfileController') !== false) {
            $breadcrumbs = parent::Breadcrumbs();
            $breadcrumbs .= 'Jouw gegevens';
            return $breadcrumbs;
        }else{
            return parent::Breadcrumbs();
        }
    }

    public function getDagByID($id){
        global $dagen;
        return $dagen[$id];
    }


    public function init()
    {
        parent::init();
        Requirements::css($this->ThemeDir() . "/static/css/bootstrap.css");
        Requirements::css($this->ThemeDir() . "/static/css/lightbox.css");
        Requirements::css($this->ThemeDir() . "/css/style.css");
        Requirements::css($this->ThemeDir() . "/css/styles.css");

        Requirements::javascript($this->ThemeDir() . "/static/js/jquery-3.1.0.min.js");
        Requirements::javascript($this->ThemeDir() . "/js/scripts.js");
        Requirements::javascript($this->ThemeDir() . "/static/js/bootstrap.js");
        Requirements::javascript($this->ThemeDir() . "/static/js/easing.js");
        Requirements::javascript($this->ThemeDir() . "/static/js/move-top.js");
        Requirements::javascript($this->ThemeDir() . "/static/js/responsiveslides.min.js");

    }

}