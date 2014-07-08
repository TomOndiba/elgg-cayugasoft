<?php
/**
 * Profile owner block
 */

$user = elgg_get_page_owner_entity();

if (!$user) {
	// no user so we quit view
	echo elgg_echo('viewfailure', array(__FILE__));
	return TRUE;
}

$icon = elgg_view_entity_icon($user, 'large', array(
	'use_hover' => false,
	'use_link' => false,
));

// grab the actions and admin menu items from user hover
$menu = elgg_trigger_plugin_hook('register', "menu:user_hover", array('entity' => $user), array());
$builder = new ElggMenuBuilder($menu);
$menu = $builder->getMenu();
$actions = elgg_extract('action', $menu, array());
$admin = elgg_extract('admin', $menu, array());

$profile_actions = '';
if (elgg_is_logged_in() && $actions) {
	$profile_actions = '<ul class="elgg-menu profile-action-menu mvm">';
	foreach ($actions as $action) {
		$profile_actions .= '<li>' . $action->getContent(array('class' => 'elgg-button elgg-button-action')) . '</li>';
	}
	$profile_actions .= '</ul>';
}

// if admin, display admin links
$admin_links = '';
if (elgg_is_admin_logged_in() && elgg_get_logged_in_user_guid() != elgg_get_page_owner_guid()) {
	$text = elgg_echo('admin:options');

	$admin_links = '<ul class="profile-admin-menu-wrapper">';
	$admin_links .= "<li><a rel=\"toggle\" href=\"#profile-menu-admin\">$text&hellip;</a>";
	$admin_links .= '<ul class="profile-admin-menu" id="profile-menu-admin">';
	foreach ($admin as $menu_item) {
		$admin_links .= elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
	}
	$admin_links .= '</ul>';
	$admin_links .= '</li>';
	$admin_links .= '</ul>';	
}

// content links
$content_menu = elgg_view_menu('owner_block', array(
	'entity' => elgg_get_page_owner_entity(),
	'class' => 'profile-content-menu',
));

$sDate1 = $user->day_count;
$sDate2 = date('Y-m-d H:i:s');
$difference_year = date_diff(new DateTime(), new DateTime($sDate1))->format("%Y");
$difference_month = date_diff(new DateTime(), new DateTime($sDate1))->format("%M");
$difference_days = date_diff(new DateTime(), new DateTime($sDate1))->format("%d");
$difference_hour = date_diff(new DateTime(), new DateTime($sDate1))->format("%H");
$difference_min = date_diff(new DateTime(), new DateTime($sDate1))->format("%i");
echo <<<HTML

<div id="profile-owner-block">
	$icon
	$profile_actions
	$content_menu
	$admin_links
	<table style="border:1px solid black;margin:5px 0;">
	<tr>
	    <td colspan="5" style="text-align:center;">Counter of days worked in the company</td>
	</tr>
	<tr>
	    <td style="border:1px solid black;text-align:center;">Year</td>
	    <td style="border:1px solid black;text-align:center;">Month</td>
	    <td style="border:1px solid black;text-align:center;">Days</td>
	    <td style="border:1px solid black;text-align:center;">Hour</td>
	    <td style="border:1px solid black;text-align:center;">Min</td>
	</tr>
	<tr>
        <td style="border:1px solid black;text-align:center;">$difference_year</td>
	    <td style="border:1px solid black;text-align:center;">$difference_month</td>
	    <td style="border:1px solid black;text-align:center;">$difference_days</td>
	    <td style="border:1px solid black;text-align:center;">$difference_hour</td>
	    <td style="border:1px solid black;text-align:center;">$difference_min</td>
	</tr>
	</table>
</div>

HTML;
