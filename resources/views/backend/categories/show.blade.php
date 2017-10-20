@extends('layouts.app')

@section('overload')
    <link href="{{url('/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet"/>
    <link href="{{url('/css/acedashboard.css')}}" rel="stylesheet">
    <link href="{{url('/css/style-responsive.css')}}" rel="stylesheet"/>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            <img src="{{$category->cover()}}" alt="">
                        </a>
                        <h1>{{ json_decode($category->name)->nameEn }}</h1>
                        <p>{{ $category->parent() }}</p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        @if(Auth::user()->superCan('edit', $category))
                            <li>{!! link_to_route('categories.edit', trans('main.Edit'), [$category->id]) !!}</li>

                        @endif
                        @if(Auth::user()->superCan('delete',$category))
                            <li>{!! Form::open(array('method' => 'DELETE', 'route' => array('categories.destroy',
                        $category->id),"class"=>"col-lg-1")) !!}
                                {!! Form::submit(trans('main.Delete'), array('class' => 'btn btn-danger', 'onclick' => 'confirmDelete(event)')) !!}
                                {!! Form::close() !!}</li>
                        @endif
                    </ul>

                </section>
            </aside>
            <aside class="profile-info col-lg-9">
                <section class="panel">
                    <div class="bio-graph-heading">
                        Banner Here
                    </div>
                    <div class="panel-body bio-graph-info">
                        <h1>Info</h1>

                        <div class='bio-row'>
                            <p>
                                <span class='bold'># :</span>
                                {{ $category->id }}
                            </p>
                        </div>
                        <div class='bio-row'>
                            <p>
                                <span class='bold'>{{ trans('category.NameAr') }} :</span>
                                {{ json_decode($category->name)->nameAr }}
                            </p>
                        </div>
                        <div class='bio-row'>
                            <p>
                                <span class='bold'>{{ trans('category.NameEn') }} :</span>
                                {{ json_decode($category->name)->nameEn }}
                            </p>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
    </div>

    @include('backend.partials.details',['model'=>$category])
    @include('backend.partials.imagesshowall',['model'=>$category])

    @foreach($category->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$category->files($filetype->id),"filetype"=>$filetype))
    @endforeach

    @if(Auth::user()->hasRole(['Super Admin']) ||  Auth::user()->SuperCan('use_comments'))
        @include('backend.partials.comments',['commentable'=>$category])
    @endif
@stop
