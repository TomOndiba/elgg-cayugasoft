<?php
$trainee = get_input('trainee');
$junior = get_input('junior');
$junior_middle = get_input('junior_middle');
$middle = get_input('middle');
$middle_senior = get_input('middle_senior');
$senior = get_input('senior');
$senior_lead = get_input('senior_lead');
$lead = get_input('lead');
$tech_officer=get_input('tech_officer');
$total_array=array($trainee,$junior,$junior_middle,$middle,$middle_senior,$senior,$senior_lead,$lead,$tech_officer);
$flag_error_count=0;
for($i=0;$i<count($total_array);$i++)
{
    if(isset($total_array[$i]['guid']))
        $gamif_entry =get_entity($total_array[$i]['guid']);
    else $gamif_entry = new ElggObject();
    $gamif_entry ->subtype = 'gamif';
    $gamif_entry ->title = $total_array[$i]['level'];
    $gamif_entry ->description = $total_array[$i]['level'];
    $gamif_entry ->smart_month1 = $total_array[$i]['smart_month1'];
    $gamif_entry ->smart_month2 = $total_array[$i]['smart_month2'];
    $gamif_entry ->smart_month3 = $total_array[$i]['smart_month3'];
    $gamif_entry ->access_id = ACCESS_PUBLIC;

    $gamif_entry ->owner_guid = elgg_get_logged_in_user_guid();
    $gamif_entry_guid = $gamif_entry->save();
    if(!$gamif_entry_guid ) $flag_error_count++;
}
if ($flag_error_count==0) {

        system_message("Your edits was saved");
        forward(gamif_url($gamif_entry));
    }
    else {
        register_error("Some records not saved");
        forward(REFERER);
    }

