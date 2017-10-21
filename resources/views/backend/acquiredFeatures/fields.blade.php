@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (isset($modelId))
    {!! Form::hidden('featureable_id', $modelId) !!}
@else
    <div class='bio-row'>
        {!! Form::label('featureable_id', trans("featureDetail.Featureable_id")) !!}
        {!! Form::input('number', 'featureable_id', null, array('class'=>'form-control', 'required'=>'required')) !!}
    </div>
@endif

@if(isset($class))
    {!! Form::hidden('featureable_type', $class) !!}
@else
    <div class='bio-row'>
        {!! Form::label('featureable_type', trans("featureDetail.Featureable_type")) !!}
        {!! Form::text('featureable_type', null, array('class'=>'form-control', 'required'=>'required')) !!}
    </div>
@endif

{{-- Feature --}}
<div class='bio-row{{ $errors->has('feature_id') ? ' has-error' : '' }}'>
	{!! Form::label('feature_id', trans('acquiredFeature.Feature')) !!}
    <select class="form-control select2" name="feature_id" required>
        <option>Select Feature</option>
        @foreach ($features as $key => $feature)
            <option value="{{$feature->id}}">{{json_decode($feature->name)->nameEn}}</option>
        @endforeach
    </select>

	@if ($errors->has('feature_id'))
		<span class='help-block'>
			<strong>{{ $errors->first('feature_id') }}</strong>
		</span>
	@endif
</div>
{{-- End feature --}}

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
