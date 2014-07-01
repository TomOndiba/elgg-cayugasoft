<?php
/**
 * add item for adding new record to the sidebar
 */
add_submenu_item('Add new badge', 'badge/add');

$entities = elgg_get_entities(array(
    'type' => 'object',
    'subtype' => 'badges',
));
$body = elgg_view('badge/entity_list', array('items' => $entities));

$sidebar = '';

$body = elgg_view_layout('one_sidebar', array(
    'content'=>$body,
    'sidebar'=>$sidebar
));
echo elgg_view_page('All Badges', $body);
