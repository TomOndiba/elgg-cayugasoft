<?php $entity = $vars['entity_object']; ?>

<div>
    <label><?php echo elgg_echo("title"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'title', 'value' => $entity->title)); ?>
</div>
 
<div>
    <label><?php echo elgg_echo("description"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'description', 'value' => $entity->description)); ?>
</div>
 
<div>
    <label><?php echo elgg_echo("tags"); ?></label><br />
    <?php echo elgg_view('input/tags',array('name' => 'tags', 'value' => $entity->tags)); ?>
</div>
    
    <?php echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $entity->guid)); ?>
 
<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('edit'))); ?>
</div>
