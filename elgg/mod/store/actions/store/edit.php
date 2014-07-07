<?php

$title = get_input('title');
$description= get_input('description');
$tags= string_to_tag_array(get_input('tags'));
$price= get_input('price');
$guid = get_input('guid');

$badges_entry = get_entity(get_input('guid'));
$badges_entry->title = $title;
$badges_entry->description = $description;
$badges_entry->tags = $tags;
$badges_entry->price = $price;
if(!empty($_FILES['img_upload']['tmp_name']))
{
//    if(!in_array($_FILES['img_upload']['type'] , array("image/jpeg","image/jpg","image/png","image/gif")))
//    {
//        register_error("The image could not be saved - wrong format");
//        forward(REFERER);
//    }
    //Make a file
    $file = new FilePluginFile();
    $file->subtype = "file";

    // if no title, grab filename
    if (empty($titolo))
        $titolo = htmlspecialchars($_FILES['img_upload']['name'], ENT_QUOTES, 'UTF-8');

    $file->title = $titolo;
    $file->description = "description file";
    $file->access_id = ACCESS_PUBLIC;
    $file->owner_guid = elgg_get_logged_in_user_guid();

    // we have a file upload, so process it
    if (isset($_FILES['img_upload']['name']) && !empty($_FILES['img_upload']['name']))
    {
        //Generate filename
        $prefix = "file/";
        $filestorename = elgg_strtolower(time().$_FILES['img_upload']['name']);
        $file->setFilename($prefix . $filestorename);
//Set Mimetype
        $mime_type = ElggFile::detectMimeType($_FILES['img_upload']['tmp_name'], $_FILES['img_upload']['type']);
        $file->setMimeType($mime_type);
//Set attributes
        $file->originalfilename = $_FILES['img_upload']['name'];
        $file->simpletype = file_get_simple_type($mime_type);
// Open the file to guarantee the directory exists
        $file->open("write");
        $file->close();
//Move file
        move_uploaded_file($_FILES['img_upload']['tmp_name'], $file->getFilenameOnFilestore());
//Save file
        $guid = $file->save();
        if($guid)
        {
            $badges_entry->image_id=$file->getGUID();
            $badges_entry_guid = $badges_entry->save();
        }

//Make thumbnails
        if ($guid && $file->simpletype == "image")
        {
            $file->icontime = time();
            $thumbnail = get_resized_image_from_existing_file($file->getFilenameOnFilestore(), 60, 60, true);
            if ($thumbnail)
            {
                $thumb = new ElggFile();
                $thumb->setMimeType($_FILES['img_upload']['type']);

                $thumb->setFilename($prefix."thumb".$filestorename);
                $thumb->open("write");
                $thumb->write($thumbnail);
                $thumb->close();

                $file->thumbnail = $prefix."thumb".$filestorename;
                unset($thumbnail);
            }

            $thumbsmall = get_resized_image_from_existing_file($file->getFilenameOnFilestore(), 153, 153, true);
            if ($thumbsmall)
            {
                $thumb->setFilename($prefix."smallthumb".$filestorename);
                $thumb->open("write");
                $thumb->write($thumbsmall);
                $thumb->close();
                $file->smallthumb = $prefix."smallthumb".$filestorename;
                unset($thumbsmall);
            }

            $thumblarge = get_resized_image_from_existing_file($file->getFilenameOnFilestore(), 600, 600, false);
            if ($thumblarge)
            {
                $thumb->setFilename($prefix."largethumb".$filestorename);
                $thumb->open("write");
                $thumb->write($thumblarge);
                $thumb->close();
                $file->largethumb = $prefix."largethumb".$filestorename;
                unset($thumblarge);
            }
        }
        if ($guid)
        {
            forward(store_url($badges_entry));
//            $message = elgg_echo("gallery:status:upsuccess");
//            system_message($message);
//            forward($guid->getURL());
        }
        else
        {
            register_error("The store item could not be saved");
            forward(REFERER);
        }
    }
}
else $badges_entry_guid = $badges_entry->save();

if ($badges_entry_guid) {
   forward(store_url($badges_entry));
} 
else {
   register_error("The store item could not be saved");
   forward(REFERER);
}
