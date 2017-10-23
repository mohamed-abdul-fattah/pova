@extends('layouts.app')

@section('content')
<?php $nested= Route::getCurrentRoute()->parameterNames()[0]; ?>
<h3>{{ trans("main.Show")." ".trans("unit.Unit") }}</h3>

<p>{!! link_to_route($nested.'.index', trans("main.back")." ".trans("unit.units"),$nestedId) !!}</p>

 <section class="panel panel-default">
        <div class="panel-heading">
         <h4>{{ $unit->name }}</h4>
                </div>
 <div class="panel-body row">


			<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('unit.name') }} :</span>
		{{ $unit->name }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('unit.type') }} :</span>
		{{ $unit->type }}
	</p>
</div>


    @include('backend.partials.details',['model'=>$unit])
    @include('backend.partials.imagesshowall',['model'=>$unit])
    @include('backend.partials.comments',['commentable'=>$unit])
    @foreach($unit->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$unit->files($filetype->id),"filetype"=>$filetype))
    @endforeach


        </div>
        <div class="panel-footer row">

            @if(Auth::user()->can('edit_units'))


                {!! link_to_route($nested.'.units.edit', trans('main.Edit'), [$nestedId,$unit->id], array('class' => 'btn btn-info
                col-lg-1')) !!}

            @endif
            @if(Auth::user()->can('destroy_units'))

                {!! Form::open(array('method' => 'DELETE', 'route' => array($nested.'.units.destroy',
                $unit->id),["class"=>"col-lg-1"])) !!}
                {!! Form::submit(trans('main.Delete'), array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </section>
@stop