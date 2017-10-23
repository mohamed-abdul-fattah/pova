@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- NameAr --}}
<div class='bio-row{{ $errors->has('nameAr') ? ' has-error' : '' }}'>
	{!! Form::label('nameAr', trans('unit.NameAr')) !!}
	{!! Form::text('nameAr', localName($unit, 'Ar'), array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('nameAr'))
		<span class='help-block'>
			<strong>{{ $errors->first('nameAr') }}</strong>
		</span>
	@endif
</div>
{{-- End nameAr --}}

{{-- NameEn --}}
<div class='bio-row{{ $errors->has('nameEn') ? ' has-error' : '' }}'>
	{!! Form::label('nameEn', trans('unit.NameEn')) !!}
	{!! Form::text('nameEn', localName($unit), array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('nameEn'))
		<span class='help-block'>
			<strong>{{ $errors->first('nameEn') }}</strong>
		</span>
	@endif
</div>
{{-- End nameEn --}}

{{-- Type --}}
<div class='bio-row{{ $errors->has('type') ? ' has-error' : '' }}'>
	{!! Form::label('type', trans('unit.Type')) !!}
    <select class="form-control" name="type" required>
        <option value="day">Day</option>
    </select>

	@if ($errors->has('type'))
		<span class='help-block'>
			<strong>{{ $errors->first('type') }}</strong>
		</span>
	@endif
</div>
{{-- End type --}}

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
