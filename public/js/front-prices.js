;(function () {
    if (nameLocale === 'nameAr') {
        var descLabel  = 'وصف السعر الإضافي',
            priceLabel = 'السعر الإضافي';
    } else {
        var descLabel  = 'Extra Price Description',
            priceLabel = 'Extra Price';
    }

    const $pricesField = $('.prices'),
          singlePrice = '\
              <div class="single-price">\
                  <i class="fa fa-times-circle delete-price" aria-hidden="true"></i>\
                  <hr />\
                  <div class="form-group">\
                    <input type="text" class="form-control" name="descriptions[]" placeholder="'+ descLabel +'" />\
                  </div>\
                  <div class="form-group">\
                    <input type="text" class="form-control" name="prices[]" placeholder="'+ priceLabel +'" />\
                  </div>\
              </div>\
          ';

    /**
     * Generate a price field on clicking add-price btn.
     */
    $(document).on('click', '.add-price', function (e) {
        $pricesField.append(singlePrice);
        $('.single-price').slideDown('fast');
    });

    /**
     * Delete price field.
     */
    $(document).on('click', '.delete-price', function (e) {
        const $field = $(this).parent();

        $field.slideUp('fast', function () {
            $field.remove();
        });
    });
}())
