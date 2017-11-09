@extends('layouts.app')

@section('content')
<?php $nested= Route::getCurrentRoute()->parameterNames()[0]; ?>
<h3>{{ trans("main.Show")." ".trans("city.City") }}</h3>

<p>{!! link_to_route($nested.'.index', trans("main.back")." ".trans("city.cities"),$nestedId) !!}</p>

 <section class="panel panel-default">
        <div class="panel-heading">
         <h4>{{ $city->name }}</h4>
                </div>
 <div class="panel-body row">


			<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('city.country') }} :</span>
		{{ $city->country?$city->country->name:'' }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('city.name') }} :</span>
		{{ $city->name }}
	</p>
</div>


    @include('backend.partials.details',['model'=>$city])
    @include('backend.partials.imagesshowall',['model'=>$city])
    @include('backend.partials.comments',['commentable'=>$city])
    @foreach($city->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$city->files($filetype->id),"filetype"=>$filetype))
    @endforeach


        </div>
        <div class="panel-footer row">

            @if(Auth::user()->can('edit_cities'))


                {!! link_to_route($nested.'.cities.edit', trans('main.Edit'), [$nestedId,$city->id], array('class' => 'btn btn-info
                col-lg-1')) !!}

            @endif
            @if(Auth::user()->can('destroy_cities'))

                {!! Form::open(array('method' => 'DELETE', 'route' => array($nested.'.cities.destroy',
                $city->id),["class"=>"col-lg-1"])) !!}
                {!! Form::submit(trans('main.Delete'), array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </section>
@stop