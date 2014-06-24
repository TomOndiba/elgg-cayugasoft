<?php
/**
 * make sure only logged in users see this page
 */
gatekeeper();

/**
 * add item to the sidebar for geting list of all entities
 */
add_submenu_item('Show all statuses', 'levelstatus/all');

/**
 * page title
 */
$title = 'Add new Level';

$content = elgg_view_title($title);
$content .= elgg_view_form('levelstatus/save');

$sidebar = '';

$body = elgg_view_layout('one_sidebar', array(
    'content' => $content,
    'sidebar' => $sidebar
));


echo elgg_view_page($title, $body);
