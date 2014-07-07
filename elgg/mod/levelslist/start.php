<?php
/**
 * 
 */

function initialize_plugin() {
    elgg_extend_view('js/elgg', 'levelslist/js');
    elgg_register_page_handler('levelslist/all', 'levelslist_page_handler');

    $item = new ElggMenuItem('Levels list', elgg_echo('Levels list'), 'levelslist/all');
    elgg_register_menu_item('site', $item);
}

elgg_register_event_handler('init', 'system', 'initialize_plugin');

/**
 * save action. allows to save new entity
 */
elgg_register_action('levelslist/save', elgg_get_plugins_path() . 'levelslist/actions/levelslist/save.php', 'admin');

/**
 * delete action. allows to delete entity
 */
elgg_register_action('levelslist/delete', elgg_get_plugins_path() . 'levelslist/actions/levelslist/delete.php', 'admin');

/**
 * edit action. allows to update exist entity
 */
elgg_register_action('levelslist/edit', elgg_get_plugins_path() . 'levelslist/actions/levelslist/edit.php', 'admin');

elgg_register_entity_url_handler('object', 'levelslist', 'levelslist_url');


/**
 * urls handler
 */
function levelslist_page_handler($segments) {

    /**
     * add new status
     *
     * @route levelslist/add
     *
     * @return bool
     */
    if($segments[0] == 'add') {
        include elgg_get_plugins_path() . 'levelslist/pages/levelslist/add.php';
        return true;
    }

    /**
     * update status
     *
     * @route levelslist/update
     *
     * @return bool
     */
    if($segments[0] == 'update') {
        set_input('guid', $segments[1]);
        include elgg_get_plugins_path() . 'levelslist/pages/levelslist/update.php';
        return true;
    }

    /**
     * list of all statuses
     *
     * @route levelslist/all
     *
     * @return bool
     */
    if($segments[0] == 'all') {
        include elgg_get_plugins_path() . 'levelslist/pages/levelslist/all.php';
        return true;
    }

    /**
     * view object page
     *
     * @route levelslist/view/<title>
     *
     * @return bool
     */
    if($segments[0] == 'view') {
        set_input('guid', $segments[1]);
        include elgg_get_plugins_path() . 'levelslist/pages/levelslist/view.php';
        return true;
    }
    /**
     * delete entity (status)
     *
     * @route badge/delete/<guid>
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

            forward('levelslist/all');
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
elgg_register_page_handler('levelslist', 'levelslist_page_handler');


# add menu to the top bar if is admin
if($user_object = get_loggedin_user()) {
    if($user_object->isAdmin()) {
        elgg_register_menu_item('topbar', array(
            'name' => 'levelslist_top_link',
            'href' => 'levelslist/all',
            'title' => 'Levels list',
            'text' => 'Levels list'
        ));
    }
}

function levelslist_url($entity) {
	global $CONFIG;

	$title = $entity->title;
	$title = elgg_get_friendly_title($title);
	return $CONFIG->url . "levelslist/view/" . $entity->getGUID() . "/" . $title;
}
