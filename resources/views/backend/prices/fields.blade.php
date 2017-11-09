@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- ResourceId --}}
<div class='bio-row{{ $errors->has('resource_id') ? ' has-error' : '' }}'>
	{!! Form::label('resource_id', trans('price.ResourceId')) !!}
	{!! Form::text('resource_id', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('resource_id'))
		<span class='help-block'>
			<strong>{{ $errors->first('resource_id') }}</strong>
		</span>
	@endif
</div>
{{-- End resource_id --}}

{{-- UnitId --}}
<div class='bio-row{{ $errors->has('unit_id') ? ' has-error' : '' }}'>
	{!! Form::label('unit_id', trans('price.UnitId')) !!}
	{!! Form::text('unit_id', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('unit_id'))
		<span class='help-block'>
			<strong>{{ $errors->first('unit_id') }}</strong>
		</span>
	@endif
</div>
{{-- End unit_id --}}

{{-- AvailabilityId --}}
<div class='bio-row{{ $errors->has('availability_id') ? ' has-error' : '' }}'>
	{!! Form::label('availability_id', trans('price.AvailabilityId')) !!}
	{!! Form::text('availability_id', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('availability_id'))
		<span class='help-block'>
			<strong>{{ $errors->first('availability_id') }}</strong>
		</span>
	@endif
</div>
{{-- End availability_id --}}

{{-- Price --}}
<div class='bio-row{{ $errors->has('price') ? ' has-error' : '' }}'>
	{!! Form::label('price', trans('price.Price')) !!}
	{!! Form::text('price', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('price'))
		<span class='help-block'>
			<strong>{{ $errors->first('price') }}</strong>
		</span>
	@endif
</div>
{{-- End price --}}

{{-- Currency --}}
<div class='bio-row{{ $errors->has('currency') ? ' has-error' : '' }}'>
	{!! Form::label('currency', trans('price.Currency')) !!}
	{!! Form::text('currency', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('currency'))
		<span class='help-block'>
			<strong>{{ $errors->first('currency') }}</strong>
		</span>
	@endif
</div>
{{-- End currency --}}


@foreach($price->phototypes() as $phototype)
    @include("backend.partials.images",array("pictures"=>$price->photos($phototype->id),"phototype"=>$phototype))
@endforeach
@foreach($price->filetypes() as $filetype)
    @include("backend.partials.files",array("files"=>$price->files($filetype->id),"filetype"=>$filetype))
@endforeach

{{-- Phones --}}
@if(method_exists($price, 'phones'))
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <div class="bio-row">
            <p>
                <span>
                    {!! Form::label('phone', trans("price.phone")) !!}
                </span>
                <div id="phone-container">
                    @if (count($price->phones) > 0)
                        {{-- for edit fields --}}
                        @foreach ($price->phones as $phone)
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
@if (method_exists($price, 'address'))
    {{-- Longitude --}}
    <div class='bio-row{{ $errors->has('lng') ? ' has-error' : '' }}'>
        {!! Form::label('lng', 'Longitude') !!}
        {!! Form::text('lng', optional($price->address)->lng, array('id'=>'lng','class'=>'form-control')) !!}

        @if ($errors->has('lng'))
    		<span class='help-block'>
    			<strong>{{ $errors->first('lng') }}</strong>
    		</span>
    	@endif
    </div>
    {{-- latitude --}}
    <div class='bio-row{{ $errors->has('lat') ? ' has-error' : '' }}'>
        {!! Form::label('lat', 'Latitude') !!}
        {!! Form::text('lat', optional($price->address)->lat, array('id'=>'lat','class'=>'form-control')) !!}

        @if ($errors->has('lat'))
    		<span class='help-block'>
    			<strong>{{ $errors->first('lat') }}</strong>
    		</span>
    	@endif
    </div>
    {{-- Address --}}
    <div class='bio-row{{ $errors->has('address') ? ' has-error' : '' }}'>
        {!! Form::label('address', 'Address') !!}
        {!! Form::text('address', optional($price->address)->address, array('id'=>'address','class'=>'form-control')) !!}

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
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>

@section('scripts')
    @if (method_exists($price, 'address'))
        <script type="text/javascript" src="/hydrogen/backend/js/address.js"></script>
        <script async defer
          src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API')}}&callback=initMap">
        </script>
        <script type="text/javascript">
          @if (isset($is_edit) && count($price->address) > 0)
            var isEdit = true;
            var lat = {{$price->address->lat}};
            var lng = {{$price->address->lng}};
          @else
            var isEdit = false;
          @endif
        </script>
    @endif
@stop
