<?php
/**
 * make sure only logged in users see this page
 */
gatekeeper();

/**
 * add item to the sidebar for geting list of all entities
 */
$user=elgg_get_logged_in_user_entity();
if($user && $user->isAdmin())
    add_submenu_item('Show all store item', 'store/all');
else forward("store/all");
/**
 * get entity by guid
 */
$entity = get_entity(get_input('guid'));

/**
 * page title
 */
$title = 'Update "' . $entity->title . '"';

$content = elgg_view_title($title);
$content .= elgg_view_form('store/edit', array('enctype' => 'multipart/form-data'), array('entity_object'=>$entity));

$sidebar = '';

$body = elgg_view_layout('one_sidebar', array(
    'content' => $content,
    'sidebar' => $sidebar
));


echo elgg_view_page($title, $body);
