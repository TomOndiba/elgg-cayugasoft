<?php
$guid= get_input('guid');
$action=get_input('approved');
$message="";
$store_order = get_entity($guid);
$store_order->hide = 1;
$store_order->access_id = ACCESS_PUBLIC;
if($action==="Approved")
{
    $user_point_update=get_user($store_order->user_id);
    $price=get_entity($store_order->store_item)->price;
    $user_point_update->points=$user_point_update->points-$price;
    $user_point_update->save();
    $store_order->approved = 1;
    $message="Order has been approved";
}
else
{
    $store_order->approved = 0;
    $message="Order has been rejected";
}
$store_order_guid = $store_order->save();
if($store_order_guid)
{
    system_message($message);
    forward("store/orders");
}
else
{
    register_error("Some error, please contact to the admin");
    forward(REFERER);
}


