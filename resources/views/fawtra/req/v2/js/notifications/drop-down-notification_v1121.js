(function() {
    // load notifications count
    function loadNotificationCounts() {
        $.ajax({
            // notificationCountUrl defined in header.blade
            url: notificationCountUrl,
            type: 'GET',
            success: function(response) {
                if (response.count > 0)
                    $('#notifications-dropdown').append('<span id="notification-count" class="badge badge-sm up bg-danger count_noti">' + response.count + '</span>');
            },
            error: function(request, status, error) {
                console.log('issue with fetching notification count')
            }
        });
    }

    function fetchNotifications() {
        var url = arguments.length <= 0 || arguments[0] === undefined ? null : arguments[0];
        var callback = arguments.length <= 1 || arguments[1] === undefined ? null : arguments[1];
        let ajaxUrl = (url !== null) ? url : notificationUrl;
        // load and list notifications
        $.ajax({
            // notificationUrl defined in header.blade
            url: ajaxUrl,
            type: 'GET',
            beforeSend: function() {
                $('#notification-list').html('');
                $('#loading-div').addClass('loading');
            },
            success: function(response) {
                if (response.length > 0) {
                    for (let index = 0; index < response.length; index++) {
                        let obj = response[index];
                        let clonedNotificationDiv = $('#notification-template').clone();
                        let dismissUrl = obj.dismiss_url;
                        clonedNotificationDiv.attr('id', '');
                        clonedNotificationDiv.find('.message-content').html(obj.message);

                        clonedNotificationDiv.find('.notification-date').text(obj.date);
                        if (obj.total > 1) {
                            let url = obj.url;
                            clonedNotificationDiv.click(function(e) {
                                e.preventDefault();
                                fetchNotifications(url, function() {
                                    $('#group-back-btn').removeAttr('hidden');
                                });
                            });
                            clonedNotificationDiv.find('.dismissed-url').text(
                                clonedNotificationDiv.find('.dismissed-url').data('dismiss-all')
                            );
                        } else {
                            clonedNotificationDiv.find('.view-url').attr('href', obj.url);
                        }
                        clonedNotificationDiv.find('.dismissed-url').click(function() {
                            $.ajax({
                                // notificationUrl defined in header.blade
                                url: dismissUrl,
                                type: 'GET',
                                beforeSend: function() {
                                    $('#notification-list').html('');
                                    $('#loading-div').addClass('loading');
                                },
                                success: function(response) {
                                    if ($(this).parent().parent().parent().find('.dismissed-url').length == 0) {
                                        fetchNotifications();
                                    }
                                    $(this).parent().parent().remove();
                                    loadNotificationCounts();
                                },
                                complete: function() {
                                    $('#loading-div').removeClass('loading');
                                }
                            });
                        });
                        clonedNotificationDiv.removeAttr('hidden');
                        $('#notification-list').append(clonedNotificationDiv);
                    }
                } else {
                    let noNotificationDev = $('#no-notification-div').clone();
                    noNotificationDev.attr('id', '');
                    noNotificationDev.removeAttr('hidden');
                    $('#notification-container-id').html(noNotificationDev);
                }
            },
            error: function(request, status, error) {
                console.log('issue with fetching notification')
            },
            complete: function() {
                $('#loading-div').removeClass('loading');
                if (callback !== null) {
                    callback();
                }
            }
        });
    }
    $('#group-back-btn').click(function() {
        fetchNotifications(null, function() {
            $('#group-back-btn').attr('hidden', 'hidden');
        });
    });
    $('body').find('.notifications-dropdown-wrap, .user-dropdown').on('click', function(e) {
        e.stopPropagation();
    });
    //loadNotificationCounts();
    $('#notifications-dropdown-wrapper').click(function() {
        fetchNotifications();

    });
})();