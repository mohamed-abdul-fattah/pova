@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class='bio-row{{ $errors->has('name') ? ' has-error' : '' }}'>
	{!! Form::label('name', trans('feature.Name')) !!}
	{!! Form::text('name', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('name'))
		<span class='help-block'>
			<strong>{{ $errors->first('name') }}</strong>
		</span>
	@endif
</div>

<div class='bio-row{{ $errors->has('type') ? ' has-error' : '' }}'>
	{!! Form::label('type', trans('feature.Type')) !!}
	{!! Form::text('type', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('type'))
		<span class='help-block'>
			<strong>{{ $errors->first('type') }}</strong>
		</span>
	@endif
</div>

<div class='bio-row{{ $errors->has('required') ? ' has-error' : '' }}'>
	{!! Form::label('required', trans('feature.Required')) !!}
	{!! Form::checkbox('required', null)) !!}
	@if ($errors->has('required'))
		<span class='help-block'>
			<strong>{{ $errors->first('required') }}</strong>
		</span>
	@endif
</div>

<div class='bio-row{{ $errors->has('selections') ? ' has-error' : '' }}'>
	{!! Form::label('selections', trans('feature.Selections')) !!}
	{!! Form::text('selections', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('selections'))
		<span class='help-block'>
			<strong>{{ $errors->first('selections') }}</strong>
		</span>
	@endif
</div>


@foreach($feature->phototypes() as $phototype)
    @include("backend.partials.images",array("pictures"=>$feature->photos($phototype->id),"phototype"=>$phototype))
@endforeach
@foreach($feature->filetypes() as $filetype)
    @include("backend.partials.files",array("files"=>$feature->files($filetype->id),"filetype"=>$filetype))
@endforeach

{{-- Phones --}}
@if(method_exists($feature, 'phones'))
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <div class="bio-row">
            <p>
                <span>
                    {!! Form::label('phone', trans("feature.phone")) !!}
                </span>
                <div id="phone-container">
                    @if (count($feature->phones) > 0)
                        {{-- for edit fields --}}
                        @foreach ($feature->phones as $phone)
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
@if (method_exists($feature, 'address'))
    {{-- Longitude --}}
    <div class='bio-row{{ $errors->has('lng') ? ' has-error' : '' }}'>
        {!! Form::label('lng', 'Longitude') !!}
        {!! Form::text('lng', optional($feature->address)->lng, array('id'=>'lng','class'=>'form-control')) !!}

        @if ($errors->has('lng'))
    		<span class='help-block'>
    			<strong>{{ $errors->first('lng') }}</strong>
    		</span>
    	@endif
    </div>
    {{-- latitude --}}
    <div class='bio-row{{ $errors->has('lat') ? ' has-error' : '' }}'>
        {!! Form::label('lat', 'Latitude') !!}
        {!! Form::text('lat', optional($feature->address)->lat, array('id'=>'lat','class'=>'form-control')) !!}

        @if ($errors->has('lat'))
    		<span class='help-block'>
    			<strong>{{ $errors->first('lat') }}</strong>
    		</span>
    	@endif
    </div>
    {{-- Address --}}
    <div class='bio-row{{ $errors->has('address') ? ' has-error' : '' }}'>
        {!! Form::label('address', 'Address') !!}
        {!! Form::text('address', optional($feature->address)->address, array('id'=>'address','class'=>'form-control')) !!}

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
    @if (method_exists($feature, 'address'))
        <script type="text/javascript" src="/hydrogen/backend/js/address.js"></script>
        <script async defer
          src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API')}}&callback=initMap">
        </script>
        <script type="text/javascript">
          @if (isset($is_edit) && count($feature->address) > 0)
            var isEdit = true;
            var lat = {{$feature->address->lat}};
            var lng = {{$feature->address->lng}};
          @else
            var isEdit = false;
          @endif
        </script>
    @endif
@stop
