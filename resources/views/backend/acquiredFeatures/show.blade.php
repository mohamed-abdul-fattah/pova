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
                            <img src="{{$acquiredFeature->cover()}}" alt="">
                        </a>
                        <h1>{{$acquiredFeature->name}}</h1>
                        <p>{{$acquiredFeature->email}}</p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        @if(Auth::user()->superCan('edit', $acquiredFeature))
                            <li>{!! link_to_route('acquired-features.edit', trans('main.Edit'), [$acquiredFeature->id]) !!}</li>

                        @endif
                        @if(Auth::user()->superCan('delete',$acquiredFeature))
                            <li>{!! Form::open(array('method' => 'DELETE', 'route' => array('acquired-features.destroy',
                        $acquiredFeature->id),"class"=>"col-lg-1")) !!}
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

                        @foreach(array_keys($acquiredFeature->toArray()) as $attribute)
                            @if(!str_contains($attribute,'_at')&& !str_contains($attribute,'_id'))
                                <div class='bio-row'>
                                    <p>
                                        <span class='bold'>{{ trans('acquiredFeature.'.ucwords($attribute)) }} :</span>
                                        {{ $acquiredFeature->$attribute }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
            </aside>
        </div>
    </div>

    @include('backend.partials.details',['model'=>$acquiredFeature])
    @include('backend.partials.imagesshowall',['model'=>$acquiredFeature])

    @foreach($acquiredFeature->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$acquiredFeature->files($filetype->id),"filetype"=>$filetype))
    @endforeach

    @if(Auth::user()->hasRole(['Super Admin']) ||  Auth::user()->SuperCan('use_comments'))
        @include('backend.partials.comments',['commentable'=>$acquiredFeature])
    @endif
@stop
