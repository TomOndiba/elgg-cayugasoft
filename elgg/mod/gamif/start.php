<?php
/**
 * get ElggUser object for current user
 */

elgg_register_event_handler('init', 'system', 'gamif_init');

/**
 * Initialize page handler and site menu item
 */
function gamif_init() {
    elgg_extend_view('js/elgg', 'gamif/js');
    elgg_register_page_handler('gamif/', 'gamif_page_handler');
    $css_url = 'mod/gamif/views/default/css/styles.css';
    elgg_register_css('gamif', $css_url);
    elgg_load_css('gamif');
    $item = new ElggMenuItem('gamif', elgg_echo('gamif'), 'gamif/');
    elgg_register_menu_item('site', $item);
}

elgg_register_action('gamif/save', elgg_get_plugins_path() . 'gamif/actions/gamif/save.php', 'admin');

/**
 * edit action. allows to update exist entity
 */
elgg_register_action('gamif/', elgg_get_plugins_path() . 'gamif/actions/gamif/save.php', 'admin');

elgg_register_entity_url_handler('object', 'gamif', 'gamif_url');


/**
 * urls handler
 */
function gamif_page_handler($segments) {

    /**
     * add new status
     *
     * @route gamif/add
     *
     * @return bool
     */
    if($segments[0] == 'add') {
        include elgg_get_plugins_path() . 'gamif/pages/gamif/add.php';
        return true;
    }

    /**
     * update status
     *
     * @route gamif/update
     *
     * @return bool
     */
    if($segments[0] == 'update') {
        set_input('guid', $segments[1]);
        include elgg_get_plugins_path() . 'gamif/pages/gamif/update.php';
        return true;
    }

    if(empty($segments)) {
        include elgg_get_plugins_path() . 'gamif/pages/gamif/form.php';
        return true;
    }

    return false;
}
elgg_register_page_handler('gamif', 'gamif_page_handler');

# add menu to the top bar if is admin
if($user_object = get_loggedin_user()) {
    if($user_object->isAdmin()) {
        elgg_register_menu_item('topbar', array(
            'name' => 'gamif_top_link',
            'href' => 'gamif/',
            'title' => 'Gamification time',
            'text' => 'Gamification manager'
        ));
    }
}

function gamif_url($entity) {
	global $CONFIG;

	$title = $entity->title;
	$title = elgg_get_friendly_title($title);
	return $CONFIG->url . "gamif/";
}
