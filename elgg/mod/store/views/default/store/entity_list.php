<ul>
    <?php foreach($vars['items'] as $entity):
        ?>
    <li>
        <div style="float:left;">
            <a href="<?php echo store_url($entity); ?>">
                <div style="float:left">
                <?php
                if(isset($entity->image_id))
                {
                    $some=get_metadata_for_entity($entity->image_id);
                    if($some[0]->getEntity()->exists())
                        echo "<img src='".$vars['url'].'mod/file/thumbnail.php?file_guid='.$some[0]->getEntity()->getGuid().'&size=small&icontime='.(int)$some[0]->getEntity()->getTimeCreated()."' />";
                    else echo "file no exist";
                }
                else echo "<img src='_graphics/icons/user/defaulttiny.gif'/>";?>
                </div>
                </a>
                <a href="<?php echo store_url($entity); ?>">
                    <h2 style="float:left;">&nbsp;<?php echo $entity->title; ?> </h2>
                </a>
                <br />
                <div>&nbsp;Price:&nbsp;<?php echo $entity->price; ?></div>
            <div style="clear:both"></div>
        </div>
        <div style="float:right">
        <?php
        $log_user=elgg_get_logged_in_user_entity ();
        if($log_user->guid)
        {
            /*search how mutch user have points*/
            $store_order=elgg_get_entities(array(
                'types' => 'object',
                'subtype' => 'user_badges',
                'limit' => false,
            ));
//            var_dump($store_order);
            $points=0;
            foreach($store_order as $badge)
            {
                if($badge->user_id==$log_user->guid)
                {
                    //считаем
                    $points_obj=get_entity($badge->badge_id);
                    $points+=$points_obj->cost;
                }
            }
            echo elgg_view_form('store/setorder', array(), array('entity'=>$entity,"user_points"=>is_null($log_user->points)?0:$log_user->points));
        }
        ?>
        </div>
        <div style="clear:both"></div>
    </li>
    <hr>
    <?php endforeach; ?>
</ul>
