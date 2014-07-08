<?php
$guid= get_input('guid');
$user_id= get_input('user');
$action=get_input('set_action_action');

if($action==="Add")
{
    $badges_user = new ElggObject();
    $badges_user->subtype = 'user_badges';
    $badges_user->user_id = $user_id;
    $badges_user->badge_id = $guid;
    $user_info=get_user($user_id);
    $badge_info=get_entity($guid);
    $user_info->points=(isset($user_info->points))?$user_info->points+$badge_info->cost:$badge_info->cost;
    $user_info->save(); //save pomts for user
    $badges_user->access_id = ACCESS_PUBLIC;
    $badges_user_guid = $badges_user->save();
    if($badges_user_guid)
    {
        system_message("Add");
        forward("badges/all");
    }
    else
    {
        register_error("The badges could not be saved");
        forward(REFERER);
    }
}
else
{
    /*get only this user with need badge*/
    $user_badges=elgg_get_entities(array(
        'types'=>'object',
        'subtypes' => 'user_badges',
    ));
    $flag=false;
    foreach($user_badges as $user_badge)
    {
        if($user_badge->user_id==$user_id && $guid==$user_badge->badge_id)
        {
            if($user_badge->delete())
            {
                $flag=true;
                break;
            }
        }
    }
    if($flag)
    {
            system_message("Deleted");
            forward("badges/all");
    }
    else
    {
        register_error("The badges for this user could not be deleted");
        forward(REFERER);
    }
}

