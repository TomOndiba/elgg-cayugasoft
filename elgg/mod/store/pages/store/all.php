<?php
/**
 * add item for adding new record to the sidebar
 */
$user=elgg_get_logged_in_user_entity();
if($user && $user->isAdmin())
    add_submenu_item('Add new store item', 'store/add');

$entities = elgg_get_entities(array(
    'type' => 'object',
    'subtype' => 'store',
));
$body = elgg_view('store/entity_list', array('items' => $entities));

$sidebar = '';

$body = elgg_view_layout('one_sidebar', array(
    'content'=>$body,
    'sidebar'=>$sidebar
));
echo elgg_view_page('All store items', $body);
