@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $key => $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="col-md-6">
    <h4>{{__('Basic Information')}}</h4>
    {{-- Category --}}
    <div class="form-group">
        <select id="category" class="form-control{{$errors->has('category_id') ? ' has-error' : ''}}" name="category_id" required>
            <option selected disabled>{{__('Select a category')}}</option>
            @foreach ($categories as $key => $category)
                <optgroup label="{{nameLocale($category, app()->getLocale())}}">
                    @foreach ($category->subCategories as $key => $cat)
                        <option value="{{$cat->id}}">{{nameLocale($cat, app()->getLocale())}}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
        @if ($errors->has('category_id'))
            <span class="help-block">
                <strong>{{ $errors->first('category_id') }}</strong>
            </span>
        @endif
    </div>
    {{-- End category --}}
    {{-- TitleAr --}}
    <div class="form-group">
        {!!
            Form::text('titleAr', null, [
                'class'       => 'form-control'.($errors->has('titleAr') ? ' has-error' : ''),
                'placeholder' => __('Title in Arabic').' *',
                'required'    => 'required'
            ])
        !!}
        @if ($errors->has('titleAr'))
            <span class="help-block">
                <strong>{{ $errors->first('titleAr') }}</strong>
            </span>
        @endif
    </div>
    {{-- End titleAr --}}
    {{-- TitleEn --}}
    <div class="form-group">
        {!!
            Form::text('titleEn', null, [
                'class'       => 'form-control'.($errors->has('titleEn') ? ' has-error' : ''),
                'placeholder' => __('Title in English').' *',
                'required'    => 'required'
            ])
        !!}
        @if ($errors->has('titleEn'))
            <span class="help-block">
                <strong>{{ $errors->first('titleEn') }}</strong>
            </span>
        @endif
    </div>
    {{-- End titleEn --}}
    {{-- Price --}}
    <div class="form-group">
        {!!
            Form::text('price', null, [
                'class'       => 'form-control'.($errors->has('price') ? ' has-error' : ''),
                'placeholder' => __('Price').' *',
                'required'    => 'required'
            ])
        !!}
        @if ($errors->has('price'))
            <span class="help-block">
                <strong>{{ $errors->first('price') }}</strong>
            </span>
        @endif
    </div>
    {{-- End price --}}
    {{-- Unit --}}
    <div class="form-group">
        <select class="form-control{{$errors->has('unit_id') ? ' has-error' : ''}}" name="unit_id" required>
            <option selected disabled>{{__('Select a unit')}}</option>
            @foreach ($units as $key => $unit)
                <option value="{{$unit->id}}">{{nameLocale($unit, app()->getLocale())}}</option>
            @endforeach
        </select>
        @if ($errors->has('unit_id'))
            <span class="help-block">
                <strong>{{ $errors->first('unit_id') }}</strong>
            </span>
        @endif
    </div>
    {{-- End unit --}}
    {{-- Save and cancel --}}
    <div class="form-group">
        <button type="submit" class="btn btn-default save-btn">{{__('Save')}}</button>
        <a href="/resources" class="btn btn-default cancel-btn">{{__('Cancel')}}</a>
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
        <select class="form-control{{$errors->has('country_id') ? ' has-error' : ''}}" name="country_id" required>
            <option selected disabled>{{__('Select your country')}}</option>
            @foreach ($countries as $key => $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('country_id'))
            <span class="help-block">
                <strong>{{ $errors->first('country_id') }}</strong>
            </span>
        @endif
    </div>
    {{-- End Country --}}
    {{-- City --}}
    <div class="form-group">
        <select class="form-control{{$errors->has('city_id') ? ' has-error' : ''}}" name="city_id" required>
            <option selected disabled>{{__('Select your city')}}</option>
            @foreach ($cities as $key => $city)
                <option value="{{$city->id}}">{{nameLocale($city, app()->getLocale())}}</option>
            @endforeach
        </select>
        @if ($errors->has('city_id'))
            <span class="help-block">
                <strong>{{ $errors->first('city_id') }}</strong>
            </span>
        @endif
    </div>
    {{-- End city --}}
    {{-- Latitude --}}
    <div class="form-group">
        {!!
            Form::text('lat', null, [
                'id'          => 'lat'.($errors->has('lat') ? ' has-error' : ''),
                'class'       => 'form-control',
                'placeholder' => __('Latitude').' *',
                'required'    => 'required'
            ])
        !!}
        @if ($errors->has('lat'))
            <span class="help-block">
                <strong>{{ $errors->first('lat') }}</strong>
            </span>
        @endif
    </div>
    {{-- End latitude --}}
    {{-- Longitude --}}
    <div class="form-group">
        {!!
            Form::text('lng', null, [
                'id'          => 'lng'.($errors->has('lng') ? ' has-error' : ''),
                'class'       => 'form-control',
                'placeholder' => __('Longitude').' *',
                'required'    => 'required'
            ])
        !!}
        @if ($errors->has('lng'))
            <span class="help-block">
                <strong>{{ $errors->first('lng') }}</strong>
            </span>
        @endif
    </div>
    {{-- End longitude --}}
    {{-- Address --}}
    <div class="form-group">
        {!!
            Form::text('address', null, [
                'class'       => 'form-control'.($errors->has('address') ? ' has-error' : ''),
                'placeholder' => __('Address').' *',
                'required'    => 'required'
            ])
        !!}
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
    {{-- End address --}}
    {{-- Map --}}
    <div class="form-group">
        <div id="map"></div>
    </div>
    {{-- End map --}}
</div>
