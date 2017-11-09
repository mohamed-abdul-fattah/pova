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
	{!! Form::label('resource_id', trans('availability.ResourceId')) !!}
	{!! Form::text('resource_id', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('resource_id'))
		<span class='help-block'>
			<strong>{{ $errors->first('resource_id') }}</strong>
		</span>
	@endif
</div>
{{-- End resource_id --}}

{{-- Start --}}
<div class='bio-row{{ $errors->has('start') ? ' has-error' : '' }}'>
	{!! Form::label('start', trans('availability.Start')) !!}
	{!! Form::input('date', 'start', null, array('class' => 'form-control', 'required' => 'required')) !!}
	@if ($errors->has('start'))
		<span class='help-block'>
			<strong>{{ $errors->first('start') }}</strong>
		</span>
	@endif
</div>
{{-- End start --}}

{{-- End --}}
<div class='bio-row{{ $errors->has('end') ? ' has-error' : '' }}'>
	{!! Form::label('end', trans('availability.End')) !!}
	{!! Form::input('date', 'end', null, array('class' => 'form-control', 'required' => 'required')) !!}
	@if ($errors->has('end'))
		<span class='help-block'>
			<strong>{{ $errors->first('end') }}</strong>
		</span>
	@endif
</div>
{{-- End end --}}

{{-- Type --}}
<div class='bio-row{{ $errors->has('type') ? ' has-error' : '' }}'>
	{!! Form::label('type', trans('availability.Type')) !!}
	{!! Form::text('type', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('type'))
		<span class='help-block'>
			<strong>{{ $errors->first('type') }}</strong>
		</span>
	@endif
</div>
{{-- End type --}}


@foreach($availability->phototypes() as $phototype)
    @include("backend.partials.images",array("pictures"=>$availability->photos($phototype->id),"phototype"=>$phototype))
@endforeach
@foreach($availability->filetypes() as $filetype)
    @include("backend.partials.files",array("files"=>$availability->files($filetype->id),"filetype"=>$filetype))
@endforeach

{{-- Phones --}}
@if(method_exists($availability, 'phones'))
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <div class="bio-row">
            <p>
                <span>
                    {!! Form::label('phone', trans("availability.phone")) !!}
                </span>
                <div id="phone-container">
                    @if (count($availability->phones) > 0)
                        {{-- for edit fields --}}
                        @foreach ($availability->phones as $phone)
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
@if (method_exists($availability, 'address'))
    {{-- Longitude --}}
    <div class='bio-row{{ $errors->has('lng') ? ' has-error' : '' }}'>
        {!! Form::label('lng', 'Longitude') !!}
        {!! Form::text('lng', optional($availability->address)->lng, array('id'=>'lng','class'=>'form-control')) !!}

        @if ($errors->has('lng'))
    		<span class='help-block'>
    			<strong>{{ $errors->first('lng') }}</strong>
    		</span>
    	@endif
    </div>
    {{-- latitude --}}
    <div class='bio-row{{ $errors->has('lat') ? ' has-error' : '' }}'>
        {!! Form::label('lat', 'Latitude') !!}
        {!! Form::text('lat', optional($availability->address)->lat, array('id'=>'lat','class'=>'form-control')) !!}

        @if ($errors->has('lat'))
    		<span class='help-block'>
    			<strong>{{ $errors->first('lat') }}</strong>
    		</span>
    	@endif
    </div>
    {{-- Address --}}
    <div class='bio-row{{ $errors->has('address') ? ' has-error' : '' }}'>
        {!! Form::label('address', 'Address') !!}
        {!! Form::text('address', optional($availability->address)->address, array('id'=>'address','class'=>'form-control')) !!}

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
    @if (method_exists($availability, 'address'))
        <script type="text/javascript" src="/hydrogen/backend/js/address.js"></script>
        <script async defer
          src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API')}}&callback=initMap">
        </script>
        <script type="text/javascript">
          @if (isset($is_edit) && count($availability->address) > 0)
            var isEdit = true;
            var lat = {{$availability->address->lat}};
            var lng = {{$availability->address->lng}};
          @else
            var isEdit = false;
          @endif
        </script>
    @endif
@stop
