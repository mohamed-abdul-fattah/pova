@extends('layouts.app')

@section('content')
<section class="panel">
    <div class="panel-heading">

        <h3>{{ trans("main.Batch")." ".trans("availability.Availabilities")." ".trans("main.Edit") }}</h3>

        {!! Form::open(array('method'=>'GET' ,'role'=>'form','class'=>'form-horizontal')) !!}
                {!! Form::input('search', 'q', null, array('id' => 'my_search','placeholder'=>'search', 'class'=>'pull-right input-sm')) !!}
          {!! Form::close() !!}
       {!! link_to_route('availabilities.create', trans("main.Addnew").trans("availability.availability"),null,array('class'=>'btn btn-success pull-right')) !!}
    </div>

  {!! Form::model($availabilities, array('method' => 'post', 'route' => array('availabilities.batchupdate'),'files'=>"true")) !!}

  @if ($availabilities->count())

@foreach ($availabilities as $availability)
       <div class="panel-body row">
            {{-- Availabilities['.$availability>id.'][resourceId] --}}
<div class='bio-row{{ $errors->has('availabilities['.$availability->id.'][resource_id]') ? ' has-error' : '' }}'>
	{!! Form::label('availabilities['.$availability->id.'][resource_id]', trans('availability.ResourceId')) !!}
	{!! Form::text('availabilities['.$availability->id.'][resource_id]', $availability->availabilities['.$availability->id.'][resource_id], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('availabilities['.$availability->id.'][resource_id]'))
		<span class='help-block'>
			<strong>{{ $errors->first('availabilities['.$availability->id.'][resource_id]') }}</strong>
		</span>
	@endif
</div>
{{-- End availabilities['.$availability->id.'][resource_id] --}}

{{-- Availabilities['.$availability>id.'][start] --}}
<div class='bio-row{{ $errors->has('availabilities['.$availability->id.'][start]') ? ' has-error' : '' }}'>
	{!! Form::label('availabilities['.$availability->id.'][start]', trans('availability.Start')) !!}
	{!! Form::input('date', 'availabilities['.$availability->id.'][start]', $availability->availabilities['.$availability->id.'][start], array('class' => 'form-control', 'required' => 'required')) !!}
	@if ($errors->has('availabilities['.$availability->id.'][start]'))
		<span class='help-block'>
			<strong>{{ $errors->first('availabilities['.$availability->id.'][start]') }}</strong>
		</span>
	@endif
</div>
{{-- End availabilities['.$availability->id.'][start] --}}

{{-- Availabilities['.$availability>id.'][end] --}}
<div class='bio-row{{ $errors->has('availabilities['.$availability->id.'][end]') ? ' has-error' : '' }}'>
	{!! Form::label('availabilities['.$availability->id.'][end]', trans('availability.End')) !!}
	{!! Form::input('date', 'availabilities['.$availability->id.'][end]', $availability->availabilities['.$availability->id.'][end], array('class' => 'form-control', 'required' => 'required')) !!}
	@if ($errors->has('availabilities['.$availability->id.'][end]'))
		<span class='help-block'>
			<strong>{{ $errors->first('availabilities['.$availability->id.'][end]') }}</strong>
		</span>
	@endif
</div>
{{-- End availabilities['.$availability->id.'][end] --}}

{{-- Availabilities['.$availability>id.'][type] --}}
<div class='bio-row{{ $errors->has('availabilities['.$availability->id.'][type]') ? ' has-error' : '' }}'>
	{!! Form::label('availabilities['.$availability->id.'][type]', trans('availability.Type')) !!}
	{!! Form::text('availabilities['.$availability->id.'][type]', $availability->availabilities['.$availability->id.'][type], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('availabilities['.$availability->id.'][type]'))
		<span class='help-block'>
			<strong>{{ $errors->first('availabilities['.$availability->id.'][type]') }}</strong>
		</span>
	@endif
</div>
{{-- End availabilities['.$availability->id.'][type] --}}

       </div>
        @endforeach
       <div class="panel-footer">
            {!! Form::submit(trans("main.Update"), array('class' => 'btn btn-info')) !!}
       </div>
       </section>




    <?php echo  isset($_GET['q'])? $availabilities->appends(array("q"=>$_GET['q']))->links() : $availabilities->links(); ?>
  @else
	{{ trans("main.thereareno").trans("availability.availabilities") }}
	@endif
      {!! Form::close() !!}

@stop
