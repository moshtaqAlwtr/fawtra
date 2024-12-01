$(function() {
    $('body').on('click', 'span.tag-filter', function(e) {
        tag_name = $(this).text();
        tag_type = $(this).data('tag-type');
        var url_parts = window.location.href.split('#');
        current_url = url_parts[0];
        if (current_url.indexOf('?') == -1)
            link = current_url + '?tag=' + tag_name + '&tag_type=' + tag_type;
        else if (current_url.indexOf('tag') != -1) {
            oldTag = '';
            oldTagType = '';
            var tagReg = /tag=([^\&]*)/g; //tag regex
            tagMatches = tagReg.exec(current_url);
            if (tagMatches && tagMatches[1]) {
                oldTag = tagMatches[1];
            }
            var tagTypereg = /tag_type=([^\&]*)/g; //tag type regex
            tagTypesMatches = tagTypereg.exec(current_url);
            if (tagTypesMatches && tagTypesMatches[1]) {
                oldTagType = tagTypesMatches[1];
            }
            if (tag_name == oldTag && tag_type == oldTagType) {
                //remove the tag filter if the user clicks the same tag twice
                tag_name = '';
                tag_type = '';
            }
            link = current_url.replace(/tag=[^\&]*/g, 'tag=' + tag_name);
            link = link.replace(/tag_type=[^\&]*/g, 'tag_type=' + tag_type)
        } else
            link = current_url + '&tag=' + tag_name + '&tag_type=' + tag_type;

        link += "#" + url_parts[1];
        window.location.href = link;

    })

    $('body').on('click', '.clickable', function(e) {
        if ($(e.target).parents('.preventClick').length < 1) {
            url = $(this).data('url');
            if (url)
                window.top.location.href = url;
        }
    });
    if (window.allow_filter) {
        $('body').on('mousedown', 'div.ms-sel-item ', function(e) {
            tag_name = $(this).text();
            current_url = window.location.href;
            if (current_url.indexOf('?') == -1)
                link = current_url + '?tag=' + tag_name + '&tag_type=' + item_type;
            else if (current_url.indexOf('tag') != -1) {
                link = current_url.replace(/tag=[^\&]*/g, 'tag=' + tag_name);
                link = link.replace(/tag_type=[^\&]*/g, 'tag_type=' + item_type)
            } else
                link = current_url + '&tag=' + tag_name + '&tag_type=' + item_type;
            window.location.href = link;
        })
    }

});