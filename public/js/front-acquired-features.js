;(function () {
    /**
     * When a provider selects a category.
     */
    $(document).on('change', '#category', function (e) {
        var categoryId = $(this).val();

        $.ajax({
            url: '/ajax/categories/aquired-features/' + categoryId,
            method: 'GET',
            contentType: 'application/json',
            dateType: 'json'
        }).done(function (data) {
            var fields = '';
            $.each(data.features, function (index, feature) {
                var names    = JSON.parse(feature.feature.name),
                    required = (feature.feature.required) ? 'required' : '';

                // Features for email and number input types.
                if (feature.feature.type === 'email' || feature.feature.type === 'number') {
                    fields += '\
                        <div class="form-group">\
                            <label class="form-lable">'+ names[nameLocale] + '</label>\
                            <input name="features['+ feature.feature.id +']" type="' + feature.feature.type + '" class="form-control"\
                            placeholder="'+ names[nameLocale] +'" ' + required + '>\
                        </div>\
                    ';
                } else if (feature.feature.type === 'string') { // string input type.
                    fields += '\
                        <div class="form-group">\
                            <label class="form-lable">'+ names[nameLocale] + '</label>\
                            <input name="features['+ feature.feature.id +']" type="text" class="form-control"\
                            placeholder="'+ names[nameLocale] +'" ' + required + '>\
                        </div>\
                    ';
                } else if (feature.feature.type === 'text') { // textareas.
                    fields += '\
                        <div class="form-group">\
                            <label class="form-lable">'+ names[nameLocale] + '</label>\
                            <textarea name="features['+ feature.feature.id +']" type="text" class="form-control" rows="4"\
                            placeholder="'+ names[nameLocale] +'" ' + required + '></textarea>\
                        </div>\
                    ';
                } else if (feature.feature.type === 'boolean') { // checkboxs.
                    fields += '\
                        <div class="form-group">\
                            <input name="features['+ feature.feature.id +']" type="checkbox" id="feature-'+ feature.id +'"\
                            ' + required + ' value="1">\
                            <label for="feature-'+ feature.id +'">'+ names[nameLocale] +'</label>\
                        </div>\
                    ';
                } else if (feature.feature.type === 'selection') { // selections type.
                    // Options.
                    var selections = feature.feature.selections.split(','),
                        options    = '';
                    $.each(selections, function (index, selection) {
                        options += '<option value="'+ selection +'">'+ selection +'</option>';
                    });
                    fields += '\
                        <div class="form-group">\
                            <label class="form-lable">'+ names[nameLocale] + '</label>\
                            <select name="features['+ feature.feature.id +']" class="form-control" '+ required +'>\
                                <option selected disabled>'+ names[nameLocale] +'</option>\
                                '+ options +'\
                            </select>\
                        </div>\
                    ';
                }
            });

            $('#acquired-features').hide('fast');
            $('#acquired-features').html(fields);
            $('#acquired-features').show('fast');
        });
    });

    /**
     * Delete acquired feature
     */
    $(document).on('click', '.delete-feature', function (e) {
        var formGroup = $(this).parent();

        formGroup.slideUp('fast');
        formGroup.find('[name]').attr('disabled', 'disabled');
    });
}());
