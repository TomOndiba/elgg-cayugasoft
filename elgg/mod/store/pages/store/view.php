<?php
/**
 * main entity
 */
$store= get_entity(get_input('guid'));

/**
 * create an empty sidebar
 */
$sidebar = '';

/**
 * registrate a new items in the sidebar
 */
$user=elgg_get_logged_in_user_entity();
if($user && $user->isAdmin())
{
    add_submenu_item('Remove store item', 'store/delete/' . $store->guid);
    add_submenu_item('Edit store item', 'store/update/' . $store->guid);
}

/**
 * add title to the body
 */
$body = elgg_view_title($store->title);

/**
 * add description to the body
 */
$body .= elgg_view('output/longtext', array(
    'value' => $store->description,
));

/**
 * add cost
 */
$body .= elgg_view('output/text', array(
    'value' => "Price: ".$store->price,
));

/**
 * add tags
 */
$body .= elgg_view('output/tags', array(
    'tags' => $store->tags,
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
