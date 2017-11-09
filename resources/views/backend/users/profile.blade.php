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
                            <img src="{{$user->cover()}}" alt="">
                        </a>
                        <h1>{{$user->name}}</h1>
                        <p>{{$user->email}}</p>
                    </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{URL::route('users.edit',$user->id)}}"> <i class="fa fa-edit"></i> Edit profile</a></li>
                        <li><a href="/users/changepassword"><i class="fa fa-bell-o"></i>{{ucfirst(trans("main.change password"))}}</a></li>
                        @if(Auth::user()->canImpersonate()&& Auth::user()->id!=$user->id)
                            <li><a href='{{route('impersonate', $user->id)}}'>Impersonate this user</a></li>
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
                        @foreach(array_keys($user->toArray()) as $attribute)
                            @if(!str_contains($attribute,'_at')&& !str_contains($attribute,'_id')
                             && !str_contains($attribute,'assignedTo') && !str_contains($attribute,'admin')
                             && !str_contains($attribute,'password') && !str_contains($attribute,'token')
                             && !str_contains($attribute,'_type'))
                                <div class='bio-row'>
                                    <p>
                                        <span class='bold'>{{ trans('corporate.'.$attribute) }} :</span>
                                        {{ $user->$attribute }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
            </aside>
        </div>
    </div>
    @include('backend.partials.details',['model'=>$user])
    @include('backend.partials.imagesshowall',['model'=>$user])
    @foreach($user->filetypes() as $filetype)
        @include("backend.partials.filesshow",array("files"=>$user->files($filetype->id),"filetype"=>$filetype))
    @endforeach

    @if(Auth::user()->hasRole(['Super Admin']) ||  Auth::user()->SuperCan('use_comments'))
        @include('backend.partials.comments',['commentable'=>$user])
    @endif
@stop
