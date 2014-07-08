<?php
/**
 * Test plugin
 *
 */

elgg_register_event_handler('init', 'system', 'test_init');

function test_init() {
    elgg_register_page_handler('test', 'test_page_handler');
//	elgg_extend_view('css/elgg', 'likes/css');
//	elgg_extend_view('js/elgg', 'likes/js');
//
//	// registered with priority < 500 so other plugins can remove likes
//	elgg_register_plugin_hook_handler('register', 'menu:river', 'likes_river_menu_setup', 400);
//	elgg_register_plugin_hook_handler('register', 'menu:entity', 'likes_entity_menu_setup', 400);
//
//	$actions_base = elgg_get_plugins_path() . 'likes/actions/likes';
//	elgg_register_action('likes/add', "$actions_base/add.php");
//	elgg_register_action('likes/delete', "$actions_base/delete.php");
}
function test_page_handler()
    {
        $params = array(
            'title' => 'Hello world!',
            'content' => 'This is my first plugin.',
            'filter' => '',
        );

        $body = elgg_view_layout('content', $params);

        echo elgg_view_page('Hello', $body);
    }