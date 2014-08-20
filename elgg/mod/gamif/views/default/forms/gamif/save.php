<?php
$gamif = elgg_get_entities(array(
    'type' => 'object',
    'subtype' => 'gamif',
));
$trainee=null;
$junior=null;
$junior_middle=null;
$middle=null;
$middle_senior=null;
$senior=null;
$senior_lead=null;
$lead=null;
$tech_officer=null;
if($gamif)
{
    foreach($gamif as $val)
    {
        switch($val->title)
        {
            case "Trainee":
                $trainee=$val;
            break;
            case "Junior":
                $junior=$val;
            break;
            case "Junior/Middle":
                $junior_middle=$val;
            break;
            case "Middle":
                $middle=$val;
            break;
            case "Middle/Senior":
                $middle_senior=$val;
            break;
            case "Senior":
                $senior=$val;
            break;
            case "Senior/Lead":
                $senior_lead=$val;
            break;
            case "Lead":
                $lead=$val;
            break;
            case "Tech Officer":
                $tech_officer=$val;
            break;

        }
    }
}

?>
    <div class="gamif-table">
        <div class="little-table-cell">
            <label><?php echo elgg_echo("Level"); ?></label>
        </div>
        <div class="little-table-cell text-al-center">
            <label><?php echo elgg_echo("Seniority"); ?></label>
        </div>
        <div class="big-table-cell text-al-center">
            <label><?php echo elgg_echo("Start month"); ?></label>
        </div>
    </div>
    <hr />

    <div class="gamif-table">
        <div class="little-table-cell vert-middle">
            <label><?php echo elgg_echo("Trainee"); ?></label>
        </div>
        <div class="little-table-cell">
            <?php echo elgg_view('input/hidden', array('name' => 'trainee[level]', 'value' =>"Trainee")); ?>
            <?php if(isset($trainee->guid))  echo elgg_view('input/hidden', array('name' => 'trainee[guid]', 'value' =>$trainee->guid)); ?>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Low"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Normal"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("High"); ?></label>
            </div>
        </div>
        <div class="big-table-cell">
            <div class="padd-ins">
                <?php echo is_null($trainee)?elgg_view('input/text', array('name' => 'trainee[smart_month1]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$trainee->smart_month1,'name' => 'trainee[smart_month1]','class'=>'input-half-width'));?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($trainee)?elgg_view('input/text', array('name' => 'trainee[smart_month2]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$trainee->smart_month2,'name' => 'trainee[smart_month2]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($trainee)?elgg_view('input/text', array('name' => 'trainee[smart_month3]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$trainee->smart_month3,'name' => 'trainee[smart_month3]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
        </div>
    </div>
    <hr />
    <!-- Junior-->
    <div class="gamif-table">
        <div class="little-table-cell vert-middle">
            <label><?php echo elgg_echo("Junior"); ?></label>
        </div>
        <div class="little-table-cell">
            <?php echo elgg_view('input/hidden', array('name' => 'junior[level]', 'value' =>"Junior")); ?>
            <?php if(isset($junior->guid)) echo  elgg_view('input/hidden', array('name' => 'junior[guid]', 'value' =>$junior->guid)); ?>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Low"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Normal"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("High"); ?></label>
            </div>
        </div>
        <div class="big-table-cell">
            <div class="padd-ins">
                <?php echo is_null($junior)?elgg_view('input/text', array('name' => 'junior[smart_month1]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$junior->smart_month1,'name' => 'junior[smart_month1]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($junior)?elgg_view('input/text', array('name' => 'junior[smart_month2]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$junior->smart_month2,'name' => 'junior[smart_month2]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($junior)?elgg_view('input/text', array('name' => 'junior[smart_month3]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$junior->smart_month3,'name' => 'junior[smart_month3]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
        </div>
    </div>
    <hr />
    <!--Junior/Middle -->
    <div class="gamif-table">
        <div class="little-table-cell vert-middle">
            <label><?php echo elgg_echo("Junior / Middle"); ?></label>
        </div>
        <div class="little-table-cell">
            <?php echo elgg_view('input/hidden', array('name' => 'junior_middle[level]', 'value' =>"Junior/Middle")); ?>
            <?php if(isset($junior_middle->guid)) echo elgg_view('input/hidden', array('name' => 'junior_middle[guid]', 'value' =>$junior_middle->guid)); ?>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Low"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Normal"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("High"); ?></label>
            </div>
        </div>
        <div class="big-table-cell">
            <div class="padd-ins">
                <?php echo is_null($junior_middle)?elgg_view('input/text', array('name' => 'junior_middle[smart_month1]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$junior_middle->smart_month1,'name' => 'junior_middle[smart_month1]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($junior_middle)?elgg_view('input/text', array('name' => 'junior_middle[smart_month2]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$junior_middle->smart_month2,'name' => 'junior_middle[smart_month2]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($junior_middle)?elgg_view('input/text', array('name' => 'junior_middle[smart_month3]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$junior_middle->smart_month3,'name' => 'junior_middle[smart_month3]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
        </div>
    </div>
    <hr />
    <!--Middle -->
    <div class="gamif-table">
        <div class="little-table-cell vert-middle">
            <label><?php echo elgg_echo("Middle"); ?></label>
        </div>
        <div class="little-table-cell">
            <?php echo elgg_view('input/hidden', array('name' => 'middle[level]', 'value' =>"Middle")); ?>
            <?php if(isset($middle->guid))echo elgg_view('input/hidden', array('name' => 'middle[guid]', 'value' =>$middle->guid)); ?>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Low"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Normal"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("High"); ?></label>
            </div>
        </div>
        <div class="big-table-cell">
            <div class="padd-ins">
                <?php echo is_null($middle)?elgg_view('input/text', array('name' => 'middle[smart_month1]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$middle->smart_month1,'name' => 'middle[smart_month1]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($middle)?elgg_view('input/text', array('name' => 'middle[smart_month2]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$middle->smart_month2,'name' => 'middle[smart_month2]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($middle)?elgg_view('input/text', array('name' => 'middle[smart_month3]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$middle->smart_month3,'name' => 'middle[smart_month3]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
        </div>
    </div>
    <hr />
    <!--Middle/Senior -->
    <div class="gamif-table">
        <div class="little-table-cell vert-middle">
            <label><?php echo elgg_echo("Middle / Senior"); ?></label>
        </div>
        <div class="little-table-cell">
            <?php echo elgg_view('input/hidden', array('name' => 'middle_senior[level]', 'value' =>"Middle/Senior")); ?>
            <?php if(isset($middle_senior->guid)) echo elgg_view('input/hidden', array('name' => 'middle_senior[guid]', 'value' =>$middle_senior->guid)); ?>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Low"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Normal"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("High"); ?></label>
            </div>
        </div>
        <div class="big-table-cell">
            <div class="padd-ins">
                <?php echo is_null($middle_senior)?elgg_view('input/text', array('name' => 'middle_senior[smart_month1]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$middle_senior->smart_month1,'name' => 'middle_senior[smart_month1]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($middle_senior)?elgg_view('input/text', array('name' => 'middle_senior[smart_month2]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$middle_senior->smart_month2,'name' => 'middle_senior[smart_month2]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($middle_senior)?elgg_view('input/text', array('name' => 'middle_senior[smart_month3]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$middle_senior->smart_month3,'name' => 'middle_senior[smart_month3]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
        </div>
    </div>
    <hr />
    <!--Senior -->
    <div class="gamif-table">
        <div class="little-table-cell vert-middle">
            <label><?php echo elgg_echo("Senior"); ?></label>
        </div>
        <div class="little-table-cell">
            <?php echo elgg_view('input/hidden', array('name' => 'senior[level]', 'value' =>"Senior")); ?>
            <?php if(isset($senior->guid)) echo elgg_view('input/hidden', array('name' => 'senior[guid]', 'value' =>$senior->guid)); ?>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Low"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Normal"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("High"); ?></label>
            </div>
        </div>
        <div class="big-table-cell">
            <div class="padd-ins">
                <?php echo is_null($senior)?elgg_view('input/text', array('name' => 'senior[smart_month1]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$senior->smart_month1,'name' => 'senior[smart_month1]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($senior)?elgg_view('input/text', array('name' => 'senior[smart_month2]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$senior->smart_month2,'name' => 'senior[smart_month2]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($senior)?elgg_view('input/text', array('name' => 'senior[smart_month3]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$senior->smart_month3,'name' => 'senior[smart_month3]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
        </div>
    </div>
    <hr />
    <!-- Senior/Lead -->
    <div class="gamif-table">
        <div class="little-table-cell vert-middle">
            <label><?php echo elgg_echo("Senior / Lead"); ?></label>
        </div>
        <div class="little-table-cell">
            <?php echo elgg_view('input/hidden', array('name' => 'senior_lead[level]', 'value' =>"Senior/Lead")); ?>
            <?php if(isset($senior_lead->guid)) echo elgg_view('input/hidden', array('name' => 'senior_lead[guid]', 'value' =>$senior_lead->guid)); ?>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Low"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Normal"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("High"); ?></label>
            </div>
        </div>
        <div class="big-table-cell">
            <div class="padd-ins">
                <?php echo is_null($senior_lead)?elgg_view('input/text', array('name' => 'senior_lead[smart_month1]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$senior_lead->smart_month1,'name' => 'senior_lead[smart_month1]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($senior_lead)?elgg_view('input/text', array('name' => 'senior_lead[smart_month2]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$senior_lead->smart_month2,'name' => 'senior_lead[smart_month2]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($senior_lead)?elgg_view('input/text', array('name' => 'senior_lead[smart_month3]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$senior_lead->smart_month3,'name' => 'senior_lead[smart_month3]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
        </div>
    </div>
    <hr />

    <!-- Lead -->
    <div class="gamif-table">
        <div class="little-table-cell vert-middle">
            <label><?php echo elgg_echo("Lead"); ?></label>
        </div>
        <div class="little-table-cell">
            <?php echo elgg_view('input/hidden', array('name' => 'lead[level]', 'value' =>"Lead")); ?>
            <?php if(isset($lead->guid)) echo elgg_view('input/hidden', array('name' => 'lead[guid]', 'value' =>$lead->guid)); ?>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Low"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Normal"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("High"); ?></label>
            </div>
        </div>
        <div class="big-table-cell">
            <div class="padd-ins">
                <?php echo is_null($lead)?elgg_view('input/text', array('name' => 'lead[smart_month1]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$lead->smart_month1,'name' => 'lead[smart_month1]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($lead)?elgg_view('input/text', array('name' => 'lead[smart_month2]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$lead->smart_month2,'name' => 'lead[smart_month2]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($lead)?elgg_view('input/text', array('name' => 'lead[smart_month3]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$lead->smart_month3,'name' => 'lead[smart_month3]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
        </div>
    </div>
    <hr />
    <!-- Tech Officer -->
    <div class="gamif-table">
        <div class="little-table-cell vert-middle">
            <label><?php echo elgg_echo("Tech Officer"); ?></label>
        </div>
        <div class="little-table-cell">
            <?php echo elgg_view('input/hidden', array('name' => 'tech_officer[level]', 'value' =>"Tech Officer")); ?>
            <?php if(isset($tech_officer->guid))echo elgg_view('input/hidden', array('name' => 'tech_officer[guid]', 'value' =>$tech_officer->guid)); ?>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Low"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("Normal"); ?></label>
            </div>
            <div class="padd-ins">
                <label class="label-line-height text-al-center"><?php echo elgg_echo("High"); ?></label>
            </div>
        </div>
        <div class="big-table-cell">
            <div class="padd-ins">
                <?php echo is_null($tech_officer)?elgg_view('input/text', array('name' => 'tech_officer[smart_month1]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$tech_officer->smart_month1,'name' => 'tech_officer[smart_month1]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($tech_officer)?elgg_view('input/text', array('name' => 'tech_officer[smart_month2]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$tech_officer->smart_month2,'name' => 'tech_officer[smart_month2]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
            <div class="padd-ins">
                <?php echo is_null($tech_officer)?elgg_view('input/text', array('name' => 'tech_officer[smart_month3]','class'=>'input-half-width')):elgg_view('input/text', array('value'=>$tech_officer->smart_month3,'name' => 'tech_officer[smart_month3]','class'=>'input-half-width')); ?>
                <div class="clear-both"></div>
            </div>
        </div>
    </div>
    <hr />
<div>
    <?php echo elgg_view('input/submit', array('value' => elgg_echo('save'))); ?>
</div>
