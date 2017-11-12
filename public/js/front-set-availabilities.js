;(function () {
    if (nameLocale === 'nameAr') {
        var from        = 'من',
            to          = 'إلي',
            choose      = 'إختر نوع وقت الإتاحة',
            unavailable = 'غير متاح',
            seasonal    = 'موسم';
    } else {
        var from        = 'From',
            to          = 'To',
            choose      = 'Choose type',
            unavailable = 'Unavailable',
            seasonal    = 'Seasonal';
    }
    const $availDiv  = $('#availabilities'),
          $availBtn  = $('#set-availabilities'),
          availField = '\
            <div class="single-availability">\
                <hr />\
                <i class="fa fa-times-circle delete-avail" aria-hidden="true"></i>\
                <div class="form-group">\
                    <label class="form-label">'+ from +'</label>\
                    <input type="text" class="date-picker form-control" name="from[]" />\
                </div>\
                <div class="form-group">\
                    <label class="form-label">'+ to +'</label>\
                    <input type="text" class="date-picker form-control" name="to[]" />\
                </div>\
                <div class="form-group">\
                    <select name="type[]" class="form-control">\
                        <option>'+ choose +'</option>\
                        <option value="unavailable">'+ unavailable +'</option>\
                        <option value="seasonal">'+ seasonal +'</option>\
                    </select>\
                </div>\
            </div>\
        ';

    /**
     * Set first availability.
     */
    $availBtn.click(function (e) {
        $availDiv.append(availField);
        $('.single-availability').slideDown('fast');
    });

    $(document).on('click', '.delete-avail', function (e) {
        const $div = $(this).parent();

        $div.slideUp('fast', function () {
            $div.remove();
        });
    });
}())
