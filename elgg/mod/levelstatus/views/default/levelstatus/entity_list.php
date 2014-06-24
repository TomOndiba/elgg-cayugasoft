<ul>
    <?php foreach($vars['items'] as $entity): ?>
    <li><a href="<?php echo $entity->getUrl(); ?>"><h2> <?php echo $entity->title; ?> </h2></a></li>
    <hr>
    <?php endforeach; ?>
</ul>
