<?php
class LedenAdmin extends ModelAdmin {
    private static $managed_models = array(
      'Lid','Taak'
    );

    private static $menu_icon = 'framework/admin/images/menu-icons/16x16/community.png';
    private static $url_segment = 'Ledenadministratie';
    private static $menu_title = 'Ledenadministratie';
}
