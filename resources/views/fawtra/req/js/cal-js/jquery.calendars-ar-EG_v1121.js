/* http://keith-wood.name/calendars.html
   Arabic localisation for Gregorian/Julian calendars for jQuery.
   Mahmoud Khaled -- mahmoud.khaled@badrit.com
   NOTE: monthNames are the new months names */
(function($) {
    'use strict';
    $.calendars.calendars.gregorian.prototype.regionalOptions['ar-EG'] = {
        name: 'Gregorian',
        epochs: ['BCE', 'CE'],
        monthNames: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو',
            'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'
        ],
        monthNamesShort: ['يناير', 'فبراير', 'مارس', 'إبريل', 'مايو', 'يونيو',
            'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'
        ],
        dayNames: ['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'],
        dayNamesShort: ['أحد', 'اثنين', 'ثلاثاء', 'أربعاء', 'خميس', 'جمعة', 'سبت'],
        dayNamesMin: ['أحد', 'اثنين', 'ثلاثاء', 'أربعاء', 'خميس', 'جمعة', 'سبت'],
        digits: null,
        dateFormat: 'dd/mm/yyyy',
        firstDay: 6,
        isRTL: true
    };
    if ($.calendars.calendars.julian) {
        $.calendars.calendars.julian.prototype.regionalOptions['ar-EG'] =
            $.calendars.calendars.gregorian.prototype.regionalOptions['ar-EG'];
    }
})(jQuery);