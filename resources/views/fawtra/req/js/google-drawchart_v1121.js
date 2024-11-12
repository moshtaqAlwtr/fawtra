google.load('visualization', 44, {
    packages: ['corechart', 'line', 'bar']
});

function empty(value) {
    if (typeof value === 'undefined' || value === null || value === '' || value === ' ') return true;
    return false;
}

if (Object.getOwnPropertyNames == undefined) {
    Object.getOwnPropertyNames = function(obj) {
        var names = [];
        for (var k in obj) {
            if (obj.hasOwnProperty(k)) {
                names.push(k);
            }
        }
        return names;
    }
}

var last_width = 700;

function drawChart(divID, params, resizeOnPrint) {
    console.log(params);

    var dataTable = new google.visualization.DataTable();
    if (params.chartType.toLowerCase() != 'pie') {
        if (typeof params.group == 'undefined') params.group = '';
        if (params.ext != 'pdf' && params.group.toLowerCase() == 'monthly' || params.group.toLowerCase() == 'weekly' || params.group.toLowerCase() == 'daily') {
            dataTable.addColumn('date', params.title);
            var xFormat = 'date';
        } else if (params.chartType.toLowerCase() == 'stacked_column') {
            stacked_column_data = [];
            stacked_column_data[0] = [params.group];

            Object.keys(params.values).forEach(function(key) {
                stacked_column_data[0].push(key);
                j = 1;
                for (i in params.xLabels) {

                    if (typeof stacked_column_data[j] == 'undefined') {
                        stacked_column_data[j] = [];
                        stacked_column_data[j].push(params.xLabels[i].toString());
                    }
                    stacked_column_data[j].push(params.values[key][i])
                    j++;
                }


            });

            stackedDataTable = new google.visualization.arrayToDataTable(stacked_column_data);
        } else {
            dataTable.addColumn('string', params.title);
        }

        if (params.chartType.toLowerCase() != 'stacked_column') {
            var titles = Object.getOwnPropertyNames(params.values);
            for (var i = 0; i < titles.length; i++) {
                dataTable.addColumn('number', titles[i]);
            }
        }
    } else {
        dataTable.addColumn('string', 'Param');
        dataTable.addColumn('number', 'value');
    }




    var rows = [];
    if (params.xLabels != undefined) {
        for (i = 0; i < params.xLabels.length; i++) {
            rows[i] = [params.xLabels[i]];
            if (xFormat == 'date') {
                var dateParts = rows[i][0].split('-');
                rows[i][0] = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
            } else {
                rows[i][0] += '';
            }
            for (var c in params.values) {

                if (params.values.hasOwnProperty(c)) {
                    if (!empty(params.values[c][i])) {
                        rows[i][rows[i].length] = parseFloat(params.values[c][i]);
                    }

                }
            }
        }
    }
    if (params.chartType.toLowerCase() != 'stacked_column')
        dataTable.addRows(rows);


    var chart = null;
    var div = document.getElementById(divID);
    // Fixes Issue When Staff_Count = 0 we remove the whole dif before we run this
    if (div == null) return;

    if (params.chartType.toLowerCase() == 'area') {
        chart = new google.visualization.AreaChart(div);
    }
    if (params.chartType.toLowerCase() == 'line') {
        chart = new google.visualization.LineChart(div);
    } else if (params.chartType.toLowerCase() == 'bar' || params.chartType.toLowerCase() == 'column' || params.chartType.toLowerCase() == 'stacked_column') {
        chart = new google.visualization.ColumnChart(div);
    } else if (params.chartType.toLowerCase() == 'pie') {

        chart = new google.visualization.PieChart(div);
    }

    google.visualization.events.addListener(chart, 'ready', myReadyHandler);


    var dw = $(div).width();

    // WKHTMLTOPDF FIX
    if (dw == 0) {
        if (params.chartType.toLowerCase() == 'pie') {
            dw = 240;
        } else if (params.chartType.toLowerCase() == 'stacked_column') {} else {
            dw = 739;
        }
    }

    if (dw < 10 && $(div).data('width') != '' && $(div).data('width') > 10)
        dw = $(div).data('width');



    if (dw < 10) dw = last_width;
    else
        last_width = dw;

    //$(div).html(dw);
    //return;
    var extra_color = [];

    if (params.xLabels != undefined && params.xLabels.length > 3) {
        extra_color = ['#23b7e5', '#0abb87', '#d87a7f', '#5d78ff', '#DC3912', '#FF9900', '#109618', '#990099', '#3B3EAC', '#0099C6', '#DD4477', '#66AA00', '#B82E2E', '#316395', '#994499', '#22AA99', '#AAAA11', '#6633CC', '#E67300', '#8B0707', '#329262', '#5574A6', '#3B3EAC'];
    } else {
        extra_color = ['#23b7e5', '#0abb87', '#d87a7f'];
    }
    var cahrt_options = {
        width: dw,
        height: 260,
        title: params.title,
        titleTextStyle: {
            color: '#98a6ad',
            bold: false
        },
        vAxis: {
            format: 'short',
            textStyle: {
                color: '#98a6ad'
            }
        },
        hAxis: {
            textStyle: {
                color: '#98a6ad'
            }
        },
        colors: ((typeof(params.colors) != "undefined" && params.colors !== null) ? params.colors : extra_color)
    };

    area_options = {
        chartArea: {
            'width': '90%',
            'left': '7%',
            'height': '60%'
        },
        legend: {
            textStyle: {
                color: '#98a6ad'
            },
            'position': 'top',
            'alignment': 'end'
        },
        pointSize: 5
    };
    stacked_options = {
        chartArea: {
            'width': '90%',
            'left': '7%',
            'height': '60%'
        },
        legend: {
            textStyle: {
                color: '#98a6ad'
            },
            'position': 'top',
            'alignment': 'end'
        },
        pointSize: 5,
        isStacked: true
    };
    pie_options = {
        chartArea: {
            'width': '90%',
            'height': '75%'
        },
        legend: {
            'position': 'bottom'
        },
        pieHole: 0.6
    };

    if (params.chartType.toLowerCase() == 'pie')
        jQuery.extend(cahrt_options, pie_options);
    else if (params.chartType.toLowerCase() == 'stacked_column') {
        jQuery.extend(cahrt_options, stacked_options);
        dataTable = stackedDataTable;
    } else
        jQuery.extend(cahrt_options, area_options);

    if (typeof(params.extra) != "undefined" && params.extra !== null)
        jQuery.extend(cahrt_options, params.extra);


    console.log(cahrt_options);

    chart.draw(dataTable, cahrt_options);

    if (typeof resizeOnPrint != 'undefined' && resizeOnPrint) {
        window.addEventListener('beforeprint', function(event) {
            chart.clearChart();
            var options = JSON.parse(JSON.stringify(cahrt_options));
            options.width = ($(div).width() / 2) - 100;
            chart.draw(dataTable, options);
        });
        window.addEventListener('afterprint', function(event) {
            chart.clearChart();
            chart.draw(dataTable, cahrt_options);
        });
    }

    return chart;
}

function myReadyHandler() {
    window.status = "ready";
}