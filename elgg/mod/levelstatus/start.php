<?php
/**
 * get ElggUser object for current user
 */
$user_object = get_loggedin_user();

function initialize_plugin() {

}

elgg_register_event_handler('init', 'system', 'initialize_plugin');

elgg_register_action('levelstatus/save', elgg_get_plugins_path() . 'levelstatus/actions/levelstatus/save.php', 'admin');



/**
 * urls handler
 */
function levelstatus_page_handler($segments) {

    /**
     * add new status
     *
     * @route levelstatus/add
     *
     * @return bool
     */
    if($segments[0] == 'add') {
        include elgg_get_plugins_path() . 'levelstatus/pages/levelstatus/add.php';
        return true;
    }

    /**
     * list of all statuses
     *
     * @route levelstatus/all
     *
     * @return bool
     */
    if($segments[0] == 'all') {
        include elgg_get_plugins_path() . 'levelstatus/pages/levelstatus/all.php';
        return true;
    }

    return false;
}
elgg_register_page_handler('levelstatus', 'levelstatus_page_handler');



# add menu to the top bar if is admin
if($user_object->isAdmin()) {
    elgg_register_menu_item('topbar', array(
        'name' => 'levelstatus_top_link',
        'href' => 'levelstatus/all',
        'title' => 'List of statuses',
        'text' => 'level (statuses) list'
    ));
}

