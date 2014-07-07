<?php
$position = get_input('position');
$description= get_input('description');

$levelstatus_entry = new ElggObject();
$levelstatus_entry->subtype = 'levelslist';
$levelstatus_entry->title= $position;
$levelstatus_entry->description = $description;

$levelstatus_entry->access_id = ACCESS_PUBLIC;
$levelstatus_entry->owner_guid = elgg_get_logged_in_user_guid();

$levelstatus_entry_guid = $levelstatus_entry->save();

if ($levelstatus_entry_guid) {
   system_message("Your level was saved");
   forward($levelstatus_entry->getURL());
} 
else {
   register_error("The level could not be saved");
   forward(REFERER); 
}
