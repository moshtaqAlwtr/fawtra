var submitButton = null;
$(function() {
    $('input[type="submit"], button[type="submit"]').click(function() {
        submitButton = this;
    });

    $('input, select, textarea').not('.ignore-handler').on('change keyup', function() {
        $('input[type="submit"], button[type="submit"]').prop('disabled', false);
    });

    $(window).bind('beforeunload', function() {
        if (submitButton) {
            $(submitButton).prop('disabled', true);
            setTimeout(function() {
                $('input[type="submit"], button[type="submit"]').prop('disabled', false);
            }, 30000);
        }
    });
});