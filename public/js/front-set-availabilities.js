;(function () {
    if (nameLocale === 'nameAr') {
        var from          = 'من',
            to            = 'إلي',
            choose        = 'إختر نوع وقت الإتاحة',
            unavailable   = 'غير متاح',
            seasonal      = 'موسم',
            startDate     = 'تاريخ البداية',
            endDate       = 'تاريخ النهاية',
            seasonalPrice = 'سعر الموسم';
    } else {
        var from          = 'From',
            to            = 'To',
            choose        = 'Choose type',
            unavailable   = 'Unavailable',
            seasonal      = 'Seasonal',
            startDate     = 'Start date',
            endDate       = 'End date',
            seasonalPrice = 'Seasonal price';
    }
    const $availDiv  = $('#availabilities'),
          $availBtn  = $('#set-availabilities'),
          availField = '\
            <div class="single-availability">\
                <hr />\
                <i class="fa fa-times-circle delete-avail" aria-hidden="true"></i>\
                <div class="form-group">\
                    <label class="form-label">'+ from +'</label>\
                    <input type="text" class="date-picker form-control" name="from[]" placeholder="'+ startDate +'" />\
                </div>\
                <div class="form-group">\
                    <label class="form-label">'+ to +'</label>\
                    <input type="text" class="date-picker form-control" name="to[]" placeholder="'+ endDate +'" />\
                </div>\
                <div class="form-group">\
                    <select class="form-control">\
                        <option disabled selected>'+ choose +'</option>\
                        <option value="unavailable">'+ unavailable +'</option>\
                        <option value="seasonal">'+ seasonal +'</option>\
                    </select>\
                </div>\
                <div class="form-group seasonal">\
                    <label class="form-label">'+ seasonalPrice +'</label>\
                    <input type="text" class="form-control" name="seasonalPrice[]" placeholder="'+ seasonalPrice +'" />\
                </div>\
                <input type="hidden" name="type[]" />\
            </div>\
        ';

    /**
     * Set first availability.
     */
    $availBtn.click(function (e) {
        $availDiv.append(availField);
        $('.single-availability').slideDown('fast');
    });

    /**
     * Delete availability.
     */
    $(document).on('click', '.delete-avail', function (e) {
        const $div = $(this).parent();

        $div.slideUp('fast', function () {
            $div.remove();
        });
    });

    /**
     * Show on seasonal price field and record type.
     */
    $(document).on('change', '.single-availability div select', function (e) {
        let seasonalField = $(this).parent().parent().find('.seasonal');

        // Record type value.
        $(this).parent().parent().find('input[type=hidden]').val($(this).val());
        seasonalField.find('input').val('');

        if ($(this).val() === 'seasonal') {
            seasonalField.slideDown('fast');
        } else {
            seasonalField.slideUp('fast');
        }
    });
}())
