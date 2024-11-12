var table_head_top;
var scrolling = false;
$(document).ready(function() {
    if ($("table.report").hasClass("fixed-table-head")) {
        $('table.report thead>tr th').each(function() {
            if ($("table.report").hasClass("dataTable")) {
                $(this).css('width', $(this).width());
            } else {
                $(this).css('width', $(this).outerWidth());
            }
        });
    }

    if (IS_SAFARI) {
        $("table.report thead").css({
            'position': 'sticky',
            'box-shadow': '0 1px 2px #efefef',
            'top': $(".header").innerHeight() + ($(".pages-head").length > 0 ? $(".pages-head").innerHeight() : 0)
        });
    }

    if ($(window).width() > 800) {
        $(".report-wrap").css('overflow-x', 'inherit');
        $(".subreport").css('overflow', 'inherit');
        // $(".table-responsive-overflow").css('overflow', 'clip');
    }
});