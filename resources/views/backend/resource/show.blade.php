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

                            <img src="{{$model->cover()}}" alt="">
                        </a>
                        <h1>{{$model->name}}</h1>
                    </div>

                    <ul class="nav nav-pills nav-stacked">

                        <li><a href="{{URL::route(str_plural(strtolower((new ReflectionClass($model))->getShortName())).'.edit',$model->id)}}"> <i class="fa fa-edit"></i> Edit profile</a></li>




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

                        @foreach(array_keys($model['attributes']) as $attribute)
                            @if(!str_contains($attribute,['_at','_id','password','token','_type']))
                                <div class='bio-row'>
                                    <p>
                                        <span class='bold'>{{ trans('main.'.$attribute) }} :</span>
                                        {{ $model->$attribute }}
                                    </p>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </section>

            </aside>
        </div>

    </div>
    @include('backend.partials.details',['model'=>$model])
    @include('backend.partials.imagesshowall',['model'=>$model])
    @foreach($model->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$model->files($filetype->id),"filetype"=>$filetype))
    @endforeach

    @if(Auth::user()->hasRole(['Super Admin']) ||  Auth::user()->SuperCan('use_comments'))
        @include('backend.partials.comments',['commentable'=>$model])
    @endif

@stop
