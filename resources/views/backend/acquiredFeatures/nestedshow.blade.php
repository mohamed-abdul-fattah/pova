@extends('layouts.app')

@section('content')
<?php $nested= Route::getCurrentRoute()->parameterNames()[0]; ?>
<h3>{{ trans("main.Show")." ".trans("acquiredFeature.AcquiredFeature") }}</h3>

<p>{!! link_to_route($nested.'.index', trans("main.back")." ".trans("acquiredFeature.acquiredFeatures"),$nestedId) !!}</p>

 <section class="panel panel-default">
        <div class="panel-heading">
         <h4>{{ $acquiredFeature->name }}</h4>
                </div>
 <div class="panel-body row">


			<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('acquiredFeature.feature') }} :</span>
		{{ $acquiredFeature->feature?$acquiredFeature->feature->name:'' }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('acquiredFeature.featureable') }} :</span>
		{{ $acquiredFeature->featureable }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('acquiredFeature.value_string') }} :</span>
		{{ $acquiredFeature->value_string }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('acquiredFeature.value_number') }} :</span>
		{{ $acquiredFeature->value_number }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('acquiredFeature.value_boolean') }} :</span>
		{{ $acquiredFeature->value_boolean }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('acquiredFeature.value_text') }} :</span>
		{{ $acquiredFeature->value_text }}
	</p>
</div>


    @include('backend.partials.details',['model'=>$acquiredFeature])
    @include('backend.partials.imagesshowall',['model'=>$acquiredFeature])
    @include('backend.partials.comments',['commentable'=>$acquiredFeature])
    @foreach($acquiredFeature->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$acquiredFeature->files($filetype->id),"filetype"=>$filetype))
    @endforeach


        </div>
        <div class="panel-footer row">

            @if(Auth::user()->can('edit_acquiredFeatures'))


                {!! link_to_route($nested.'.acquiredFeatures.edit', trans('main.Edit'), [$nestedId,$acquiredFeature->id], array('class' => 'btn btn-info
                col-lg-1')) !!}

            @endif
            @if(Auth::user()->can('destroy_acquiredFeatures'))

                {!! Form::open(array('method' => 'DELETE', 'route' => array($nested.'.acquiredFeatures.destroy',
                $acquiredFeature->id),["class"=>"col-lg-1"])) !!}
                {!! Form::submit(trans('main.Delete'), array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </section>
@stop