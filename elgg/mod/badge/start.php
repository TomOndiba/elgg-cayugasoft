<?php
/**
 * get ElggUser object for current user
 */

//function initialize_plugin() {
//
//}
//
//elgg_register_event_handler('init', 'system', 'initialize_plugin');

/**
 * save action. allows to save new entity
 */
elgg_register_action('badge/save', elgg_get_plugins_path() . 'badge/actions/badge/save.php', 'admin');

/**
 * delete action. allows to delete entity
 */
elgg_register_action('badge/delete', elgg_get_plugins_path() . 'badge/actions/badge/delete.php', 'admin');

/**
 * edit action. allows to update exist entity
 */
elgg_register_action('badge/edit', elgg_get_plugins_path() . 'badge/actions/badge/edit.php', 'admin');

elgg_register_entity_url_handler('object', 'badge', 'badge_url');


/**
 * urls handler
 */
function badge_page_handler($segments) {

    /**
     * add new status
     *
     * @route badge/add
     *
     * @return bool
     */
    if($segments[0] == 'add') {
        include elgg_get_plugins_path() . 'badge/pages/badge/add.php';
        return true;
    }

    /**
     * update status
     *
     * @route badge/update
     *
     * @return bool
     */
    if($segments[0] == 'update') {
        set_input('guid', $segments[1]);
        include elgg_get_plugins_path() . 'badge/pages/badge/update.php';
        return true;
    }

    /**
     * list of all statuses
     *
     * @route badge/all
     *
     * @return bool
     */
    if($segments[0] == 'all') {
        include elgg_get_plugins_path() . 'badge/pages/badge/all.php';
        return true;
    }

    /**
     * view object page
     *
     * @route badge/view/<title>
     *
     * @return bool
     */
    if($segments[0] == 'view') {
        set_input('guid', $segments[1]);
        include elgg_get_plugins_path() . 'badge/pages/badge/view.php';
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
        if(isset($enitity->image_id))
        {
            $some=get_metadata_for_entity($enitity->image_id);
            if(!empty($some))
            {
                if($some[0]->getEntity()->exists())
                {
                    $some[0]->getEntity()->delete();
                }
            }
        }

        /**
         * delete entity
         * if success then redirect to the list page
         */
        if($enitity->delete()) {

            forward('badge/all');
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
elgg_register_page_handler('badge', 'badge_page_handler');

# add menu to the top bar if is admin
if($user_object = get_loggedin_user()) {
    if($user_object->isAdmin()) {
        elgg_register_menu_item('topbar', array(
            'name' => 'badge_top_link',
            'href' => 'badge/all',
            'title' => 'List of badges',
            'text' => 'Badges manager'
        ));
    }
}

function badge_url($entity) {
	global $CONFIG;

	$title = $entity->title;
	$title = elgg_get_friendly_title($title);
	return $CONFIG->url . "badge/view/" . $entity->getGUID() . "/" . $title;
}
