<?php
$title = get_input('title');
$description= get_input('description');
$tags= string_to_tag_array(get_input('tags'));

$levelstatus_entry = new ElggObject();
$levelstatus_entry->subtype = 'levelstatus';
$levelstatus_entry->title = $title;
$levelstatus_entry->description = $description;

$levelstatus_entry->access_id = ACCESS_PUBLIC;
$levelstatus_entry->owner_guid = elgg_get_logged_in_user_guid();
$levelstatus_entry->tags = $tags;

$levelstatus_entry_guid = $levelstatus_entry->save();

if ($levelstatus_entry_guid) {
   system_message("Your blog post was saved");
   forward($levelstatus_entry->getURL());
} 
else {
   register_error("The status could not be saved");
   forward(REFERER); 
}
