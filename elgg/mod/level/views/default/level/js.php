
// force the first column to at least be as large as the profile box in cols 2 and 3
// we also want to run before the widget init happens so priority is < 500
elgg.register_hook_handler('init', 'system', function() {
   /* var title= ['1':{'2':'Youngling'},{'8':'Padawan'},{'17':'Jedi'},{'29':'Jedi Survivor'},{'44':'Jedi Knight'},{'56':'Master Jedi'},{'68':"The Chosen One"},{'80':"Yoda"},{'104':"Darth Vader"},
'2':{'2':'Pixie'},{'8':'Tinker Bell'},{'17':'Nymph'},{'29':'Fairy'},{'44':'Djinni'},{'56':'Witch'},{'68':'Snow Queen'},{'80':'Cruella De Vil'},
'3':{},
'4':{'2':'Gremlin'},{'8':'Elf'},{'17':'Leprechaun'},{'29':'Warlock'},{'44':'Whitelighter'},{'56':'Sorcerer'},{'68':'Triad'},{'80':'Merlin'},
'5':{'2':''},{'8':'Baroness'},{'17':'Viscountess'},{'29':'Countess'},{'44':'Marchioness'},{'56':'Duchess'},{'68':'Princess'},{'80':'Queen'}]

    var level=[{'2':'Low'},{'2':'Normal'},{'2':'High'}]*/
    $("select[name=job_type]").live("onchange",function()
    {
        var val=$(this).val()
        cosnole.log(val);
    })
    // only do this on the profile page's widget canvas.
	if ($('.profile').length) {
		$('#elgg-widget-col-1').css('min-height', $('.profile').outerHeight(true) + 1);
	}
}, 400);
