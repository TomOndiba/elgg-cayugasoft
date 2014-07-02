<ul>
    <?php foreach($vars['items'] as $entity): ?>
    <li>
        <div style="float:left;">
            <a href="<?php echo badge_url($entity); ?>">
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
                <a href="<?php echo badge_url($entity); ?>">
                    <h2 style="float:left;">&nbsp;<?php echo $entity->title; ?> </h2>
                </a>
                <br />
                <div>&nbsp;Points:&nbsp;<?php echo $entity->cost; ?></div>
            <div style="clear:both"></div>
        </div>
        <?php
        $user=elgg_get_logged_in_user_entity();
        if($user && $user->isAdmin()) {
        ?>
        <div style="float: right">

            <?php

                echo elgg_view_form('badge/setbadge', array(), array('entity'=>$entity));
            ?>

        </div>
        <?php } ?>
        <div style="clear:both"></div>
    </li>
    <hr>
    <?php endforeach; ?>
</ul>
