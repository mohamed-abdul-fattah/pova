@extends('layouts.app')

@section('content')
<section class="panel">
    <div class="panel-heading">

        <h3>{{ trans("main.Batch")." ".trans("feature.features")." ".trans("main.Edit") }}</h3>

        {!! Form::open(array('method'=>'GET' ,'role'=>'form','class'=>'form-horizontal')) !!}
                {!! Form::input('search', 'q', null, array('id' => 'my_search','placeholder'=>'search', 'class'=>'pull-right input-sm')) !!}
          {!! Form::close() !!}
       {!! link_to_route('features.create', trans("main.Addnew").trans("feature.feature"),null,array('class'=>'btn btn-success pull-right')) !!}
    </div>

  {!! Form::model($features, array('method' => 'post', 'route' => array('features.batchupdate'),'files'=>"true")) !!}

  @if ($features->count())

@foreach ($features as $feature)
       <div class="panel-body row">
            <div class='bio-row{{ $errors->has('features['.$feature->id.'][name]') ? ' has-error' : '' }}'>
	{!! Form::label('features['.$feature->id.'][name]', trans('feature.Name')) !!}
	{!! Form::text('features['.$feature->id.'][name]', $feature->features['.$feature->id.'][name], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('features['.$feature->id.'][name]'))
		<span class='help-block'>
			<strong>{{ $errors->first('features['.$feature->id.'][name]') }}</strong>
		</span>
	@endif
</div>

<div class='bio-row{{ $errors->has('features['.$feature->id.'][type]') ? ' has-error' : '' }}'>
	{!! Form::label('features['.$feature->id.'][type]', trans('feature.Type')) !!}
	{!! Form::text('features['.$feature->id.'][type]', $feature->features['.$feature->id.'][type], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('features['.$feature->id.'][type]'))
		<span class='help-block'>
			<strong>{{ $errors->first('features['.$feature->id.'][type]') }}</strong>
		</span>
	@endif
</div>

<div class='bio-row{{ $errors->has('features['.$feature->id.'][required]') ? ' has-error' : '' }}'>
	{!! Form::label('features['.$feature->id.'][required]', trans('feature.Required')) !!}
	{!! Form::checkbox('features['.$feature->id.'][required]', $feature->features['.$feature->id.'][required])) !!}
	@if ($errors->has('features['.$feature->id.'][required]'))
		<span class='help-block'>
			<strong>{{ $errors->first('features['.$feature->id.'][required]') }}</strong>
		</span>
	@endif
</div>

<div class='bio-row{{ $errors->has('features['.$feature->id.'][selections]') ? ' has-error' : '' }}'>
	{!! Form::label('features['.$feature->id.'][selections]', trans('feature.Selections')) !!}
	{!! Form::text('features['.$feature->id.'][selections]', $feature->features['.$feature->id.'][selections], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('features['.$feature->id.'][selections]'))
		<span class='help-block'>
			<strong>{{ $errors->first('features['.$feature->id.'][selections]') }}</strong>
		</span>
	@endif
</div>

       </div>
        @endforeach
       <div class="panel-footer">
            {!! Form::submit(trans("main.Update"), array('class' => 'btn btn-info')) !!}
       </div>
       </section>




    <?php echo  isset($_GET['q'])? $features->appends(array("q"=>$_GET['q']))->links() : $features->links(); ?>
  @else
	{{ trans("main.thereareno").trans("feature.features") }}
	@endif
      {!! Form::close() !!}

@stop
