<?php
/**
 * main entity
 */
$badge= get_entity(get_input('guid'));

/**
 * create an empty sidebar
 */
$sidebar = '';

/**
 * registrate a new items in the sidebar
 */
add_submenu_item('Remove badge', 'badge/delete/' . $badge->guid);
add_submenu_item('Edit badge', 'badge/update/' . $badge->guid);

/**
 * add title to the body
 */
$body = elgg_view_title($badge->title);

/**
 * add description to the body
 */
$body .= elgg_view('output/longtext', array(
    'value' => $badge->description,
));

/**
 * add tags
 */
$body .= elgg_view('output/tags', array(
    'tags' => $badge->tags,
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
