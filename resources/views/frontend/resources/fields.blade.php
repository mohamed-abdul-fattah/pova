<div class="col-md-6">
    <h4>{{__('Basic Information')}}</h4>
    {{-- Category --}}
    <div class="form-group">
        <select id="category" class="form-control" name="category_id" required>
            <option selected disabled>{{__('Select a category')}}</option>
            @foreach ($categories as $key => $category)
                <optgroup label="{{nameLocale($category, app()->getLocale())}}">
                    @foreach ($category->subCategories as $key => $cat)
                        <option value="{{$cat->id}}">{{nameLocale($cat, app()->getLocale())}}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
    </div>
    {{-- End category --}}
    {{-- TitleAr --}}
    <div class="form-group">
        {!!
            Form::text('titleAr', null, [
                'class'       => 'form-control',
                'placeholder' => __('Title in Arabic').' *',
                'required'    => 'required'
            ])
        !!}
        </div>
        {{-- End titleAr --}}
    {{-- TitleEn --}}
    <div class="form-group">
        {!!
            Form::text('titleEn', null, [
                'class'       => 'form-control',
                'placeholder' => __('Title in English').' *',
                'required'    => 'required'
            ])
        !!}
    </div>
    {{-- End titleEn --}}
    {{-- Price --}}
    <div class="form-group">
        <input type="text" name="price" placeholder="{{__('Price')}} *" class="form-control" required>
    </div>
    {{-- End price --}}
    {{-- Unit --}}
    <div class="form-group">
        <select class="form-control" name="unit_id" required>
            <option selected disabled>{{__('Select a unit')}}</option>
            @foreach ($units as $key => $unit)
                <option value="{{$unit->id}}">{{nameLocale($unit, app()->getLocale())}}</option>
            @endforeach
        </select>
    </div>
    {{-- End unit --}}
    {{-- Save and cancel --}}
    <div class="form-group">
        <button type="submit" class="btn btn-default save-btn">Save</button>
        <a href="/resources" class="btn btn-default cancel-btn">Cancel</a>
    </div>
    {{-- End save and cancel --}}
</div>
<div class="col-md-6">
    {{-- Acquired features --}}
    <h4>{{__('Features')}}</h4>
    <div id="acquired-features">
        <h5>{{__('Select a category')}}</h5>
    </div>
    {{-- End acquired features --}}
    <h4>{{__('Location')}}</h4>
    <div class="alert alert-info">
        {{__('Please mark on the map to locate your resource and the latitude and logitude.')}}
    </div>
    {{-- Country --}}
    <div class="form-group">
        <select class="form-control" name="country_id" required>
            <option selected disabled>{{__('Select your country')}}</option>
            @foreach ($countries as $key => $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
        </select>
    </div>
    {{-- End Country --}}
    {{-- City --}}
    <div class="form-group">
        <select class="form-control" name="city_id"required>
            <option selected disabled>{{__('Select your city')}}</option>
            @foreach ($cities as $key => $city)
                <option value="{{$city->id}}">{{nameLocale($city, app()->getLocale())}}</option>
            @endforeach
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
