<?php
$title = get_input('title');
$description= get_input('description');
$tags= string_to_tag_array(get_input('tags'));
$guid = get_input('guid');

$levelstatus_entry = get_entity(get_input('guid'));
$levelstatus_entry->title = $title;
$levelstatus_entry->description = $description;
$levelstatus_entry->tags = $tags;

$levelstatus_entry_guid = $levelstatus_entry->save();

if ($levelstatus_entry_guid) {
   forward($levelstatus_entry->getURL());
} 
else {
   register_error("The level could not be saved");
   forward(REFERER); 
}
