@extends('layouts.app')

@section('page-title')
    {{localName($city)}} Profile
@stop

@section('content')
    <div class="container">
        <div class="row">
            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            <img src="{{$city->cover()}}" alt="">
                        </a>
                        <h1>{{localName($city)}}</h1>
                        <p>{{$city->country()->name}}</p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        @if(Auth::user()->superCan('edit', $city))
                            <li>{!! link_to_route('cities.edit', trans('main.Edit'), [$city->id]) !!}</li>

                        @endif
                        @if(Auth::user()->superCan('delete',$city))
                            <li>{!! Form::open(array('method' => 'DELETE', 'route' => array('cities.destroy',
                        $city->id),"class"=>"col-lg-1")) !!}
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
                                {{ $city->id }}
                            </p>
                        </div>

                        <div class='bio-row'>
                            <p>
                                <span class='bold'>{{ trans('city.NameAr') }} :</span>
                                {{ localName($city, 'Ar') }}
                            </p>
                        </div>

                        <div class='bio-row'>
                            <p>
                                <span class='bold'>{{ trans('city.NameEn') }} :</span>
                                {{ localName($city) }}
                            </p>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
    </div>

    @include('backend.partials.details', ['model' => $city])
    @include('backend.partials.imagesshowall', ['model' => $city])

    @foreach($city->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$city->files($filetype->id),"filetype"=>$filetype))
    @endforeach

    @if(Auth::user()->hasRole(['Super Admin']) ||  Auth::user()->SuperCan('use_comments'))
        @include('backend.partials.comments',['commentable'=>$city])
    @endif
@stop
