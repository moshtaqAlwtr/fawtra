var payments_loaded = false;
var times_loaded = false;
var profit_loaded = false;
var accural_profit_loaded = false;
var cash_profit_loaded = false;
var activities_loaded = false;
var appointments_loaded = false;


$(function() {
    $('.reports-select').change(function() {
        var val = $(this).val();
        var _this = this;
        if (val) {
            $.ajax({
                url: SITE_ROOT + 'owner/reports/load/' + val,
                dataType: 'json',
                success: function(data) {
                    var parent = $(_this).parents('.widget-content')[0];
                    var divID = $('.chart-cont', parent).attr('id');
                    $('h6', parent).text(data.report);
                    drawChart(divID, data.data);
                }
            });
        }
    }).change();

    function highlightSearch(event, ui) {
        var val = $(event.target).val();
        var rex = new RegExp(val, 'ig');
        $('li>a', '.ui-autocomplete').each(function() {
            var html = $(this).html().replace(rex, '<strong>' + val + '</strong>');
            $(this).html(html);
        })
    }

    $('#InvoiceQuery').autocomplete({
        source: SITE_ROOT + 'owner/invoices/autocomplete',
        focus: function(event, ui) {
            $(event.target).val(ui.item.label);
            return false;
        },
        select: function(event, ui) {
            window.location = SITE_ROOT + 'owner/invoices/view/' + ui.item.value;
            return false;
        },
        open: highlightSearch
    });


    $('#ClientQuery').autocomplete({
        source: SITE_ROOT + 'owner/clients/autocomplete',
        select: function(event, ui) {
            window.location = SITE_ROOT + 'owner/clients/view/' + ui.item.value;
            return false;
        },
        focus: function(event, ui) {
            $(event.target).val(ui.item.label);
            return false;
        },
        open: highlightSearch
    });

    // load_report('invoices');
});

function load_report(key) {
    console.log(key);
    console.log(report_urls[key + '_url']);
    $.ajax({
        url: report_urls[key + '_url']
    }).done(function(html) {
        if (key.indexOf('profit') > -1) {
            key = 'profit';
            console.log('111');
        }
        console.log(html.indexOf('drawChart'));
        if (html.indexOf('drawChart') > -1 || key == 'activities')
            $("#report_" + key).html(html);
        else
            $("#report_" + key).html($('#no-report').html());
    });
}






$('a[aria-controls="Payment"]').on('click', function(e) {
    if (!payments_loaded) {
        load_report('payments');
        payments_loaded = true;
    }

});
$('a[aria-controls="Appointment"]').on('click', function(e) {
    if (!appointments_loaded) {
        $('#appointments_list').load(report_urls['appointments_url']);
        appointments_loaded = true;
    }
});

$('a[aria-controls="Time"]').on('click', function(e) {
    if (!times_loaded) {
        load_report('times');
        times_loaded = true;
    }

});
$('a[aria-controls="Profit"]').on('click', function(e) {
    if (!profit_loaded) {
        load_report('profit');
        profit_loaded = true;
    }

});

$('a.cash-profit').on('click', function(e) {
    if (!cash_profit_loaded) {
        $('#report_profit').html('<div class="notifcation-loader"><div class="inner-loader"></div></div>');
        $(this).addClass('active');
        $('a.accural-profit').removeClass('active');
        load_report('cash_profit');
        cash_profit_loaded = true;
        accural_profit_loaded = false;
    }

});

$('a.accural-profit').on('click', function(e) {
    if (!accural_profit_loaded) {
        $('#report_profit').html('<div class="notifcation-loader"><div class="inner-loader"></div></div>');
        $(this).addClass('active');
        $('a.cash-profit').removeClass('active');
        load_report('accural_profit');
        accural_profit_loaded = true;
        cash_profit_loaded = false;
    }

});

$('a[aria-controls="Activity"]').on('click', function(e) {
    if (!activities_loaded) {
        load_report('activities');
        activities_loaded = true;
    }

});