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
                            <img src="{{$price->cover()}}" alt="">
                        </a>
                        <h1>{{$price->name}}</h1>
                        <p>{{$price->email}}</p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        @if(Auth::user()->superCan('edit', $price))
                            <li>{!! link_to_route('prices.edit', trans('main.Edit'), [$price->id]) !!}</li>

                        @endif
                        @if(Auth::user()->superCan('delete',$price))
                            <li>{!! Form::open(array('method' => 'DELETE', 'route' => array('prices.destroy',
                        $price->id),"class"=>"col-lg-1")) !!}
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

                        @foreach(array_keys($price->toArray()) as $attribute)
                            @if(!str_contains($attribute,'_at')&& !str_contains($attribute,'_id'))
                                <div class='bio-row'>
                                    <p>
                                        <span class='bold'>{{ trans('price.'.ucwords($attribute)) }} :</span>
                                        {{ $price->$attribute }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
            </aside>
        </div>
    </div>

    @include('backend.partials.details', ['model' => $price])
    @include('backend.partials.imagesshowall', ['model' => $price])

    @foreach($price->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$price->files($filetype->id),"filetype"=>$filetype))
    @endforeach

    @if(Auth::user()->hasRole(['Super Admin']) ||  Auth::user()->SuperCan('use_comments'))
        @include('backend.partials.comments',['commentable'=>$price])
    @endif
@stop
