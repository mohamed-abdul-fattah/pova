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
            <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
	</select>

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

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn "></i>Save
        </button>
    </div>
</div>
