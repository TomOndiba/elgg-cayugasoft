<?php
$position = get_input('position');
$description= get_input('description');
$guid = get_input('guid');

$levelstatus_entry = get_entity(get_input('guid'));
$levelstatus_entry->title = $position;
$levelstatus_entry->description = $description;

$levelstatus_entry_guid = $levelstatus_entry->save();

if ($levelstatus_entry_guid) {
   forward($levelstatus_entry->getURL());
} 
else {
   register_error("The level could not be saved");
   forward(REFERER); 
}
