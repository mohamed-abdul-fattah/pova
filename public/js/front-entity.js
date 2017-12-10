;(function () {
    $(document).ready(function () {
        const $company = $('.company-name'),
              $entity  = $('input[name=entity]'),
              $coInput = $('input.company-input');

        /**
         * Show company name if it is filled in and validation failed and redirected back.
         */
        if ($('input[name=entity][value=company]').attr('checked')) {
            $company.slideDown();
            $coInput.removeAttr('disabled');
        }

        /**
         * Show company name field on selecting company entity.
         */
        $entity.click(function (e) {
            if ($(this).val() === 'company') {
                $company.slideDown('fast');
                $coInput.removeAttr('disabled');
            } else {
                $company.slideUp('fast');
                $coInput.attr('disabled', 'disabled');
            }
        });
    });
}())
