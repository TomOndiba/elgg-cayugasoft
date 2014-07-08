<?php $entity = $vars['entity'];?>
<?php echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $entity->guid)); ?>
<div style="float:left">
    <?php

    echo elgg_view('input/submit',
        array(
            'name' => 'approved',
            'value' => "Approved"
        ));
    echo elgg_view('input/submit',
        array(
            'name' => 'approved',
            'value' => "Reject"
        ));

    ?>
</div>