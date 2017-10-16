@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class='bio-row{{ $errors->has('parent_id') ? ' has-error' : '' }}'>
	{!! Form::label('parent_id', trans('category.ParentId')) !!}
	{!! Form::text('parent_id', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('parent_id'))
		<span class='help-block'>
			<strong>{{ $errors->first('parent_id') }}</strong>
		</span>
	@endif
</div>

<div class='bio-row{{ $errors->has('name') ? ' has-error' : '' }}'>
	{!! Form::label('name', trans('category.Name')) !!}
	{!! Form::text('name', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('name'))
		<span class='help-block'>
			<strong>{{ $errors->first('name') }}</strong>
		</span>
	@endif
</div>


@foreach($category->phototypes() as $phototype)
    @include("backend.partials.images",array("pictures"=>$category->photos($phototype->id),"phototype"=>$phototype))
@endforeach
@foreach($category->filetypes() as $filetype)
    @include("backend.partials.files",array("files"=>$category->files($filetype->id),"filetype"=>$filetype))
@endforeach

{{-- Phones --}}
@if(method_exists($category, 'phones'))
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <div class="bio-row">
            <p>
                <span>
                    {!! Form::label('phone', trans("category.phone")) !!}
                </span>
                <div id="phone-container">
                    @if (count($category->phones) > 0)
                        {{-- for edit fields --}}
                        @foreach ($category->phones as $phone)
                            <div class="phone-fields">
                                {!! Form::text('phones[]', $phone->phone, ['class' => 'phones']) !!}
                                <button class="btn btn-success btn-phone">
                                    <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endforeach
                    @else
                        {{-- for create fields --}}
                        <div class="phone-fields">
                            {!! Form::text('phones[]', '', ['class' => 'phones']) !!}
                            <button class="btn btn-success btn-phone">
                                <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                </div>
                @if ($errors->has('phones'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </p>
        </div>
    </div>
@endif
{{-- End phones --}}

{{-- Address --}}
@if (method_exists($pickupPoint, 'address'))
    {{-- Longitude --}}
    <div class='bio-row{{ $errors->has('lng') ? ' has-error' : '' }}'>
        {!! Form::label('lng', 'Longitude') !!}
        {!! Form::text('lng', optional($pickupPoint->address)->lng, array('id'=>'lng','class'=>'form-control')) !!}

        @if ($errors->has('lng'))
    		<span class='help-block'>
    			<strong>{{ $errors->first('lng') }}</strong>
    		</span>
    	@endif
    </div>
    {{-- latitude --}}
    <div class='bio-row{{ $errors->has('lat') ? ' has-error' : '' }}'>
        {!! Form::label('lat', 'Latitude') !!}
        {!! Form::text('lat', optional($pickupPoint->address)->lat, array('id'=>'lat','class'=>'form-control')) !!}

        @if ($errors->has('lat'))
    		<span class='help-block'>
    			<strong>{{ $errors->first('lat') }}</strong>
    		</span>
    	@endif
    </div>
    {{-- Address --}}
    <div class='bio-row{{ $errors->has('address') ? ' has-error' : '' }}'>
        {!! Form::label('address', 'Address') !!}
        {!! Form::text('address', optional($pickupPoint->address)->address, array('id'=>'address','class'=>'form-control')) !!}

        @if ($errors->has('address'))
    		<span class='help-block'>
    			<strong>{{ $errors->first('address') }}</strong>
    		</span>
    	@endif
    </div>
    {{-- map --}}
    <div class='col-lg-12'>
       <div id="map-wrapper">
          <div id="map"></div>
       </div>
    </div>
@endif
{{-- End address --}}

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn "></i>Save
        </button>
    </div>
</div>

@section('scripts')
    @if (method_exists($category, 'address'))
        <script type="text/javascript" src="/hydrogen/backend/js/address.js"></script>
        <script async defer
          src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API')}}&callback=initMap">
        </script>
        <script type="text/javascript">
          @if (isset($is_edit) && count($category->address) > 0)
            var isEdit = true;
            var lat = {{$category->address->lat}};
            var lng = {{$category->address->lng}};
          @else
            var isEdit = false;
          @endif
        </script>
    @endif
@stop
