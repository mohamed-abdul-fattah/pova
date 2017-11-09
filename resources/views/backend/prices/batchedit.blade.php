@extends('layouts.app')

@section('content')
<section class="panel">
    <div class="panel-heading">

        <h3>{{ trans("main.Batch")." ".trans("price.Prices")." ".trans("main.Edit") }}</h3>

        {!! Form::open(array('method'=>'GET' ,'role'=>'form','class'=>'form-horizontal')) !!}
                {!! Form::input('search', 'q', null, array('id' => 'my_search','placeholder'=>'search', 'class'=>'pull-right input-sm')) !!}
          {!! Form::close() !!}
       {!! link_to_route('prices.create', trans("main.Addnew").trans("price.price"),null,array('class'=>'btn btn-success pull-right')) !!}
    </div>

  {!! Form::model($prices, array('method' => 'post', 'route' => array('prices.batchupdate'),'files'=>"true")) !!}

  @if ($prices->count())

@foreach ($prices as $price)
       <div class="panel-body row">
            {{-- Prices['.$price>id.'][resourceId] --}}
<div class='bio-row{{ $errors->has('prices['.$price->id.'][resource_id]') ? ' has-error' : '' }}'>
	{!! Form::label('prices['.$price->id.'][resource_id]', trans('price.ResourceId')) !!}
	{!! Form::text('prices['.$price->id.'][resource_id]', $price->prices['.$price->id.'][resource_id], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('prices['.$price->id.'][resource_id]'))
		<span class='help-block'>
			<strong>{{ $errors->first('prices['.$price->id.'][resource_id]') }}</strong>
		</span>
	@endif
</div>
{{-- End prices['.$price->id.'][resource_id] --}}

{{-- Prices['.$price>id.'][unitId] --}}
<div class='bio-row{{ $errors->has('prices['.$price->id.'][unit_id]') ? ' has-error' : '' }}'>
	{!! Form::label('prices['.$price->id.'][unit_id]', trans('price.UnitId')) !!}
	{!! Form::text('prices['.$price->id.'][unit_id]', $price->prices['.$price->id.'][unit_id], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('prices['.$price->id.'][unit_id]'))
		<span class='help-block'>
			<strong>{{ $errors->first('prices['.$price->id.'][unit_id]') }}</strong>
		</span>
	@endif
</div>
{{-- End prices['.$price->id.'][unit_id] --}}

{{-- Prices['.$price>id.'][availabilityId] --}}
<div class='bio-row{{ $errors->has('prices['.$price->id.'][availability_id]') ? ' has-error' : '' }}'>
	{!! Form::label('prices['.$price->id.'][availability_id]', trans('price.AvailabilityId')) !!}
	{!! Form::text('prices['.$price->id.'][availability_id]', $price->prices['.$price->id.'][availability_id], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('prices['.$price->id.'][availability_id]'))
		<span class='help-block'>
			<strong>{{ $errors->first('prices['.$price->id.'][availability_id]') }}</strong>
		</span>
	@endif
</div>
{{-- End prices['.$price->id.'][availability_id] --}}

{{-- Prices['.$price>id.'][price] --}}
<div class='bio-row{{ $errors->has('prices['.$price->id.'][price]') ? ' has-error' : '' }}'>
	{!! Form::label('prices['.$price->id.'][price]', trans('price.Price')) !!}
	{!! Form::text('prices['.$price->id.'][price]', $price->prices['.$price->id.'][price], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('prices['.$price->id.'][price]'))
		<span class='help-block'>
			<strong>{{ $errors->first('prices['.$price->id.'][price]') }}</strong>
		</span>
	@endif
</div>
{{-- End prices['.$price->id.'][price] --}}

{{-- Prices['.$price>id.'][currency] --}}
<div class='bio-row{{ $errors->has('prices['.$price->id.'][currency]') ? ' has-error' : '' }}'>
	{!! Form::label('prices['.$price->id.'][currency]', trans('price.Currency')) !!}
	{!! Form::text('prices['.$price->id.'][currency]', $price->prices['.$price->id.'][currency], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('prices['.$price->id.'][currency]'))
		<span class='help-block'>
			<strong>{{ $errors->first('prices['.$price->id.'][currency]') }}</strong>
		</span>
	@endif
</div>
{{-- End prices['.$price->id.'][currency] --}}

       </div>
        @endforeach
       <div class="panel-footer">
            {!! Form::submit(trans("main.Update"), array('class' => 'btn btn-info')) !!}
       </div>
       </section>




    <?php echo  isset($_GET['q'])? $prices->appends(array("q"=>$_GET['q']))->links() : $prices->links(); ?>
  @else
	{{ trans("main.thereareno").trans("price.prices") }}
	@endif
      {!! Form::close() !!}

@stop
