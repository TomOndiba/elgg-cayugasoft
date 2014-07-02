<?php $entity = $vars['entity'];
?>
<?php echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $entity->guid)); ?>
<div style="float:left">
    <?php
    $users=elgg_get_entities(array(
        'types' => 'user',
        'limit' => false,
    ));

    $userArray=array();
    foreach($users as $user)
    {
        $user_badges=elgg_get_entities(array(
            'types'=>'object',
            'subtypes' => 'user_badges',
            'wheres'=>array('guid'=>$entity->guid)
        ));
        $count=0;
        foreach($user_badges as $user_badge)
        {
            if($user->getGuid()==$user_badge->user_id)
                $count++;
        }
        $userArray[$user->getGuid()]=$user->get("name")."&nbsp;(".$count.")";
    }

    echo elgg_view('input/dropdown',
        array(
            'name' => 'user',
            'value' => null,
            'options_values'=>$userArray,
        ));
    ?>
</div>
<div style="float:left">
    <?php echo elgg_view('input/submit', array('name'=>"set_action_action",'value' => elgg_echo('Add'))); ?>
</div>
<div style="float:left">
    <?php echo elgg_view('input/submit', array('name'=>'set_action_action','value' => elgg_echo('Remove'))); ?>
</div>