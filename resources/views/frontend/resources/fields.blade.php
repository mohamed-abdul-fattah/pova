<div class="col-md-6">
    <h4>{{__('Basic Information')}}</h4>
    {{-- Category --}}
    <div class="form-group">
        <select class="form-control" name="category_id" required>
            <option>{{__('Select a category')}}</option>
        </select>
    </div>
    {{-- End category --}}
    {{-- Title --}}
    <div class="form-group">
        <input type="text" name="title" placeholder="{{__('Title')}} *" class="form-control" required>
    </div>
    {{-- End title --}}
    {{-- Price --}}
    <div class="form-group">
        <input type="text" name="price" placeholder="{{__('Price')}} *" class="form-control" required>
    </div>
    {{-- End price --}}
    {{-- Unit --}}
    <div class="form-group">
        <select class="form-control" name="unit_id" required>
            <option>{{__('Select a unit')}}</option>
        </select>
    </div>
    {{-- End unit --}}
</div>
<div class="col-md-6">
    <h4>{{__('Location')}}</h4>
    <div class="alert alert-info">
        {{__('Please mark on the map to locate your resource and the latitude and logitude.')}}
    </div>
    {{-- Country --}}
    <div class="form-group">
        <select class="form-control" name="country_id" required>
            <option>{{__('Select your country')}}</option>
        </select>
    </div>
    {{-- End Country --}}
    {{-- City --}}
    <div class="form-group">
        <select class="form-control" name="city_id"required>
            <option>{{__('Select your city')}}</option>
        </select>
    </div>
    {{-- End city --}}
    {{-- Latitude --}}
    <div class="form-group">
        <input id="lat" type="text" name="lat" placeholder="{{__('Latitude')}} *" class="form-control" required>
    </div>
    {{-- End latitude --}}
    {{-- Longitude --}}
    <div class="form-group">
        <input id="lng" type="text" name="lng" placeholder="{{__('Longitude')}} *" class="form-control" required>
    </div>
    {{-- End longitude --}}
    {{-- Address --}}
    <div class="form-group">
        <input type="text" name="address" placeholder="{{__('Address')}}" class="form-control" required>
    </div>
    {{-- End address --}}
    {{-- Map --}}
    <div class="form-group">
        <div id="map"></div>
    </div>
    {{-- End map --}}
</div>
