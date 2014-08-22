<?php
/**
 * Elgg add user form.
 *
 * @package Elgg
 * @subpackage Core
 * 
 */

$name = $username = $email = $password = $password2 = $admin = $day_count= $was_flag=$work_count=$job_type=$job_title=$level=$start_month='';

if (elgg_is_sticky_form('useradd')) {
	extract(elgg_get_sticky_values('useradd'));
	elgg_clear_sticky_form('useradd');
	if (is_array($admin)) {
		$admin = $admin[0];
	}
}

?>
<div>
	<label><?php echo elgg_echo('name');?></label><br />
	<?php
	echo elgg_view('input/text', array(
		'name' => 'name',
		'value' => $name,
	));
	?>
</div>
<div>
	<label><?php echo elgg_echo('username'); ?></label><br />
	<?php
	echo elgg_view('input/text', array(
		'name' => 'username',
		'value' => $username,
	));
	?>
</div>
<div>
	<label><?php echo elgg_echo('email'); ?></label><br />
	<?php
	echo elgg_view('input/text', array(
		'name' => 'email',
		'value' => $email,
	));
	?>
</div>
<div>
	<label><?php echo elgg_echo('password'); ?></label><br />
	<?php
	echo elgg_view('input/password', array(
		'name' => 'password',
		'value' => $password,
	));
	?>
</div>
<div>
	<label><?php echo elgg_echo('passwordagain'); ?></label><br />
	<?php
	echo elgg_view('input/password', array(
		'name' => 'password2',
		'value' => $password2,
	));
	?>
</div>
<div>
    <label><?php echo elgg_echo('day_count');?></label><br />
    <?php
    echo elgg_view('input/text', array(
        'name' => 'day_count',
        'value' => date("m/d/Y"),
        'readonly'=>true,
    ));
    ?>
</div>
<!-- new fields -->
<div>
    <?php
    echo elgg_view('input/checkbox', array(
        'name' => "was_flag",
        'value' => $was_flag,
        'id'=>'was_flag',
    ));
    ?>
    <label for="was_flag"><?php echo elgg_echo('was_flag');?></label>
</div>
<div>
    <label><?php echo elgg_echo('work_count');?></label><br />
    <?php
    echo elgg_view('input/text', array(
        'name' => 'work_count',
        'value' => $work_count,
        'readonly'=>true,
        'disabled'=>true,
    ));
    ?>
</div>

<?php

?>
<div>
    <label><?php echo elgg_echo('job_type');?></label><br />
    <?php
    $job_typeArray=array("Developers"=>"Developers","PM"=>"PM","Designer"=>"Designer","QA"=>"QA","Sales managers"=>"Sales managers");
    echo elgg_view('input/dropdown',
        array(
            'name' => 'job_type',
            'value' => $job_type,
            'options_values'=>$job_typeArray,
        ));
    ?>
</div>

<div>
    <label><?php echo elgg_echo('job_title');?></label><br />
    <?php

    $titleArray=array(
        "Developers"=>array("Youngling"=>"Youngling","Padawan"=>"Padawan","Jedi"=>"Jedi","Jedi Survivor"=>"Jedi Survivor","Jedi Knight"=>"Jedi Knight","Master Jedi"=>"Master Jedi","The Chosen One"=>"The Chosen One","Yoda"=>"Yoda","Darth Vader"=>"Darth Vader"),
        "PM"=>array("Pixie"=>"Pixie","Tinker"=>"Tinker", "Bell"=>"Bell","Nymph"=>"Nymph","Fairy"=>"Fairy","Djinni"=>"Djinni","Witch"=>"Witch","Snow Queen"=>"Snow Queen","Cruella De Vil"=>"Cruella De Vil"),
        "Designer"=>array(),
        "QA"=>array("Gremlin"=>"Gremlin","Elf"=>"Elf","Leprechaun"=>"Leprechaun","Warlock"=>"Warlock","Whitelighter"=>"Whitelighter","Sorcerer"=>"Sorcerer","Triad"=>"Triad","Merlin"=>"Merlin"),
        "Sales managers"=>array("male"=>array("Baron"=>"Baron","Viscount"=>"Viscount","Earl"=>"Earl","Marquess"=>"Marquess","Duke"=>"Duke","Prince"=>"Prince","King"=>"King"),"female"=>array("Baroness"=>"Baroness","Viscountess"=>"Viscountess","Countess"=>"Countess","Marchioness"=>"Marchioness","Duchess"=>"Duchess","Princess"=>"Princess","Queen"=>"Queen")));
    echo elgg_view('input/dropdown',
            array(
                'name' => 'job_title',
                'value' => $job_title,
                'options_values'=>$titleArray['Developers'],
        ));
    ?>
</div>


<div>
    <label><?php echo elgg_echo('level');?></label><br />
    <?php
    $levelArray=array("1"=>"Low","2"=>"Normal","3"=>"High");
    echo elgg_view('input/dropdown',
            array(
                'name' => 'level',
                'value' => $level,
                'options_values'=>$levelArray,
        ));
    ?>
</div>

<div>
    <label><?php echo elgg_echo('start_month');?></label><br />
    <?php
    $start_month_array=array("0"=>"0","0.5"=>"0.5");
    for($i=1;$i<101;$i++)
        $start_month_array[$i]=$i;
    echo elgg_view('input/dropdown',
        array(
            'name' => 'start_month',
            'value' => $start_month,
            'options_values'=>$start_month_array,
        ));
    ?>
    </div>
<!-- end new fields-->

<div>
<?php 
	echo elgg_view('input/checkboxes', array(
		'name' => "admin",
		'options' => array(elgg_echo('admin_option') => 1),
		'value' => $admin,
	));
?>
</div>

<div class="elgg-foot">
	<?php echo elgg_view('input/submit', array('value' => elgg_echo('register'))); ?>
</div>
<script type="text/javascript">
    $(document).ready(function()
    {
        $("input[name=day_count]").datepicker();
        $("input[name=work_count]").datepicker();
        $('input[name=was_flag]:checkbox').change(function () {
            if($(this).attr("checked")=="checked")
            {
                $(this).val('1')
                var d = new Date();
                var curr_month = d.getMonth() + 1;
                curr_month =curr_month  < 10 ? '0' + curr_month  : curr_month ;
                $("input[name=work_count]").attr("disabled",false).val(curr_month+"/"+d.getDate()+"/"+d.getFullYear())
            }
            else  {
                $("input[name=work_count]").attr("disabled",true).val("")
            }
        });

    })
</script>