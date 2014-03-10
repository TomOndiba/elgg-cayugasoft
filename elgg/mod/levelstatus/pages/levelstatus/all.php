<?php
/**
 * add item for adding new record to the sidebar
 */
add_submenu_item('Add new status', 'levelstatus/add');

$body = elgg_list_entities(array(
    'type' => 'object',
    'subtype' => 'levelstatus'
));

$sidebar = '';

$body = elgg_view_layout('one_sidebar', array(
    'content'=>$body,
    'sidebar'=>$sidebar
));
echo elgg_view_page('All Level Statuses', $body);
