@extends('layouts.app')

@section('content')
<?php $nested= Route::getCurrentRoute()->parameterNames()[0]; ?>
<h3>{{ trans("main.Show")." ".trans("feature.Feature") }}</h3>

<p>{!! link_to_route($nested.'.index', trans("main.back")." ".trans("feature.features"),$nestedId) !!}</p>

 <section class="panel panel-default">
        <div class="panel-heading">
         <h4>{{ $feature->name }}</h4>
                </div>
 <div class="panel-body row">


			<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('feature.name') }} :</span>
		{{ $feature->name }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('feature.type') }} :</span>
		{{ $feature->type }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('feature.required') }} :</span>
		{{ $feature->required }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('feature.selections') }} :</span>
		{{ $feature->selections }}
	</p>
</div>


    @include('backend.partials.details',['model'=>$feature])
    @include('backend.partials.imagesshowall',['model'=>$feature])
    @include('backend.partials.comments',['commentable'=>$feature])
    @foreach($feature->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$feature->files($filetype->id),"filetype"=>$filetype))
    @endforeach


        </div>
        <div class="panel-footer row">

            @if(Auth::user()->can('edit_features'))


                {!! link_to_route($nested.'.features.edit', trans('main.Edit'), [$nestedId,$feature->id], array('class' => 'btn btn-info
                col-lg-1')) !!}

            @endif
            @if(Auth::user()->can('destroy_features'))

                {!! Form::open(array('method' => 'DELETE', 'route' => array($nested.'.features.destroy',
                $feature->id),["class"=>"col-lg-1"])) !!}
                {!! Form::submit(trans('main.Delete'), array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </section>
@stop