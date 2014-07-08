<?php
/**
 * get ElggUser object for current user
 */

elgg_register_event_handler('init', 'system', 'store_init');

/**
 * Initialize page handler and site menu item
 */
function store_init() {
    elgg_register_page_handler('store/all', 'store_page_handler');
    $item = new ElggMenuItem('Store', elgg_echo('Store'), 'store/all');
    elgg_register_menu_item('site', $item);
    /*order for admin*/
}
/**
 * save action. allows to save new entity
 */
elgg_register_action('store/order_approved', elgg_get_plugins_path() . 'store/actions/store/order_approved.php', 'admin');
/**
 * save action. allows to save new entity
 */
elgg_register_action('store/setorder', elgg_get_plugins_path() . 'store/actions/store/setorder.php', 'admin');

/**
 * save action. allows to save new entity
 */
elgg_register_action('store/save', elgg_get_plugins_path() . 'store/actions/store/save.php', 'admin');

/**
 * delete action. allows to delete entity
 */
elgg_register_action('store/delete', elgg_get_plugins_path() . 'store/actions/store/delete.php', 'admin');

/**
 * edit action. allows to update exist entity
 */
elgg_register_action('store/edit', elgg_get_plugins_path() . 'store/actions/store/edit.php', 'admin');

elgg_register_entity_url_handler('object', 'store', 'store_url');


/**
 * urls handler
 */
function store_page_handler($segments) {

    /**
     * add new status
     *
     * @route store/orders
     *
     * @return bool
     */
    if($segments[0] == 'orders') {
        include elgg_get_plugins_path() . 'store/pages/store/orders.php';
        return true;
    }

    /**
     * add new status
     *
     * @route store/add
     *
     * @return bool
     */
    if($segments[0] == 'add') {
        include elgg_get_plugins_path() . 'store/pages/store/add.php';
        return true;
    }

    /**
     * update status
     *
     * @route store/update
     *
     * @return bool
     */
    if($segments[0] == 'update') {
        set_input('guid', $segments[1]);
        include elgg_get_plugins_path() . 'store/pages/store/update.php';
        return true;
    }

    /**
     * list of all statuses
     *
     * @route store/all
     *
     * @return bool
     */
    if($segments[0] == 'all') {
        include elgg_get_plugins_path() . 'store/pages/store/all.php';
        return true;
    }

    /**
     * view object page
     *
     * @route store/view/<title>
     *
     * @return bool
     */
    if($segments[0] == 'view') {
        set_input('guid', $segments[1]);
        include elgg_get_plugins_path() . 'store/pages/store/view.php';
        return true;
    }

    /**
     * delete entity (status)
     *
     * @route store/delete/<guid>
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
                    $some[0]->getEntity()->delete();

            }
        }

        /**
         * delete entity
         * if success then redirect to the list page
         */
        if($enitity->delete()) {

            forward('store/all');
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
elgg_register_page_handler('store', 'store_page_handler');

# add menu to the top bar if is admin
if($user_object = get_loggedin_user()) {
    if($user_object->isAdmin()) {
        elgg_register_menu_item('topbar', array(
            'name' => 'store_top_link',
            'href' => 'store/all',
            'title' => 'Store list',
            'text' => 'Store manager'
        ));
        elgg_register_menu_item('topbar', array(
            'name' => 'store_orders_top_link',
            'href' => 'store/orders',
            'title' => 'Orders from store',
            'text' => 'Orders from store'
        ));
    }
}

function store_url($entity) {
	global $CONFIG;

	$title = $entity->title;
	$title = elgg_get_friendly_title($title);
	return $CONFIG->url . "store/view/" . $entity->getGUID() . "/" . $title;
}
