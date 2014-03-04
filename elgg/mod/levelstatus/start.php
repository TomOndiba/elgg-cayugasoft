<?php
function initialize_plugin() {

}
elgg_register_event_handler('init', 'system', 'initialize_plugin');

elgg_register_action('levelstatus/save', elgg_get_plugins_path() . 'levelstatus/actions/levelstatus/save.php', 'admin');



function levelstatus_page_handler($segments) {
    if($segments[0] == 'add') {
        include elgg_get_plugins_path() . 'levelstatus/pages/levelstatus/add.php';
        return true;
    }
    if($segments[0] == 'all') {
        include elgg_get_plugins_path() . 'levelstatus/pages/levelstatus/all.php';
        return true;
    }

    return false;
}
elgg_register_page_handler('levelstatus', 'levelstatus_page_handler');

