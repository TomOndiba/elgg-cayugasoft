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
    elgg_register_plugin_hook_handler('view', 'forms/useradd', 'user_add_template');
//    elgg_register_plugin_hook_handler('action', 'admin/useradd', 'useradd');
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
        /*job type select*/
        $job_typeArray=array("Developers","PM","Designer","QA","Sales managers");
        $str_to_insert='<div><label>';
        $str_to_insert.=elgg_echo("Job type");
        $str_to_insert.='</label><br />';
        $str_to_insert.=elgg_view('input/dropdown',
            array(
                'name' => 'job_type',
                'value' => null,
                'options_values'=>$job_typeArray,
            ));
        $str_to_insert.="</div>";
        /*job title */
        $titleArray=array("2"=>"Youngling","8"=>"Padawan","17"=>"Jedi","29"=>"Jedi Survivor","44"=>"Jedi Knight","56"=>"Master Jedi","68"=>"The Chosen One","80"=>"Yoda","104"=>"Darth Vader");
        $str_to_insert.='<div><label>';
        $str_to_insert.=elgg_echo("Title");
        $str_to_insert.='</label><br />';
        $str_to_insert.=elgg_view('input/dropdown',
            array(
                'name' => 'job_title',
                'value' => null,
                'options_values'=>$titleArray,
            ));
        $str_to_insert.="</div>";
        /*job level*/
        $levelArray=array("2"=>"Low","2"=>"Normal","2"=>"High");
        $str_to_insert.='<div><label>';
        $str_to_insert.=elgg_echo("Level");
        $str_to_insert.='</label><br />';
        $str_to_insert.=elgg_view('input/dropdown',
            array(
                'name' => 'job_title',
                'value' => null,
                'options_values'=>$levelArray,
            ));
        $str_to_insert.="</div>";
        $form=substr($returnvalue, 0, $before_reg_button) . $str_to_insert . substr($returnvalue, $before_reg_button);
        return $form;
    }
    return $returnvalue.var_dump($params);
//    $title = elgg_echo('adduser');
//    $body = elgg_view_form('useradd', array(), array('show_admin' => true));
//
//    return elgg_view_module('inline', $title, $body);
}