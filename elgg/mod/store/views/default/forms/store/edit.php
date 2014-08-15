<?php $entity = $vars['entity_object']; ?>

<div>
    <label><?php echo elgg_echo("title"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'title', 'value' => $entity->title)); ?>
</div>

<div>
    <?php
    if(isset($entity->image_id))
    {
        $some=get_metadata_for_entity($entity->image_id);
        if($some[0]->getEntity()->exists())
            echo "<img src='".$vars['url'].'mod/file/thumbnail.php?file_guid='.$some[0]->getEntity()->getGuid().'&size=medium&icontime='.(int)$some[0]->getEntity()->getTimeCreated()."' />";
        else echo "file no exist";
    }
    else echo "file no exist";
    ?>
    <br />
    <label><?php echo elgg_echo("Image"); ?></label><br />
    <?php echo elgg_view('input/file', array('name' => 'img_upload','value' => $entity->image)); ?>
</div>

<div>
    <label><?php echo elgg_echo("description"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'description', 'value' => $entity->description)); ?>
</div>
 
<div>
    <label><?php echo elgg_echo("tags"); ?></label><br />
    <?php echo elgg_view('input/tags',array('name' => 'tags', 'value' => $entity->tags)); ?>
</div>

<div>
    <label><?php echo elgg_echo("Price"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'price', 'value' => $entity->price)); ?>
</div>

    <?php echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $entity->guid)); ?>

<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('edit'))); ?>
</div>
