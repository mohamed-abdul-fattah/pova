@extends('layouts.app')

@section('page-title')
    {{ ucwords(localName($feature)) }} Profile
@endsection

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
                            <img src="{{$feature->cover()}}" alt="">
                        </a>
                        <h1>{{ucwords(json_decode($feature->name)->nameEn)}}</h1>
                        <p>{{ucwords($feature->type)}}</p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        @if(Auth::user()->superCan('edit', $feature))
                            <li>{!! link_to_route('features.edit', trans('main.Edit'), [$feature->id]) !!}</li>

                        @endif
                        @if(Auth::user()->superCan('delete',$feature))
                            <li>{!! Form::open(array('method' => 'DELETE', 'route' => array('features.destroy',
                        $feature->id),"class"=>"col-lg-1")) !!}
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
                                {{ $feature->id }}
                            </p>
                        </div>
                        <div class='bio-row'>
                            <p>
                                <span class='bold'>{{ trans('feature.NameAr') }} :</span>
                                {{ localName($feature, 'Ar') }}
                            </p>
                        </div>
                        <div class='bio-row'>
                            <p>
                                <span class='bold'>{{ trans('feature.NameEn') }} :</span>
                                {{ localName($feature) }}
                            </p>
                        </div>
                        <div class='bio-row'>
                            <p>
                                <span class='bold'>{{ trans('feature.Type') }} :</span>
                                {{ $feature->type }}
                            </p>
                        </div>
                        <div class='bio-row'>
                            <p>
                                <span class='bold'>{{ trans('feature.Required') }} :</span>
                                {{($feature->required) ? 'Required' : 'Optional'}}
                            </p>
                        </div>
                        @if ($feature->type === 'selection')
                            <div class='bio-row'>
                                <p>
                                    <span class='bold'>{{ trans('feature.Selections') }} :</span>
                                    {{ $feature->selections }}
                                </p>
                            </div>
                        @endif
                    </div>
                </section>
            </aside>
        </div>
    </div>

    @include('backend.partials.details',['model'=>$feature])
    @include('backend.partials.imagesshowall',['model'=>$feature])

    @foreach($feature->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$feature->files($filetype->id),"filetype"=>$filetype))
    @endforeach

    @if(Auth::user()->hasRole(['Super Admin']) ||  Auth::user()->SuperCan('use_comments'))
        @include('backend.partials.comments',['commentable'=>$feature])
    @endif
@stop
