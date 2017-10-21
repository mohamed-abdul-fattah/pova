@extends('layouts.app')

@section('content')
<section class="panel">
    <div class="panel-heading">

        <h3>{{ trans("main.Batch")." ".trans("city.Cities")." ".trans("main.Edit") }}</h3>

        {!! Form::open(array('method'=>'GET' ,'role'=>'form','class'=>'form-horizontal')) !!}
                {!! Form::input('search', 'q', null, array('id' => 'my_search','placeholder'=>'search', 'class'=>'pull-right input-sm')) !!}
          {!! Form::close() !!}
       {!! link_to_route('cities.create', trans("main.Addnew").trans("city.city"),null,array('class'=>'btn btn-success pull-right')) !!}
    </div>

  {!! Form::model($cities, array('method' => 'post', 'route' => array('cities.batchupdate'),'files'=>"true")) !!}

  @if ($cities->count())

@foreach ($cities as $city)
       <div class="panel-body row">
            {{-- {studly_case(cities['.$city->id.'][country_id])} --}}<div class='bio-row{{ $errors->has('cities['.$city->id.'][country_id]') ? ' has-error' : '' }}'>
	{!! Form::label('cities['.$city->id.'][country_id]', trans('city.CountryId')) !!}
	{!! Form::text('cities['.$city->id.'][country_id]', $city->cities['.$city->id.'][country_id], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('cities['.$city->id.'][country_id]'))
		<span class='help-block'>
			<strong>{{ $errors->first('cities['.$city->id.'][country_id]') }}</strong>
		</span>
	@endif
</div>{{-- End cities['.$city->id.'][country_id] --}}

{{-- {studly_case(cities['.$city->id.'][name])} --}}<div class='bio-row{{ $errors->has('cities['.$city->id.'][name]') ? ' has-error' : '' }}'>
	{!! Form::label('cities['.$city->id.'][name]', trans('city.Name')) !!}
	{!! Form::text('cities['.$city->id.'][name]', $city->cities['.$city->id.'][name], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('cities['.$city->id.'][name]'))
		<span class='help-block'>
			<strong>{{ $errors->first('cities['.$city->id.'][name]') }}</strong>
		</span>
	@endif
</div>{{-- End cities['.$city->id.'][name] --}}

       </div>
        @endforeach
       <div class="panel-footer">
            {!! Form::submit(trans("main.Update"), array('class' => 'btn btn-info')) !!}
       </div>
       </section>




    <?php echo  isset($_GET['q'])? $cities->appends(array("q"=>$_GET['q']))->links() : $cities->links(); ?>
  @else
	{{ trans("main.thereareno").trans("city.cities") }}
	@endif
      {!! Form::close() !!}

@stop
