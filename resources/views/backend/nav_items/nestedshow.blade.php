@extends('layouts.app')

@section('content')
<?php $nested=  explode('.',Route::current()->getName())[0]; ?>
<h3>{{ trans("main.Show")." ".trans("nav_item.Nav_item") }}</h3>

<p>{!! link_to_route($nested.'.index', trans("main.back")." ".trans("nav_item.nav_items"),$nestedId) !!}</p>

 <section class="panel panel-default">
        <div class="panel-heading">
         <h4>{{ $nav_item->name }}</h4>
                </div>
 <div class="panel-body row">


			<div class='bio-row'><p><span class='bold'>{{ trans('nav_item.name') }} :</span>
                        {{ $nav_item->name }}</p></div>
					<div class='bio-row'><p><span class='bold'>{{ trans('nav_item.route') }} :</span>
                        {{ $nav_item->route }}</p></div>
					<div class='bio-row'><p><span class='bold'>{{ trans('nav_item.icon') }} :</span>
                        {{ $nav_item->icon }}</p></div>
					<div class='bio-row'><p><span class='bold'>{{ trans('nav_item.nav') }} :</span>
                        {{ $nav_item->->name }}</p></div>
					<div class='bio-row'><p><span class='bold'>{{ trans('nav_item.nav_item') }} :</span>
                        {{ $nav_item->nav_i->name }}</p></div>

    @include('backend.partials.details',['model'=>$nav_item])
    @include('backend.partials.imagesshowall',['model'=>$nav_item])
    @include('backend.partials.comments',['commentable'=>$nav_item])
    @foreach($nav_item->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$nav_item->files($filetype->id),"filetype"=>$filetype))
    @endforeach


        </div>
        <div class="panel-footer row">

            @if(Auth::user()->can('edit_nav_items'))


                {!! link_to_route($nested.'.nav_items.edit', trans('main.Edit'), [$nestedId,$nav_item->id], array('class' => 'btn btn-info
                col-lg-1')) !!}

            @endif
            @if(Auth::user()->can('destroy_nav_items'))

                {!! Form::open(array('method' => 'DELETE', 'route' => array($nested.'.nav_items.destroy',
                $nav_item->id),["class"=>"col-lg-1"])) !!}
                {!! Form::submit(trans('main.Delete'), array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </section>
@stop