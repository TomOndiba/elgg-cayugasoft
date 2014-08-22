
// force the first column to at least be as large as the profile box in cols 2 and 3
// we also want to run before the widget init happens so priority is < 500
elgg.register_hook_handler('init', 'system', function() {
    var title={ "Developers": ["Youngling","Padawan","Jedi","Jedi Survivor","Jedi Knight","Master Jedi","The Chosen One","Yoda","Darth Vader"],
                "PM":["Pixie","Tinker", "Bell","Nymph","Fairy","Djinni","Witch","Snow Queen","Cruella De Vil"],
                "Designer":[],
                "QA":["Gremlin","Elf","Leprechaun","Warlock","Whitelighter","Sorcerer","Triad","Merlin"],
                "Sales managers":{"male":["Baron","Viscount","Earl","Marquess","Duke","Prince","King"],
                                "female":["Baroness","Viscountess","Countess","Marchioness","Duchess","Princess","Queen"]}};

    $("select[name=job_type]").change(function()
    {
        var val=$(this).val();
        if(title[val].length>0)
        {
            var newopt="";
            for(var i=0;i<title[val].length;i++)
                newopt+="<option value='"+title[val][i]+"'>"+title[val][i]+"</option>";
            $("select[name=job_title]").empty().append(newopt)
        }
        else {

        }
    })
    // only do this on the profile page's widget canvas.
	if ($('.profile').length) {
		$('#elgg-widget-col-1').css('min-height', $('.profile').outerHeight(true) + 1);
	}
}, 400);
