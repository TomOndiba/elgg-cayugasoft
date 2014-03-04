<?php
$body = elgg_list_entities(array(
    'type' => 'object',
    'subtype' => 'levelstatus'
));

$body = elgg_view_layout('one_columnt', array('content'=>$body));
echo elgg_view_page('All Level Statuses', $body);
