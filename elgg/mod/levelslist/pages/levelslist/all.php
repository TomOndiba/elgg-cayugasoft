<?php
/**
 * add item for adding new record to the sidebar
 */
add_submenu_item('Add new item', 'levelslist/add');

$entities = elgg_get_entities(array(
    'type' => 'object',
    'subtype' => 'levelslist',
));

$body = elgg_view('levelslist/entity_list', array('items' => $entities));

$sidebar = '';

$body = elgg_view_layout('one_sidebar', array(
    'content'=>$body,
    'sidebar'=>$sidebar
));
echo elgg_view_page('All Level ', $body);
