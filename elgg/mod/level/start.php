<?php
/**
 * Elgg level plugin
 *
 * @package ElggProfile
 */

elgg_register_event_handler('init', 'system', 'level_init');

/**
 * Level init function
 */
function level_init() {
    elgg_extend_view('css/elgg', 'level/css');
    elgg_extend_view('js/elgg', 'level/js');
    elgg_extend_view('js', 'level/js');
    elgg_register_plugin_hook_handler('view', 'forms/useradd', 'user_add_template');
    elgg_register_event_handler('create', 'user', 'creds_create_user');

//    elgg_register_plugin_hook_handler('action', 'admin/useradd', 'useradd');
}

function creds_create_user($event, $object_type, $object)
{
    if (($object) && ($object instanceof ElggUser))
    {
        $file = 'people.txt';
        $current = file_get_contents($file);
        $current .= print_r($event,true).print_r($object_type,true).print_r($object,true);
        $skils_entry = new ElggObject();
        $skils_entry ->subtype = 'level';
        $skils_entry ->was_flag=get_input('was_flag');
        $skils_entry ->work_count=get_input('work_count');
        $skils_entry ->job_type=get_input('job_type');
        $skils_entry ->job_title=get_input('job_title');
        $skils_entry ->level=get_input('level');
        $skils_entry ->user_id=$object->guid;
        $skils_entry ->start_month=get_input('start_month');
        $skils_entry->access_id = ACCESS_PUBLIC;
        $skils_entry->owner_guid = elgg_get_logged_in_user_guid();
        $skils_entry_quid=$skils_entry->save();
        if($skils_entry_quid)
        {
            $current .="saved";
        }
        else $current .="not saved";

        file_put_contents($file, $current);
    }

}
///**
// * Saves the site categories.
// *
// * @param type $hook
// * @param type $type
// * @param type $value
// * @param type $params
// */
//function useradd($hook, $type, $value, $params) {
//    $plugin_id = get_input('day_count');
//    die($plugin_id);
//    system_message(elgg_echo($plugin_id));
//    forward(REFERER);
//    if ($plugin_id != 'categories') {
//        return $value;
//    }
//
//    $categories = get_input('categories');
//    $categories = string_to_tag_array($categories);
//
//    $site = elgg_get_site_entity();
//    $site->categories = $categories;
//    system_message(elgg_echo("categories:save:success"));
//
////    elgg_delete_admin_notice('categories_admin_notice_no_categories');
//
//    forward(REFERER);
//}
/**
 * Saves the site categories.
 *
 * @param type $hook
 * @param type $type
 * @param type $returnvalue
 * @param type $params
 */
function user_add_template($hook, $type, $returnvalue, $params) {
    $before_reg_button=strpos($returnvalue, '<div class="elgg-foot">');
    if (false === $before_reg_button) {
        return '';
    }
    else
    {
        /*if user already worked */
        $str_to_insert='<div>
        <ul class="elgg-input-checkboxes elgg-vertical"><li><label>';

        $str_to_insert.=elgg_view('input/checkbox',array('name' => 'was_flag'));
        $str_to_insert.='User already work?</label></li></ul></div>';
        /*count from number*/
        $str_to_insert.='<div>
            <label>Count from number</label><br>';
        $str_to_insert.=elgg_view('input/text',array('name' => 'work_count',"readonly"=>"readonly","class"=>"elgg-input-text hasDatepicker","disabled"=>"disabled"));
        $str_to_insert.='</div>';


        /*job type select*/
        $job_typeArray=array("Developers"=>"Developers","PM"=>"PM","Designer"=>"Designer","QA"=>"QA","Sales managers"=>"Sales managers");
        $str_to_insert.='<div><label>';
        $str_to_insert.=elgg_echo("Job type");
        $str_to_insert.='</label><br />';
        $str_to_insert.=elgg_view('input/dropdown',
            array(
                'name' => 'job_type',
                'value' => null,
                'options_values'=>$job_typeArray,
            ));
        $str_to_insert.="</div>";
        /*job title*/
        $titleArray=array(
            "Developers"=>array("Youngling","Padawan","Jedi","Jedi Survivor","Jedi Knight","Master Jedi","The Chosen One","Yoda","Darth Vader"),
            "PM"=>array("Pixie","Tinker", "Bell","Nymph","Fairy","Djinni","Witch","Snow Queen","Cruella De Vil"),
            "Designer"=>array(),
            "QA"=>array("Gremlin","Elf","Leprechaun","Warlock","Whitelighter","Sorcerer","Triad","Merlin"),
            "Sales managers"=>array("male"=>array("Baron","Viscount","Earl","Marquess","Duke","Prince","King"),"female"=>array("Baroness","Viscountess","Countess","Marchioness","Duchess","Princess","Queen")));
        $str_to_insert.='<div><label>';
        $str_to_insert.=elgg_echo("Title");
        $str_to_insert.='</label><br />';
        $str_to_insert.=elgg_view('input/dropdown',
            array(
                'name' => 'job_title',
                'value' => null,
                'options_values'=>$titleArray['Developers'],
            ));
        $str_to_insert.="</div>";
        /*job level*/
        $levelArray=array("1"=>"Low","2"=>"Normal","3"=>"High");
        $str_to_insert.='<div><label>';
        $str_to_insert.=elgg_echo("Level");
        $str_to_insert.='</label><br />';
        $str_to_insert.=elgg_view('input/dropdown',
            array(
                'name' => 'level',
                'value' => null,
                'options_values'=>$levelArray,
            ));
        $str_to_insert.="</div>";
        /*start from month*/
        $str_to_insert.='<div><label>';
        $str_to_insert.=elgg_echo("Started month");
        $str_to_insert.='</label><br />';
        $start_month=array("0"=>"0","0.5"=>"0.5");
        for($i=1;$i<101;$i++)
            $start_month[$i]=$i;
        $str_to_insert.=elgg_view('input/dropdown',
            array(
                'name' => 'start_month',
                'value' => null,
                'options_values'=>$start_month,
            ));
        $str_to_insert.="</div>";
        $form=substr($returnvalue, 0, $before_reg_button) . $str_to_insert . substr($returnvalue, $before_reg_button);
//        $users=elgg_get_entities(array(
//            'types' => 'object',
//            'subtype'=>'level',
//            'wheres'=>array('user_id'=>'177'),
//            'limit'=>'1'
//
//        ));
//        if(count($users)>0 && isset($users[0]))
//        {
//            $form.=$users[0]->job_title;
//        }
        return $form;
    }
    return $returnvalue.var_dump($params);
//    $title = elgg_echo('adduser');
//    $body = elgg_view_form('useradd', array(), array('show_admin' => true));
//
//    return elgg_view_module('inline', $title, $body);
}