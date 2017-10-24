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
                            <img src="{{$availability->cover()}}" alt="">
                        </a>
                        <h1>{{$availability->name}}</h1>
                        <p>{{$availability->email}}</p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        @if(Auth::user()->superCan('edit', $availability))
                            <li>{!! link_to_route('availabilities.edit', trans('main.Edit'), [$availability->id]) !!}</li>

                        @endif
                        @if(Auth::user()->superCan('delete',$availability))
                            <li>{!! Form::open(array('method' => 'DELETE', 'route' => array('availabilities.destroy',
                        $availability->id),"class"=>"col-lg-1")) !!}
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

                        @foreach(array_keys($availability->toArray()) as $attribute)
                            @if(!str_contains($attribute,'_at')&& !str_contains($attribute,'_id'))
                                <div class='bio-row'>
                                    <p>
                                        <span class='bold'>{{ trans('availability.'.ucwords($attribute)) }} :</span>
                                        {{ $availability->$attribute }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
            </aside>
        </div>
    </div>

    @include('backend.partials.details', ['model' => $availability])
    @include('backend.partials.imagesshowall', ['model' => $availability])

    @foreach($availability->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$availability->files($filetype->id),"filetype"=>$filetype))
    @endforeach

    @if(Auth::user()->hasRole(['Super Admin']) ||  Auth::user()->SuperCan('use_comments'))
        @include('backend.partials.comments',['commentable'=>$availability])
    @endif
@stop
