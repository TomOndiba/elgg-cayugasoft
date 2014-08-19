<?php

$title = get_input('title');
$description= get_input('description');
$tags= string_to_tag_array(get_input('tags'));
$cost= get_input('cost');
$guid = get_input('guid');

$badges_entry = get_entity(get_input('guid'));
$badges_entry->title = $title;
$badges_entry->description = $description;
$badges_entry->tags = $tags;
$badges_entry->cost = $cost;
$badges_entry_guid = $badges_entry->save();

if ($badges_entry_guid) {
   forward(badge_url($badges_entry));
} 
else {
   register_error("The badge could not be saved");
   forward(REFERER);
}
