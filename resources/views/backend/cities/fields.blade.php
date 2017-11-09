@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- country_id --}}
<div class='bio-row{{ $errors->has('country_id') ? ' has-error' : '' }}'>
	{!! Form::label('country_id', trans('city.Country')) !!}
    <select class="form-control select2" name="country_id" required>
        @foreach ($countries as $key => $country)
            <option @if($country->id === $city->country_id) selected @endif value="{{$country->id}}">{{$country->name}}</option>
        @endforeach
    </select>

	@if ($errors->has('country_id'))
		<span class='help-block'>
			<strong>{{ $errors->first('country_id') }}</strong>
		</span>
	@endif
</div>
{{-- End country_id --}}

{{-- nameAr --}}
<div class='bio-row{{ $errors->has('nameAr') ? ' has-error' : '' }}'>
	{!! Form::label('nameAr', trans('city.NameAr')) !!}
	{!! Form::text('nameAr', nameLocale($city, 'Ar'), array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('nameAr'))
		<span class='help-block'>
			<strong>{{ $errors->first('nameAr') }}</strong>
		</span>
	@endif
</div>
{{-- End nameAr --}}

{{-- nameEn --}}
<div class='bio-row{{ $errors->has('nameEn') ? ' has-error' : '' }}'>
	{!! Form::label('nameEn', trans('city.NameEn')) !!}
	{!! Form::text('nameEn', nameLocale($city), array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('nameEn'))
		<span class='help-block'>
			<strong>{{ $errors->first('nameEn') }}</strong>
		</span>
	@endif
</div>
{{-- End nameEn --}}

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
