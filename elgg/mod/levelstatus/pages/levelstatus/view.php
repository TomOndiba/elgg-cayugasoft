<?php
/**
 * main entity
 */
$status = get_entity(get_input('guid'));

/**
 * create empty sidebar
 */
$sidebar = '';

$body = elgg_view_title($status->title);

$body .= elgg_view('output/longtext', array(
    'value' => $status->description,
));

$body .= elgg_view('output/tags', array(
    'tags' => $status->tags,
));

$body = elgg_view_layout('one_sidebar', array(
    'content' => $body,
    'sidebar' => $sidebar
));

echo elgg_view_page('Entity view', $body);
