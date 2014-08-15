elgg.register_hook_handler('init', 'system', function() {

    $('form.elgg-form-badge-setbadge').submit(function()
    {
        return confirm("You really want do this action?")?true:false
    })
        // only do this on the profile page's widget canvas.
     if ($('.profile').length) {
        $('#elgg-widget-col-1').css('min-height', $('.profile').outerHeight(true) + 1);
    }
}, 400);
