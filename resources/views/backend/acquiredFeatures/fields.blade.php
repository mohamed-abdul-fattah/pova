@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- feature_id --}}
            <div class='bio-row{{ $errors->has('feature_id') ? ' has-error' : '' }}'>
	{!! Form::label('feature_id', trans('acquiredFeature.FeatureId')) !!}
	{!! Form::text('feature_id', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('feature_id'))
		<span class='help-block'>
			<strong>{{ $errors->first('feature_id') }}</strong>
		</span>
	@endif
</div>
            {{-- End feature_id --}}

{{-- featureable --}}
            <div class='bio-row{{ $errors->has('featureable') ? ' has-error' : '' }}'>
	{!! Form::label('featureable', trans('acquiredFeature.Featureable')) !!}
	{!! Form::text('featureable', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('featureable'))
		<span class='help-block'>
			<strong>{{ $errors->first('featureable') }}</strong>
		</span>
	@endif
</div>
            {{-- End featureable --}}

{{-- value_string --}}
            <div class='bio-row{{ $errors->has('value_string') ? ' has-error' : '' }}'>
	{!! Form::label('value_string', trans('acquiredFeature.ValueString')) !!}
	{!! Form::text('value_string', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('value_string'))
		<span class='help-block'>
			<strong>{{ $errors->first('value_string') }}</strong>
		</span>
	@endif
</div>
            {{-- End value_string --}}

{{-- value_number --}}
            <div class='bio-row{{ $errors->has('value_number') ? ' has-error' : '' }}'>
	{!! Form::label('value_number', trans('acquiredFeature.ValueNumber')) !!}
	{!! Form::text('value_number', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('value_number'))
		<span class='help-block'>
			<strong>{{ $errors->first('value_number') }}</strong>
		</span>
	@endif
</div>
            {{-- End value_number --}}

{{-- value_boolean --}}
            <div class='bio-row{{ $errors->has('value_boolean') ? ' has-error' : '' }}'>
	{!! Form::label('value_boolean', trans('acquiredFeature.ValueBoolean')) !!}
	{!! Form::checkbox('value_boolean', null) !!}
	@if ($errors->has('value_boolean'))
		<span class='help-block'>
			<strong>{{ $errors->first('value_boolean') }}</strong>
		</span>
	@endif
</div>
            {{-- End value_boolean --}}

{{-- value_text --}}
            <div class='bio-row{{ $errors->has('value_text') ? ' has-error' : '' }}'>
	{!! Form::label('value_text', trans('acquiredFeature.ValueText')) !!}
	{!! Form::textarea('value_text', null, array('class' => 'form-control', 'required' => 'required')) !!}
	@if ($errors->has('value_text'))
		<span class='help-block'>
			<strong>{{ $errors->first('value_text') }}</strong>
		</span>
	@endif
</div>
            {{-- End value_text --}}


@foreach($acquiredFeature->phototypes() as $phototype)
    @include("backend.partials.images",array("pictures"=>$acquiredFeature->photos($phototype->id),"phototype"=>$phototype))
@endforeach
@foreach($acquiredFeature->filetypes() as $filetype)
    @include("backend.partials.files",array("files"=>$acquiredFeature->files($filetype->id),"filetype"=>$filetype))
@endforeach

{{-- Phones --}}
@if(method_exists($acquiredFeature, 'phones'))
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <div class="bio-row">
            <p>
                <span>
                    {!! Form::label('phone', trans("acquiredFeature.phone")) !!}
                </span>
                <div id="phone-container">
                    @if (count($acquiredFeature->phones) > 0)
                        {{-- for edit fields --}}
                        @foreach ($acquiredFeature->phones as $phone)
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
@if (method_exists($acquiredFeature, 'address'))
    {{-- Longitude --}}
    <div class='bio-row{{ $errors->has('lng') ? ' has-error' : '' }}'>
        {!! Form::label('lng', 'Longitude') !!}
        {!! Form::text('lng', optional($acquiredFeature->address)->lng, array('id'=>'lng','class'=>'form-control')) !!}

        @if ($errors->has('lng'))
    		<span class='help-block'>
    			<strong>{{ $errors->first('lng') }}</strong>
    		</span>
    	@endif
    </div>
    {{-- latitude --}}
    <div class='bio-row{{ $errors->has('lat') ? ' has-error' : '' }}'>
        {!! Form::label('lat', 'Latitude') !!}
        {!! Form::text('lat', optional($acquiredFeature->address)->lat, array('id'=>'lat','class'=>'form-control')) !!}

        @if ($errors->has('lat'))
    		<span class='help-block'>
    			<strong>{{ $errors->first('lat') }}</strong>
    		</span>
    	@endif
    </div>
    {{-- Address --}}
    <div class='bio-row{{ $errors->has('address') ? ' has-error' : '' }}'>
        {!! Form::label('address', 'Address') !!}
        {!! Form::text('address', optional($acquiredFeature->address)->address, array('id'=>'address','class'=>'form-control')) !!}

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
    @if (method_exists($acquiredFeature, 'address'))
        <script type="text/javascript" src="/hydrogen/backend/js/address.js"></script>
        <script async defer
          src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API')}}&callback=initMap">
        </script>
        <script type="text/javascript">
          @if (isset($is_edit) && count($acquiredFeature->address) > 0)
            var isEdit = true;
            var lat = {{$acquiredFeature->address->lat}};
            var lng = {{$acquiredFeature->address->lng}};
          @else
            var isEdit = false;
          @endif
        </script>
    @endif
@stop
