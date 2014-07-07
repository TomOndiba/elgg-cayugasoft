<?php $entity = $vars['entity_object']; ?>

<div>
    <label><?php echo elgg_echo("Position"); ?></label><br />
<?php
$levelslist=elgg_get_entities(array(
    'types'=>'object',
    'subtypes' => 'levelslist'
));
$array_need_fields=array();
$array_guid=array();
foreach($levelslist as $level)
{
    $array_guid[$level->guid]=$level->title;
    $array_need_fields[$level->title]=$level->title;
}
echo elgg_view('input/dropdown',
    array(
        'name' => 'position',
        'value' => $entity->title,
        'options_values'=>$array_need_fields,
    ));
?>
</div>
<div style="display: none;">
<?php echo elgg_view('input/dropdown',
array(
'name' => 'position_guid',
'value' => $entity->guid,
'options_values'=>$array_guid,
));
?>
</div>
<div>
    <label><?php echo elgg_echo("description"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'description', 'value' => $entity->description)); ?>
</div>

    
    <?php echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $entity->guid)); ?>
 
<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('edit'))); ?>
</div>
