<script src="/js/jquery-ui.multidatespicker.js" charset="utf-8"></script>
<script type="text/javascript">
    @if (app()->getLocale() === 'ar')
        var nameLocale = 'nameAr';
    @else
        var nameLocale = 'nameEn';
    @endif

    @isset($isEdit)
        var lat = {{$resource->address->lat}},
            lng = {{$resource->address->lng}},
            unavailableDates = JSON.parse('{!! $resource->availabilities()
                ->whereType('unavailable')
                ->pluck('start')
                ->toJson() !!}'
            );

            $.each(unavailableDates, function (key, item) {
                const date = new Date(item),
                      formatted = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
                unavailableDates[key] = formatted;
            });

            /**
             * Delete photo.
             */
            $(document).on('click', '.delete-photo', function (e) {
                e.preventDefault();
                var photoId = $(this).attr('data-id'),
                    photo   = $(this).parent();

                $.ajax({
                    url: '/ajax/resources/delete-photo/' + photoId,
                    method: 'DELETE',
                    data: {resourceId: {{$resource->id}}}
                }).done(function (res) {
                    if (res.success) {
                        photo.hide('fast', function () {
                            photo.remove();
                        });
                    }
                });
            });
    @endisset

    console.log(unavailableDates);

    // Multi datepicker.
    $( '.mdp' ).multiDatesPicker({
        dateFormat: 'dd/mm/yy',
        altField: '#unavailable-dates',
        altFormat: 'mm/dd/yy',
        beforeShowDay: function (date) {
            const today = new Date();

            today.setHours(0);
            today.setMinutes(0);
            today.setSeconds(0);
            today.setMilliseconds(0);

            if ( // disable date before today.
                date < today
            ) {
                return [false, '', ''];
            }
            // Enable dates after today.
            return [true, '', ''];
        },
        addDates: unavailableDates
    });
</script>
<script src="/hydrogen/backend/js/address.js" charset="utf-8"></script>
<script src="/js/front-acquired-features.js" charset="utf-8"></script>
<script src="/js/jquery.custom-file-input.js" charset="utf-8"></script>
<script src="/js/front-set-availabilities.js" charset="utf-8"></script>
<script src="/js/front-prices.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.0/jquery.fancybox.min.js"></script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API')}}&callback=initMap">
</script>
