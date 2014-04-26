<?php
/**
 * get ElggUser object for current user
 */

function initialize_plugin() {

}

elgg_register_event_handler('init', 'system', 'initialize_plugin');

elgg_register_action('levelstatus/save', elgg_get_plugins_path() . 'levelstatus/actions/levelstatus/save.php', 'admin');
elgg_register_action('levelstatus/delete', elgg_get_plugins_path() . 'levelstatus/actions/levelstatus/delete.php', 'admin');
elgg_register_action('levelstatus/edit', elgg_get_plugins_path() . 'levelstatus/actions/levelstatus/edit.php', 'admin');

elgg_register_entity_url_handler('object', 'levelstatus', 'levelstatus_url');


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
     * update status
     *
     * @route levelstatus/update
     *
     * @return bool
     */
    if($segments[0] == 'update') {
        set_input('guid', $segments[1]);
        include elgg_get_plugins_path() . 'levelstatus/pages/levelstatus/update.php';
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

    /**
     * view object page
     *
     * @route levelstatus/view/<title>
     *
     * @return bool
     */
    if($segments[0] == 'view') {
        set_input('guid', $segments[1]);
        include elgg_get_plugins_path() . 'levelstatus/pages/levelstatus/view.php';
        return true;
    }

    /**
     * delete entity (status)
     *
     * @route levestatus/delete/<guid>
     *
     * @return bool
     */
    if($segments[0] == 'delete') {

        /**
         * get entity by guid
         */
        $enitity = get_entity($segments[1]);

        /**
         * delete entity
         * if success then redirect to the list page
         */
        if($enitity->delete()) {
            forward('levelstatus/all');
            return true;
        }

        /**
         * if error then redirect user on the same page
         */
        else {
            forward(REFERER);
            return true;
        }
    }

    return false;
}
elgg_register_page_handler('levelstatus', 'levelstatus_page_handler');



# add menu to the top bar if is admin
if($user_object = get_loggedin_user()) {
    if($user_object->isAdmin()) {
        elgg_register_menu_item('topbar', array(
            'name' => 'levelstatus_top_link',
            'href' => 'levelstatus/all',
            'title' => 'List of statuses',
            'text' => 'level (statuses) list'
        ));
    }
}

function levelstatus_url($entity) {
	global $CONFIG;

	$title = $entity->title;
	$title = elgg_get_friendly_title($title);
	return $CONFIG->url . "levelstatus/view/" . $entity->getGUID() . "/" . $title;
}
