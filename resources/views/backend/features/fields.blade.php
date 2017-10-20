@if ($feature->type !== 'selection')
<style media="screen">
    #selections-field {
        display: none;
    }
</style>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class='bio-row{{ $errors->has('nameAr') ? ' has-error' : '' }}'>
	{!! Form::label('nameAr', trans('feature.NameAr')) !!}
	{!! Form::text('nameAr', optional(json_decode($feature->name))->nameAr, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('nameAr'))
		<span class='help-block'>
			<strong>{{ $errors->first('nameAr') }}</strong>
		</span>
	@endif
</div>

<div class='bio-row{{ $errors->has('nameEn') ? ' has-error' : '' }}'>
	{!! Form::label('nameEn', trans('feature.NameEn')) !!}
	{!! Form::text('nameEn', optional(json_decode($feature->name))->nameEn, array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('nameEn'))
		<span class='help-block'>
			<strong>{{ $errors->first('nameEn') }}</strong>
		</span>
	@endif
</div>

<div class='bio-row{{ $errors->has('type') ? ' has-error' : '' }}'>
	{!! Form::label('type', trans('feature.Type')) !!}
	<select class="form-control" name="type">
	    <option @if($feature->type === 'string') selected @endif value="string">String</option>
	    <option @if($feature->type === 'text') selected @endif value="text">Text</option>
	    <option @if($feature->type === 'email') selected @endif value="email">Email</option>
	    <option @if($feature->type === 'number') selected @endif value="number">Number</option>
	    <option @if($feature->type === 'boolean') selected @endif value="boolean">boolean</option>
	    <option @if($feature->type === 'selection') selected @endif value="selection">Selection</option>
	</select>

	@if ($errors->has('type'))
		<span class='help-block'>
			<strong>{{ $errors->first('type') }}</strong>
		</span>
	@endif
</div>

<div id="selections-field" class='bio-row{{ $errors->has('selections') ? ' has-error' : '' }}'>
	{!! Form::label('selections', trans('feature.Selections')) !!}
	{!!
        Form::text('selections', null, array(
            'class'       => 'form-control',
            'placeholder' => 'select1,select2,select3,...'
        ))
    !!}

	@if ($errors->has('selections'))
		<span class='help-block'>
			<strong>{{ $errors->first('selections') }}</strong>
		</span>
	@endif
</div>

<div class='bio-row{{ $errors->has('required') ? ' has-error' : '' }}'>
    {!! Form::checkbox('required', 1) !!}
	{!! Form::label('required', trans('feature.Required')) !!}
	@if ($errors->has('required'))
		<span class='help-block'>
			<strong>{{ $errors->first('required') }}</strong>
		</span>
	@endif
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
