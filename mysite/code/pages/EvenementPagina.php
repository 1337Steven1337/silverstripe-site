<?php
class EvenementPagina extends ListPage
{
    private static $can_be_root = false;
    private static $can_create = false;

    private static $singular_name = 'Evenement';
    private static $plural_name = 'Evenementen';

    private static $db = array(
        'Title' => 'Varchar',
        'Description' => 'Varchar',
        'Datum' => 'Datetime',
        'ExperienceType' => 'Varchar',
        'StudentName' => 'Varchar',
        'StudentStudy' => 'Varchar',
        'StudentImage' => 'Varchar',
        'StudentImage_Description' => 'Text',
        'LinkedInURL' => 'Varchar'
    );

    private static $has_one = array(
        'Sector' => 'Sector',
        'StudentImage' => 'Image',
        'SliderImage' => 'Image',
        'InternshipLevelOfEducation' => 'LevelOfEducation'
    );

}
