@extends('layouts.app')

@section('overload')
    {{$resource->title}} Profile
@stop

@section('content')
    <div class="container">
        <div class="row">
            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            <img src="{{$resource->cover()}}" alt="">
                        </a>
                        <h1>{{$resource->title}}</h1>
                        <p>{{nameLocale($resource->category, 'En')}}</p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        @if(Auth::user()->superCan('edit', $resource))
                            <li>{!! link_to_route('resources.edit', trans('main.Edit'), [$resource->id]) !!}</li>

                        @endif
                        @if(Auth::user()->superCan('delete',$resource))
                            <li>{!! Form::open(array('method' => 'DELETE', 'route' => array('resources.destroy',
                        $resource->id),"class"=>"col-lg-1")) !!}
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
                                {{ $resource->id }}
                            </p>
                        </div>
                        <div class='bio-row'>
                            <p>
                                <span class='bold'>@lang('resource.Title') :</span>
                                {{ $resource->title }}
                            </p>
                        </div>
                        <div class='bio-row'>
                            <p>
                                <span class='bold'>@lang('resource.Category') :</span>
                                {{ nameLocale($resource->category, 'En') }}
                            </p>
                        </div>
                        <div class='bio-row'>
                            <p>
                                <span class='bold'>@lang('resource.Owner') :</span>
                                {{ $resource->owner->name }}
                            </p>
                        </div>
                        <div class='bio-row'>
                            <p>
                                <span class='bold'>@lang('resource.Featured') :</span>
                                {{ ($resource->featured) ? 'True' : 'False' }}
                            </p>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
    </div>

    @include('backend.partials.details', ['model' => $resource])
    @include('backend.partials.imagesshowall', ['model' => $resource])

    @foreach($resource->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$resource->files($filetype->id),"filetype"=>$filetype))
    @endforeach

    @if(Auth::user()->hasRole(['Super Admin']) ||  Auth::user()->SuperCan('use_comments'))
        @include('backend.partials.comments',['commentable'=>$resource])
    @endif
@stop
