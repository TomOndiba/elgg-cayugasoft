<?php
/**
 * add item for adding new record to the sidebar
 */
add_submenu_item('Add new status', 'levelstatus/add');

$body = elgg_list_entities(array(
    'type' => 'object',
    'subtype' => 'levelstatus'
), 'elgg_get_entities', 'status_list_view');

$sidebar = '';

$body = elgg_view_layout('one_sidebar', array(
    'content'=>$body,
    'sidebar'=>$sidebar
));
echo elgg_view_page('All Level Statuses', $body);

function status_list_view($entities, $vars, $offset, $limit, $full_view, $list_type_toggle, $pagination) {
    return elgg_view('levelstatus/level_list', array('items' => $entities));
}
