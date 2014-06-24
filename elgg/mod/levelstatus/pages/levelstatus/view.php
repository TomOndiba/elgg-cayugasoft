<?php
/**
 * main entity
 */
$status = get_entity(get_input('guid'));

/**
 * create an empty sidebar
 */
$sidebar = '';

/**
 * registrate a new item in the sidebar
 */
add_submenu_item('Remove status', 'levelstatus/add');

/**
 * add title to the body
 */
$body = elgg_view_title($status->title);

/**
 * add description to the body
 */
$body .= elgg_view('output/longtext', array(
    'value' => $status->description,
));

/**
 * add tags
 */
$body .= elgg_view('output/tags', array(
    'tags' => $status->tags,
));

/**
 * create page with 'one_sidebar' layout
 */
$body = elgg_view_layout('one_sidebar', array(
    'content' => $body,
    'sidebar' => $sidebar
));

/**
 * show page
 */
echo elgg_view_page('Entity view', $body);
