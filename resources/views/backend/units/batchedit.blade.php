@extends('layouts.app')

@section('content')
<section class="panel">
    <div class="panel-heading">

        <h3>{{ trans("main.Batch")." ".trans("unit.Units")." ".trans("main.Edit") }}</h3>

        {!! Form::open(array('method'=>'GET' ,'role'=>'form','class'=>'form-horizontal')) !!}
                {!! Form::input('search', 'q', null, array('id' => 'my_search','placeholder'=>'search', 'class'=>'pull-right input-sm')) !!}
          {!! Form::close() !!}
       {!! link_to_route('units.create', trans("main.Addnew").trans("unit.unit"),null,array('class'=>'btn btn-success pull-right')) !!}
    </div>

  {!! Form::model($units, array('method' => 'post', 'route' => array('units.batchupdate'),'files'=>"true")) !!}

  @if ($units->count())

@foreach ($units as $unit)
       <div class="panel-body row">
            {{-- Units['.$unit>id.'][name] --}}
<div class='bio-row{{ $errors->has('units['.$unit->id.'][name]') ? ' has-error' : '' }}'>
	{!! Form::label('units['.$unit->id.'][name]', trans('unit.Name')) !!}
	{!! Form::text('units['.$unit->id.'][name]', $unit->units['.$unit->id.'][name], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('units['.$unit->id.'][name]'))
		<span class='help-block'>
			<strong>{{ $errors->first('units['.$unit->id.'][name]') }}</strong>
		</span>
	@endif
</div>
{{-- End units['.$unit->id.'][name] --}}

{{-- Units['.$unit>id.'][type] --}}
<div class='bio-row{{ $errors->has('units['.$unit->id.'][type]') ? ' has-error' : '' }}'>
	{!! Form::label('units['.$unit->id.'][type]', trans('unit.Type')) !!}
	{!! Form::text('units['.$unit->id.'][type]', $unit->units['.$unit->id.'][type], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('units['.$unit->id.'][type]'))
		<span class='help-block'>
			<strong>{{ $errors->first('units['.$unit->id.'][type]') }}</strong>
		</span>
	@endif
</div>
{{-- End units['.$unit->id.'][type] --}}

       </div>
        @endforeach
       <div class="panel-footer">
            {!! Form::submit(trans("main.Update"), array('class' => 'btn btn-info')) !!}
       </div>
       </section>




    <?php echo  isset($_GET['q'])? $units->appends(array("q"=>$_GET['q']))->links() : $units->links(); ?>
  @else
	{{ trans("main.thereareno").trans("unit.units") }}
	@endif
      {!! Form::close() !!}

@stop
