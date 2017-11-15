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
	{!! Form::label('category_id', trans('resource.Category')) !!}
    <select class="form-control" name="category_id" required>
        <option disabled selected>Select Category</option>
        @foreach ($categories as $key => $category)
            <optgroup label="{{nameLocale($category, 'En')}}">
                @foreach ($category->subCategories as $key => $sub)
                    <option value="{{$sub->id}}"
                    @if ($sub->id === $resource->category_id)
                        selected
                    @endif
                    >{{nameLocale($sub)}}
                    </option>
                    @endforeach
            </optgroup>
        @endforeach
    </select>

	@if ($errors->has('category_id'))
		<span class='help-block'>
			<strong>{{ $errors->first('category_id') }}</strong>
		</span>
	@endif
</div>
{{-- End category_id --}}

{{-- UserId --}}
<div class='bio-row{{ $errors->has('user_id') ? ' has-error' : '' }}'>
	{!! Form::label('user_id', trans('resource.Provider')) !!}
    <select class="form-control select2" name="user_id" required>
        <option disabled selected>Select a Provider</option>
        @foreach ($providers as $key => $provider)
            <option value="{{$provider->id}}"
            @if ($provider->id === $resource->user_id)
                selected
            @endif
            >{{$provider->name}}</option>
        @endforeach
    </select>

	@if ($errors->has('user_id'))
		<span class='help-block'>
			<strong>{{ $errors->first('user_id') }}</strong>
		</span>
	@endif
</div>
{{-- End userId --}}

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

{{-- Featured --}}
<div class='bio-row{{ $errors->has('featured') ? ' has-error' : '' }}'>
	{!! Form::checkbox('featured', true) !!}
    {!! Form::label('featured', trans('resource.Featured')) !!}
	@if ($errors->has('featured'))
		<span class='help-block'>
			<strong>{{ $errors->first('featured') }}</strong>
		</span>
	@endif
</div>
{{-- End featured --}}

@foreach($resource->phototypes() as $phototype)
    @include("backend.partials.images",array("pictures"=>$resource->photos($phototype->id),"phototype"=>$phototype))
@endforeach
@foreach($resource->filetypes() as $filetype)
    @include("backend.partials.files",array("files"=>$resource->files($filetype->id),"filetype"=>$filetype))
@endforeach

{{-- Address --}}
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
{{-- End address --}}

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>

@section('scripts')
    <script type="text/javascript" src="/hydrogen/backend/js/address.js"></script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API')}}&callback=initMap">
    </script>
    <script type="text/javascript">
      @if (isset($isEdit) && $resource->address)
        var isEdit = true;
        var lat = {{$resource->address->lat}};
        var lng = {{$resource->address->lng}};
      @else
        var isEdit = false;
      @endif
    </script>
@stop
