@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- CategoryId --}}
<div class='bio-row{{ $errors->has('category_id') ? ' has-error' : '' }}'>
	{!! Form::label('category_id', trans('resource.CategoryId')) !!}
	{!! Form::text('category_id', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('category_id'))
		<span class='help-block'>
			<strong>{{ $errors->first('category_id') }}</strong>
		</span>
	@endif
</div>
{{-- End category_id --}}

{{-- UserId --}}
<div class='bio-row{{ $errors->has('user_id') ? ' has-error' : '' }}'>
	{!! Form::label('user_id', trans('resource.UserId')) !!}
	{!! Form::text('user_id', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('user_id'))
		<span class='help-block'>
			<strong>{{ $errors->first('user_id') }}</strong>
		</span>
	@endif
</div>
{{-- End user_id --}}

{{-- Title --}}
<div class='bio-row{{ $errors->has('title') ? ' has-error' : '' }}'>
	{!! Form::label('title', trans('resource.Title')) !!}
	{!! Form::text('title', null, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('title'))
		<span class='help-block'>
			<strong>{{ $errors->first('title') }}</strong>
		</span>
	@endif
</div>
{{-- End title --}}

{{-- Feature --}}
<div class='bio-row{{ $errors->has('feature') ? ' has-error' : '' }}'>
	{!! Form::label('feature', trans('resource.Feature')) !!}
	{!! Form::checkbox('feature', null) !!}
	@if ($errors->has('feature'))
		<span class='help-block'>
			<strong>{{ $errors->first('feature') }}</strong>
		</span>
	@endif
</div>
{{-- End feature --}}


@foreach($resource->phototypes() as $phototype)
    @include("backend.partials.images",array("pictures"=>$resource->photos($phototype->id),"phototype"=>$phototype))
@endforeach
@foreach($resource->filetypes() as $filetype)
    @include("backend.partials.files",array("files"=>$resource->files($filetype->id),"filetype"=>$filetype))
@endforeach

{{-- Phones --}}
@if(method_exists($resource, 'phones'))
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <div class="bio-row">
            <p>
                <span>
                    {!! Form::label('phone', trans("resource.phone")) !!}
                </span>
                <div id="phone-container">
                    @if (count($resource->phones) > 0)
                        {{-- for edit fields --}}
                        @foreach ($resource->phones as $phone)
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
@if (method_exists($resource, 'address'))
    {{-- Longitude --}}
    <div class='bio-row{{ $errors->has('lng') ? ' has-error' : '' }}'>
        {!! Form::label('lng', 'Longitude') !!}
        {!! Form::text('lng', optional($resource->address)->lng, array('id'=>'lng','class'=>'form-control')) !!}

        @if ($errors->has('lng'))
    		<span class='help-block'>
    			<strong>{{ $errors->first('lng') }}</strong>
    		</span>
    	@endif
    </div>
    {{-- latitude --}}
    <div class='bio-row{{ $errors->has('lat') ? ' has-error' : '' }}'>
        {!! Form::label('lat', 'Latitude') !!}
        {!! Form::text('lat', optional($resource->address)->lat, array('id'=>'lat','class'=>'form-control')) !!}

        @if ($errors->has('lat'))
    		<span class='help-block'>
    			<strong>{{ $errors->first('lat') }}</strong>
    		</span>
    	@endif
    </div>
    {{-- Address --}}
    <div class='bio-row{{ $errors->has('address') ? ' has-error' : '' }}'>
        {!! Form::label('address', 'Address') !!}
        {!! Form::text('address', optional($resource->address)->address, array('id'=>'address','class'=>'form-control')) !!}

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
    @if (method_exists($resource, 'address'))
        <script type="text/javascript" src="/hydrogen/backend/js/address.js"></script>
        <script async defer
          src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API')}}&callback=initMap">
        </script>
        <script type="text/javascript">
          @if (isset($is_edit) && count($resource->address) > 0)
            var isEdit = true;
            var lat = {{$resource->address->lat}};
            var lng = {{$resource->address->lng}};
          @else
            var isEdit = false;
          @endif
        </script>
    @endif
@stop
