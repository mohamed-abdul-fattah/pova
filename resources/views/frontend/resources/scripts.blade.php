<script src="/hydrogen/backend/js/address.js" charset="utf-8"></script>
<script src="/js/front-acquired-features.js" charset="utf-8"></script>
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
</script>
