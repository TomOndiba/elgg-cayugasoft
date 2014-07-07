<div>
    <label><?php echo elgg_echo("Position"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'position')); ?>
</div>
 
<div>
    <label><?php echo elgg_echo("description"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'description')); ?>
</div>
 
<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('save'))); ?>
</div>
