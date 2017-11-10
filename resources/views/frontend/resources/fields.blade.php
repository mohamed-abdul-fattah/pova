@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $key => $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Photos --}}
@if (count($resource->photos))
    <div class="photos">
        @foreach ($resource->photos as $key => $photo)
            <a data-fancybox="gallery" href="{{$photo->link}}" class="gallery">
                <i class="fa fa-times-circle delete-photo" aria-hidden="true" data-id="{{$photo->id}}"></i>
                @if ($photo->cover)
                    <span class="cover">{{__('COVER')}}</span>
                @endif
                <img src="{{$photo->link}}" alt="{{$resource->title}}" class="single-photo">
            </a>
        @endforeach
    </div>
@endif
{{-- End photos --}}
{{-- Basic Information --}}
<div class="col-md-6">
    <h4>{{__('Basic Information')}}</h4>
    {{-- Category --}}
    <div class="form-group">
        <label for="category" class="form-label">{{__('Category')}}</label>
        <select id="category" class="form-control{{$errors->has('category_id') ? ' has-error' : ''}}" name="category_id" required>
            <option selected disabled>{{__('Select a category')}}</option>
            @foreach ($categories as $key => $category)
                <optgroup label="{{nameLocale($category, app()->getLocale())}}">
                    @foreach ($category->subCategories as $key => $cat)
                        <option value="{{$cat->id}}"
                        @if (optional(optional($resource)->category)->id === $cat->id)
                            selected
                        @endif
                        >{{nameLocale($cat, app()->getLocale())}}</option>
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
    {{-- Title --}}
    <div class="form-group">
        <label for="title" class="form-label">{{__('Title')}}</label>
        {!!
            Form::text('title', optional($resource)->title, [
                'id'          => 'title',
                'class'       => 'form-control'.($errors->has('title') ? ' has-error' : ''),
                'placeholder' => __('Title').' *',
                'required'    => 'required'
            ])
        !!}
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
    {{-- End title --}}
    {{-- Price --}}
    <div class="form-group">
        <label for="price" class="form-label">{{__('Price')}}</label>
        {!!
            Form::text('price', optional(optional(optional($resource)->basePrice)->first())->price, [
                'id'          => 'price',
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
        <label for="unit" class="form-label">{{__('Unit')}}</label>
        <select id="unit" class="form-control{{$errors->has('unit_id') ? ' has-error' : ''}}" name="unit_id" required>
            <option selected disabled>{{__('Select a unit')}}</option>
            @foreach ($units as $key => $unit)
                <option value="{{$unit->id}}"
                @if ($unit->id === optional(optional(optional($resource)->basePrice->first())->unit)->id)
                    selected
                @endif
                >{{nameLocale($unit, app()->getLocale())}}</option>
            @endforeach
        </select>
        @if ($errors->has('unit_id'))
            <span class="help-block">
                <strong>{{ $errors->first('unit_id') }}</strong>
            </span>
        @endif
    </div>
    {{-- End unit --}}
    {{-- Photos --}}
    <div class="form-group">
        <input type="file" name="photos[]" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} {{__('files selected')}}" multiple />
        <label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>{{__('Upload photos')}}</span></label>
        {{-- End photos --}}
        {{-- Cover --}}
        <input type="file" name="cover" id="file-3" class="inputfile inputfile-2" />
        <label for="file-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>{{__('Upload cover photo')}}</span></label>
    </div>
    {{-- End cover --}}
    {{-- Availabilities --}}
    <div class="form-group">
        <button type="button" class="btn btn-primary" id="set-availabilities">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            {{__('Set availabilities')}}
        </button>
    </div>
    <div id="availabilities"></div>
    {{-- End availabilities --}}
    <hr>
    {{-- Save and cancel --}}
    <div class="form-group">
        <button type="submit" class="btn btn-success">{{__('Save')}}</button>
        <a href="/resources" class="btn btn-danger">{{__('Cancel')}}</a>
    </div>
    {{-- End save and cancel --}}
</div>
{{-- End Basic Information --}}
<div class="col-md-6">
    {{-- Acquired features --}}
    <h4>{{__('Features')}}</h4>
    <div id="acquired-features">
        @if (count(optional($resource)->acquiredFeatures))
            {{-- Edit --}}
            {{-- Acquired features --}}
            @foreach ($resource->acquiredFeatures as $key => $feature)
                @include('frontend.resources.acquired-features')
            @endforeach
            {{-- End filled acquired features --}}
            {{-- Not acquired features --}}
            @php
                $acquiredFeaturesIds = $resource->acquiredFeatures()->select('feature_id')->get();
            @endphp
            @foreach ($resource->category->acquiredFeatures()->whereNotIn('feature_id', $acquiredFeaturesIds)->get() as $key => $feature)
                @include('frontend.resources.acquired-features')
            @endforeach
            @foreach ($resource->category->parentObj->acquiredFeatures()->whereNotIn('feature_id', $acquiredFeaturesIds)->get() as $key => $feature)
                @include('frontend.resources.acquired-features')
            @endforeach
            {{-- End not acquired features --}}
        @else
            @if (isset($isEdit))
                {{-- No features for this category --}}
                <h5>{{__('No features supported for this category')}}</h5>
            @else
                {{-- Create --}}
                <h5>{{__('Select a category')}}</h5>
            @endif
        @endif
    </div>
    {{-- End acquired features --}}
    <h4>{{__('Location')}}</h4>
    <div class="alert alert-info">
        {{__('Please mark on the map to locate your resource and the latitude and logitude.')}}
    </div>
    {{-- Country --}}
    <div class="form-group">
        <label for="country" class="form-label">{{__('Country')}}</label>
        <select id="country" class="form-control{{$errors->has('country_id') ? ' has-error' : ''}}" name="country_id" required>
            <option selected disabled>{{__('Select your country')}}</option>
            @foreach ($countries as $key => $country)
                <option value="{{$country->id}}"
                @if (optional(optional($resource)->address)->country_id === $country->id)
                    selected
                @endif
                >{{$country->name}}</option>
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
        <label for="city" class="form-lable">{{__('City')}}</label>
        <select id="city" class="form-control{{$errors->has('city_id') ? ' has-error' : ''}}" name="city_id" required>
            <option selected disabled>{{__('Select your city')}}</option>
            @foreach ($cities as $key => $city)
                <option value="{{$city->id}}"
                @if (optional(optional($resource)->address)->city_id === $city->id)
                    selected
                @endif
                >{{nameLocale($city, app()->getLocale())}}</option>
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
        <label for="lat" class="form-lable">{{__('Latitude')}}</label>
        {!!
            Form::text('lat', optional(optional($resource)->address)->lat, [
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
        <label for="lng" class="form-label">{{__('Longitude')}}</label>
        {!!
            Form::text('lng', optional(optional($resource)->address)->lng, [
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
        <label for="address" class="form-label">{{__('Address')}}</label>
        {!!
            Form::text('address', optional(optional($resource)->address)->address, [
                'id'          => 'address',
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
