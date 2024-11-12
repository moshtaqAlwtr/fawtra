$(function() {
    $('.widget-content', '.master-widget').hide();
    var shownWidgets = [];
    $('li.current', '.master-widget .widget-actions').each(function() {
        shownWidgets[shownWidgets.length] = $('a', this).attr('href');
    });
    $(shownWidgets.join(',')).show();

    $('a', '.master-widget .widget-actions').click(function(evt) {
        evt.preventDefault();

        var $parent = $(this).parents('.master-widget');
        var parent = $parent[0];

        $('.widget-content', parent).hide();
        $($(this).attr('href'), parent).show();

        $('.widget-actions li', parent).removeClass('current');
        $(this).parent().addClass('current');
    });

    $('.quick-actions-grad').hide();
    $('.quick-actions-grad:first').show();
    $('.barrow', '.quick-actions').click(function(evt) {
        evt.preventDefault();
        $('.quick-actions-grad').hide();
        $($(this).attr('href')).show();
    });

    $('.data-label').focus(function() {
            var _this = $(this);
            var label = _this.data('label');
            var val = _this.val();
            if (val == label) {
                _this.val('');
                _this.css('color', '#444');
            }
        }).blur(function() {
            var _this = $(this);
            var label = _this.data('label');
            var val = _this.val();
            if (val == '') {
                _this.val(label);
                _this.css('color', '#999');
            }
        }).blur()
        .parents('form').submit(function() {
            var _this = $('.data-label', this);
            var label = _this.data('label');
            var val = _this.val();
            if (val == label) {
                _this.val('');
            }
        });
});