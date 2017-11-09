@extends('layouts.app')

@section('content')
<?php $nested= Route::getCurrentRoute()->parameterNames()[0]; ?>
<h3>{{ trans("main.Show")." ".trans("availability.Availability") }}</h3>

<p>{!! link_to_route($nested.'.index', trans("main.back")." ".trans("availability.availabilities"),$nestedId) !!}</p>

 <section class="panel panel-default">
        <div class="panel-heading">
         <h4>{{ $availability->name }}</h4>
                </div>
 <div class="panel-body row">


			<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('availability.resource') }} :</span>
		{{ $availability->resource?$availability->resource->name:'' }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('availability.start') }} :</span>
		{{ $availability->start }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('availability.end') }} :</span>
		{{ $availability->end }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('availability.type') }} :</span>
		{{ $availability->type }}
	</p>
</div>


    @include('backend.partials.details',['model'=>$availability])
    @include('backend.partials.imagesshowall',['model'=>$availability])
    @include('backend.partials.comments',['commentable'=>$availability])
    @foreach($availability->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$availability->files($filetype->id),"filetype"=>$filetype))
    @endforeach


        </div>
        <div class="panel-footer row">

            @if(Auth::user()->can('edit_availabilities'))


                {!! link_to_route($nested.'.availabilities.edit', trans('main.Edit'), [$nestedId,$availability->id], array('class' => 'btn btn-info
                col-lg-1')) !!}

            @endif
            @if(Auth::user()->can('destroy_availabilities'))

                {!! Form::open(array('method' => 'DELETE', 'route' => array($nested.'.availabilities.destroy',
                $availability->id),["class"=>"col-lg-1"])) !!}
                {!! Form::submit(trans('main.Delete'), array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </section>
@stop