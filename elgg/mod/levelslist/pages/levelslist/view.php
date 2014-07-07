<?php
/**
 * main entity
 */
$levelslist = get_entity(get_input('guid'));

/**
 * create an empty sidebar
 */
$sidebar = '';

/**
 * registrate a new items in the sidebar
 */
add_submenu_item('Remove position', 'levelslist/delete/' . $levelslist->guid);
add_submenu_item('Edit position', 'levelslist/update/' . $levelslist->guid);

/**
 * add title to the body
 */
$body = elgg_view_title($levelslist->title);

/**
 * add description to the body
 */
$body .= elgg_view('output/longtext', array(
    'value' => $levelslist->description,
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
