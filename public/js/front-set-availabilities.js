;(function () {
    if (nameLocale === 'nameAr') {
        var from          = 'من',
            to            = 'إلي',
            startDate     = 'تاريخ البداية',
            endDate       = 'تاريخ النهاية',
            seasonalPrice = 'سعر الموسم';
    } else {
        var from          = 'From',
            to            = 'To',
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
                    <label class="form-label">'+ seasonalPrice +'</label>\
                    <input type="text" class="form-control" name="seasonalPrice[]" placeholder="'+ seasonalPrice +'" />\
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

    /**
     * Delete availability.
     */
    $(document).on('click', '.delete-avail', function (e) {
        const $div = $(this).parent();

        $div.slideUp('fast', function () {
            $div.remove();
        });
    });
}())
