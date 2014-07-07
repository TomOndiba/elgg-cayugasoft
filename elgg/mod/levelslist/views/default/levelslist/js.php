
// force the first column to at least be as large as the profile box in cols 2 and 3
// we also want to run before the widget init happens so priority is < 500
elgg.register_hook_handler('init', 'system', function() {

    $("select[name=position]").change(function()
    {
        var val=$(this).val();
        $("select[name=position_guid]").find("option:contains('"+val+"')").attr("selected","selected");
        var red=$("select[name=position_guid]").val()
        if(red) window.location.href="/levelslist/update/"+red
    })
    // only do this on the profile page's widget canvas.
	if ($('.profile').length) {
		$('#elgg-widget-col-1').css('min-height', $('.profile').outerHeight(true) + 1);
	}
}, 400);
