<script src="/hydrogen/backend/js/address.js" charset="utf-8"></script>
<script src="/js/front-acquired-features.js" charset="utf-8"></script>
<script src="/js/jquery.custom-file-input.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.0/jquery.fancybox.min.js"></script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API')}}&callback=initMap">
</script>
<script type="text/javascript">
    @if (app()->getLocale() === 'ar')
        var nameLocale = 'nameAr';
    @else
        var nameLocale = 'nameEn';
    @endif

    @isset($isEdit)
        var lat = {{$resource->address->lat}},
            lng = {{$resource->address->lng}}
    @endisset

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
            console.log(res);
            if (res.success) {
                photo.hide('fast', function () {
                    photo.remove();
                });
            }
        });
    });
</script>
