<?php
$guid= get_input('guid');
$log_user=elgg_get_logged_in_user_entity ();
if($log_user->guid)
    $user_id=$log_user->guid;
else
{
    register_error("You must be logged");
    forward(REFERER);
}

$store_order = new ElggObject();
$store_order->subtype = 'store_order';
$store_order->user_id = $user_id;
$store_order->store_item = $guid;
$store_order->approved = 0;
$store_order->hide = 0;
$store_order->access_id = ACCESS_PUBLIC;
$store_order_guid = $store_order->save();
if($store_order_guid)
{
    system_message("Your order has been accepted");
    forward("store/all");
}
else
{
    register_error("The badges could not be saved");
    forward(REFERER);
}


