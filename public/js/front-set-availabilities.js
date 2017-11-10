;(function () {
    var $availDiv  = $('#availabilities'),
        $availBtn  = $('#set-availabilities'),
        availField = '\
            <div class="single-availability">\
                <i class="fa fa-times-circle delete-avail" aria-hidden="true"></i>\
                <div class="form-group">\
                    <label class="form-label">From</label>\
                    <input type="text" class="date-picker form-control" name="from[]" />\
                </div>\
                <div class="form-group">\
                    <label class="form-label">To</label>\
                    <input type="text" class="date-picker form-control" name="to[]" />\
                </div>\
                <div class="form-group">\
                    <select name="type[]" class="form-control">\
                        <option>Choose type</option>\
                        <option value="unavailable">Unavailable</option>\
                        <option value="off">Off</option>\
                    </select>\
                </div>\
            </div>\
        ';

    /**
     * Set first availability.
     */
    $availBtn.click(function (e) {
        $availBtn.slideUp();
        $availDiv.html(availField);
    });
}())
