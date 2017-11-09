@extends('layouts.app')

@section('content')
<section class="panel">
    <div class="panel-heading">

        <h3>{{ trans("main.Batch")." ".trans("acquiredFeature.AcquiredFeatures")." ".trans("main.Edit") }}</h3>

        {!! Form::open(array('method'=>'GET' ,'role'=>'form','class'=>'form-horizontal')) !!}
                {!! Form::input('search', 'q', null, array('id' => 'my_search','placeholder'=>'search', 'class'=>'pull-right input-sm')) !!}
          {!! Form::close() !!}
       {!! link_to_route('acquiredFeatures.create', trans("main.Addnew").trans("acquiredFeature.acquiredFeature"),null,array('class'=>'btn btn-success pull-right')) !!}
    </div>

  {!! Form::model($acquiredFeatures, array('method' => 'post', 'route' => array('acquiredFeatures.batchupdate'),'files'=>"true")) !!}

  @if ($acquiredFeatures->count())

@foreach ($acquiredFeatures as $acquiredFeature)
       <div class="panel-body row">
            {{-- acquiredFeatures['.$acquiredFeature->id.'][feature_id] --}}
            <div class='bio-row{{ $errors->has('acquiredFeatures['.$acquiredFeature->id.'][feature_id]') ? ' has-error' : '' }}'>
	{!! Form::label('acquiredFeatures['.$acquiredFeature->id.'][feature_id]', trans('acquiredFeature.FeatureId')) !!}
	{!! Form::text('acquiredFeatures['.$acquiredFeature->id.'][feature_id]', $acquiredFeature->acquiredFeatures['.$acquiredFeature->id.'][feature_id], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('acquiredFeatures['.$acquiredFeature->id.'][feature_id]'))
		<span class='help-block'>
			<strong>{{ $errors->first('acquiredFeatures['.$acquiredFeature->id.'][feature_id]') }}</strong>
		</span>
	@endif
</div>
            {{-- End acquiredFeatures['.$acquiredFeature->id.'][feature_id] --}}

{{-- acquiredFeatures['.$acquiredFeature->id.'][featureable] --}}
            <div class='bio-row{{ $errors->has('acquiredFeatures['.$acquiredFeature->id.'][featureable]') ? ' has-error' : '' }}'>
	{!! Form::label('acquiredFeatures['.$acquiredFeature->id.'][featureable]', trans('acquiredFeature.Featureable')) !!}
	{!! Form::text('acquiredFeatures['.$acquiredFeature->id.'][featureable]', $acquiredFeature->acquiredFeatures['.$acquiredFeature->id.'][featureable], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('acquiredFeatures['.$acquiredFeature->id.'][featureable]'))
		<span class='help-block'>
			<strong>{{ $errors->first('acquiredFeatures['.$acquiredFeature->id.'][featureable]') }}</strong>
		</span>
	@endif
</div>
            {{-- End acquiredFeatures['.$acquiredFeature->id.'][featureable] --}}

{{-- acquiredFeatures['.$acquiredFeature->id.'][value_string] --}}
            <div class='bio-row{{ $errors->has('acquiredFeatures['.$acquiredFeature->id.'][value_string]') ? ' has-error' : '' }}'>
	{!! Form::label('acquiredFeatures['.$acquiredFeature->id.'][value_string]', trans('acquiredFeature.ValueString')) !!}
	{!! Form::text('acquiredFeatures['.$acquiredFeature->id.'][value_string]', $acquiredFeature->acquiredFeatures['.$acquiredFeature->id.'][value_string], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('acquiredFeatures['.$acquiredFeature->id.'][value_string]'))
		<span class='help-block'>
			<strong>{{ $errors->first('acquiredFeatures['.$acquiredFeature->id.'][value_string]') }}</strong>
		</span>
	@endif
</div>
            {{-- End acquiredFeatures['.$acquiredFeature->id.'][value_string] --}}

{{-- acquiredFeatures['.$acquiredFeature->id.'][value_number] --}}
            <div class='bio-row{{ $errors->has('acquiredFeatures['.$acquiredFeature->id.'][value_number]') ? ' has-error' : '' }}'>
	{!! Form::label('acquiredFeatures['.$acquiredFeature->id.'][value_number]', trans('acquiredFeature.ValueNumber')) !!}
	{!! Form::text('acquiredFeatures['.$acquiredFeature->id.'][value_number]', $acquiredFeature->acquiredFeatures['.$acquiredFeature->id.'][value_number], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('acquiredFeatures['.$acquiredFeature->id.'][value_number]'))
		<span class='help-block'>
			<strong>{{ $errors->first('acquiredFeatures['.$acquiredFeature->id.'][value_number]') }}</strong>
		</span>
	@endif
</div>
            {{-- End acquiredFeatures['.$acquiredFeature->id.'][value_number] --}}

{{-- acquiredFeatures['.$acquiredFeature->id.'][value_boolean] --}}
            <div class='bio-row{{ $errors->has('acquiredFeatures['.$acquiredFeature->id.'][value_boolean]') ? ' has-error' : '' }}'>
	{!! Form::label('acquiredFeatures['.$acquiredFeature->id.'][value_boolean]', trans('acquiredFeature.ValueBoolean')) !!}
	{!! Form::checkbox('acquiredFeatures['.$acquiredFeature->id.'][value_boolean]', $acquiredFeature->acquiredFeatures['.$acquiredFeature->id.'][value_boolean]) !!}
	@if ($errors->has('acquiredFeatures['.$acquiredFeature->id.'][value_boolean]'))
		<span class='help-block'>
			<strong>{{ $errors->first('acquiredFeatures['.$acquiredFeature->id.'][value_boolean]') }}</strong>
		</span>
	@endif
</div>
            {{-- End acquiredFeatures['.$acquiredFeature->id.'][value_boolean] --}}

{{-- acquiredFeatures['.$acquiredFeature->id.'][value_text] --}}
            <div class='bio-row{{ $errors->has('acquiredFeatures['.$acquiredFeature->id.'][value_text]') ? ' has-error' : '' }}'>
	{!! Form::label('acquiredFeatures['.$acquiredFeature->id.'][value_text]', trans('acquiredFeature.ValueText')) !!}
	{!! Form::textarea('acquiredFeatures['.$acquiredFeature->id.'][value_text]', $acquiredFeature->acquiredFeatures['.$acquiredFeature->id.'][value_text], array('class' => 'form-control', 'required' => 'required')) !!}
	@if ($errors->has('acquiredFeatures['.$acquiredFeature->id.'][value_text]'))
		<span class='help-block'>
			<strong>{{ $errors->first('acquiredFeatures['.$acquiredFeature->id.'][value_text]') }}</strong>
		</span>
	@endif
</div>
            {{-- End acquiredFeatures['.$acquiredFeature->id.'][value_text] --}}

       </div>
        @endforeach
       <div class="panel-footer">
            {!! Form::submit(trans("main.Update"), array('class' => 'btn btn-info')) !!}
       </div>
       </section>




    <?php echo  isset($_GET['q'])? $acquiredFeatures->appends(array("q"=>$_GET['q']))->links() : $acquiredFeatures->links(); ?>
  @else
	{{ trans("main.thereareno").trans("acquiredFeature.acquiredFeatures") }}
	@endif
      {!! Form::close() !!}

@stop
