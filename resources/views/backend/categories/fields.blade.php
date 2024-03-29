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
	{!! Form::label('parent_id', trans('category.Parent')) !!}
	<select class="form-control" name="parent_id">
	    <option value="0">Parent Category</option>
        @foreach ($categories as $key => $cat)
            <option value="{{$cat->id}}">{{nameLocale($cat)}}</option>
        @endforeach
	</select>

	@if ($errors->has('parent_id'))
		<span class='help-block'>
			<strong>{{ $errors->first('parent_id') }}</strong>
		</span>
	@endif
</div>

<div class='bio-row{{ $errors->has('nameEN') ? ' has-error' : '' }}'>
	{!! Form::label('nameEn', trans('category.NameEn')) !!}
	{!!
        Form::text('nameEn', nameLocale($category), array(
            'class' => 'form-control',
            'required' => 'required'
        ))
    !!}

	@if ($errors->has('nameEn'))
		<span class='help-block'>
			<strong>{{ $errors->first('nameEn') }}</strong>
		</span>
	@endif
</div>

<div class='bio-row{{ $errors->has('nameAr') ? ' has-error' : '' }}'>
	{!! Form::label('nameAr', trans('category.NameAr')) !!}
	{!!
        Form::text('nameAr', nameLocale($category, 'Ar'), array(
            'class' => 'form-control',
            'required' => 'required'
        ))
    !!}

	@if ($errors->has('nameAr'))
		<span class='help-block'>
			<strong>{{ $errors->first('nameAr') }}</strong>
		</span>
	@endif
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
