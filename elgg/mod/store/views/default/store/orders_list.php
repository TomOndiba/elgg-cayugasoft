<ul>
    <?php
    foreach($vars['items'] as $entity):
        if($entity->hide==0)
        {
        ?>
    <li>
        <div style="float: left">
        <?php
        $user=get_user($entity->user_id);
        $store_order=elgg_get_entities(array(
            'types' => 'object',
            'subtype' => 'user_badges',
            'limit' => false,
        ));
        //            var_dump($store_order);
        $points=0;
        foreach($store_order as $badge)
        {
            if($badge->user_id==$user->guid)
            {
                //считаем
//                $points_obj=get_entity($badge->badge_id);
//                $points+=$points_obj->cost;
                $points=$user->points;
            }
        }
        echo "<div>User name: $user->name ($points points)</div>";
        $store_item=get_entity($entity->store_item);
        echo "<div>Store item: $store_item->title ($store_item->price points)</div>"
        ?>
        </div>
        <div style="float: right">
        <?php
            echo elgg_view_form('store/order_approved', array(), array('entity'=>$entity));
        ?>

        </div>
        <div style="clear:both"></div>
    </li>
    <hr>
    <?php } ?>
    <?php endforeach; ?>
</ul>
