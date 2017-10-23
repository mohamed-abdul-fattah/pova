@extends('layouts.app')

@section('content')
<?php $nested= Route::getCurrentRoute()->parameterNames()[0]; ?>
<h3>{{ trans("main.Show")." ".trans("resource.Resource") }}</h3>

<p>{!! link_to_route($nested.'.index', trans("main.back")." ".trans("resource.resources"),$nestedId) !!}</p>

 <section class="panel panel-default">
        <div class="panel-heading">
         <h4>{{ $resource->name }}</h4>
                </div>
 <div class="panel-body row">


			<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('resource.category') }} :</span>
		{{ $resource->category?$resource->category->name:'' }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('resource.user') }} :</span>
		{{ $resource->user?$resource->user->name:'' }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('resource.title') }} :</span>
		{{ $resource->title }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('resource.feature') }} :</span>
		{{ $resource->feature }}
	</p>
</div>


    @include('backend.partials.details',['model'=>$resource])
    @include('backend.partials.imagesshowall',['model'=>$resource])
    @include('backend.partials.comments',['commentable'=>$resource])
    @foreach($resource->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$resource->files($filetype->id),"filetype"=>$filetype))
    @endforeach


        </div>
        <div class="panel-footer row">

            @if(Auth::user()->can('edit_resources'))


                {!! link_to_route($nested.'.resources.edit', trans('main.Edit'), [$nestedId,$resource->id], array('class' => 'btn btn-info
                col-lg-1')) !!}

            @endif
            @if(Auth::user()->can('destroy_resources'))

                {!! Form::open(array('method' => 'DELETE', 'route' => array($nested.'.resources.destroy',
                $resource->id),["class"=>"col-lg-1"])) !!}
                {!! Form::submit(trans('main.Delete'), array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </section>
@stop