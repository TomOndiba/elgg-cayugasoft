<div>
    <label><?php echo elgg_echo("title"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'title')); ?>
</div>

<div>
    <label><?php echo elgg_echo("Image"); ?></label><br />
    <?php echo elgg_view('input/file', array('name' => 'img_upload')); ?>
</div>

<div>
    <label><?php echo elgg_echo("description"); ?></label><br />
    <?php echo elgg_view('input/longtext',array('name' => 'description')); ?>
</div>
 
<div>
    <label><?php echo elgg_echo("tags"); ?></label><br />
    <?php echo elgg_view('input/tags',array('name' => 'tags')); ?>
</div>

<div>
    <label><?php echo elgg_echo("Price"); ?></label><br />
    <?php echo elgg_view('input/text',array('name' => 'price')); ?>
</div>

<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('save'))); ?>
</div>
