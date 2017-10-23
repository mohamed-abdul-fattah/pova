@extends('layouts.app')

@section('content')
<?php $nested= Route::getCurrentRoute()->parameterNames()[0]; ?>
<h3>{{ trans("main.Show")." ".trans("price.Price") }}</h3>

<p>{!! link_to_route($nested.'.index', trans("main.back")." ".trans("price.prices"),$nestedId) !!}</p>

 <section class="panel panel-default">
        <div class="panel-heading">
         <h4>{{ $price->name }}</h4>
                </div>
 <div class="panel-body row">


			<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('price.resource') }} :</span>
		{{ $price->resource?$price->resource->name:'' }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('price.unit') }} :</span>
		{{ $price->unit?$price->unit->name:'' }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('price.availability') }} :</span>
		{{ $price->availability?$price->availability->name:'' }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('price.price') }} :</span>
		{{ $price->price }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('price.currency') }} :</span>
		{{ $price->currency }}
	</p>
</div>


    @include('backend.partials.details',['model'=>$price])
    @include('backend.partials.imagesshowall',['model'=>$price])
    @include('backend.partials.comments',['commentable'=>$price])
    @foreach($price->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$price->files($filetype->id),"filetype"=>$filetype))
    @endforeach


        </div>
        <div class="panel-footer row">

            @if(Auth::user()->can('edit_prices'))


                {!! link_to_route($nested.'.prices.edit', trans('main.Edit'), [$nestedId,$price->id], array('class' => 'btn btn-info
                col-lg-1')) !!}

            @endif
            @if(Auth::user()->can('destroy_prices'))

                {!! Form::open(array('method' => 'DELETE', 'route' => array($nested.'.prices.destroy',
                $price->id),["class"=>"col-lg-1"])) !!}
                {!! Form::submit(trans('main.Delete'), array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </section>
@stop