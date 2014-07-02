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
    $badges_user->access_id = ACCESS_PUBLIC;
    $badges_user_guid = $badges_user->save();
    if($badges_user_guid)
    {
        system_message("Add");
        forward("badge/all");
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
        'wheres'=>array('guid'=>$quid)
    ));
    $flag=false;
    foreach($user_badges as $user_badge)
    {
        if($user_badge->user_id==$user_id)
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
            forward("badge/all");
    }
    else
    {
        register_error("The badges for this user could not be deleted");
        forward(REFERER);
    }
}

