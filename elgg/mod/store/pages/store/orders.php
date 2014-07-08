<?php
/**
 * add item for adding new record to the sidebar
 */
$user=elgg_get_logged_in_user_entity();
if($user && $user->isAdmin())
{
    $orders = elgg_get_entities(array(
        'type' => 'object',
        'subtype' => 'store_order',
    ));
    $body = elgg_view('store/orders_list', array('items' => $orders));

    $sidebar = '';

    $body = elgg_view_layout('one_sidebar', array(
        'content'=>$body,
        'sidebar'=>$sidebar
    ));
    echo elgg_view_page('All store orders', $body);
}
else
{
    system_message("Only for admin users");
    forward("store/all");
}


