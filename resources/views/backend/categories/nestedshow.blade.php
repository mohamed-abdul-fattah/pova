@extends('layouts.app')

@section('content')
<?php $nested= Route::getCurrentRoute()->parameterNames()[0]; ?>
<h3>{{ trans("main.Show")." ".trans("category.Category") }}</h3>

<p>{!! link_to_route($nested.'.index', trans("main.back")." ".trans("category.categories"),$nestedId) !!}</p>

 <section class="panel panel-default">
        <div class="panel-heading">
         <h4>{{ $category->name }}</h4>
                </div>
 <div class="panel-body row">


			<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('category.parent') }} :</span>
		{{ $category->parent?$category->parent->name:'' }}
	</p>
</div>

					<div class='bio-row'>
	<p>
		<span class='bold'>{{ trans('category.name') }} :</span>
		{{ $category->name }}
	</p>
</div>


    @include('backend.partials.details',['model'=>$category])
    @include('backend.partials.imagesshowall',['model'=>$category])
    @include('backend.partials.comments',['commentable'=>$category])
    @foreach($category->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$category->files($filetype->id),"filetype"=>$filetype))
    @endforeach


        </div>
        <div class="panel-footer row">

            @if(Auth::user()->can('edit_categories'))


                {!! link_to_route($nested.'.categories.edit', trans('main.Edit'), [$nestedId,$category->id], array('class' => 'btn btn-info
                col-lg-1')) !!}

            @endif
            @if(Auth::user()->can('destroy_categories'))

                {!! Form::open(array('method' => 'DELETE', 'route' => array($nested.'.categories.destroy',
                $category->id),["class"=>"col-lg-1"])) !!}
                {!! Form::submit(trans('main.Delete'), array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </section>
@stop
