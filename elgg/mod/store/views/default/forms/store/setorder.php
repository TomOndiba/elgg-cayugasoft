<?php $entity = $vars['entity'];
$user_points = $vars['user_points'];
?>
<?php echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $entity->guid)); ?>
<div style="float:left">
    <?php
    $store_order=elgg_get_entities(array(
        'types' => 'object',
        'subtype' => 'store_order',
        'limit' => false,
    ));
    $log_user=elgg_get_logged_in_user_entity ();
    $flag=false;
    foreach($store_order as $store_order_val)
    {

        $store_order_ent=get_entity($store_order_val->store_item);
        if($store_order_ent->guid==$entity->guid && $store_order_val->user_id==$log_user->guid)
        {

            if($store_order_val->hide==0 && $store_order_val->approved==0)
            {
               echo "<div>You already order this item, please wait</div>";
               $flag=true;
               break;
            }
        }
    }
    if($entity->price>$user_points)
    {
        echo "<div>You have only $user_points points</div>";
    }
    else
    {
        echo "<div>You have $user_points points</div>";
        if(!$flag)
        {
            echo elgg_view('input/submit',
                array(
                    'name' => 'order',
                    'value' => "Order"
                ));
        }
    }

    ?>
</div>