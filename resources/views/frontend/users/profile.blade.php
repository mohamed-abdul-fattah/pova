@extends('layouts.frontend.app')

@section('page-title')
    {{__('Profile')}}
@endsection

@section('css-styles')
    <style media="screen">
        .btn-warning {
            margin: 3em 0;
        }
    </style>
@endsection

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
      @include('frontend.users.profile-header', ['title' => 'Profile'])

      <section>
        <div class="container">
          <div class="row">
            @include('frontend.users.profile-navigator')
            <div class="col-md-4">
              <h4 class="text-gray pt-10 mt-0 mb-30">{{__('Personal Information')}}</h4>
              <hr>
              <ul class="user-info">
                  <li class="{{app()->getLocale()}}"><span class="{{app()->getLocale()}}">
                      {{__('Name')}}</span>{{$user->name}}
                  </li>
                  <li class="{{app()->getLocale()}}"><span class="{{app()->getLocale()}}">
                      {{__('Email')}}</span>{{$user->email}}
                  </li>
                  <li class="{{app()->getLocale()}}"><span class="{{app()->getLocale()}}">
                      {{__('Phone Number')}}</span>{{$user->phone->phone}}
                  </li>
                  @if ($user->provider)
                      <br>
                      <h4 class="text-gray pt-10 mt-0 mb-30">{{__('Business Information')}}</h4>
                      <hr>
                      <li class="{{app()->getLocale()}}"><span class="{{app()->getLocale()}}">
                          {{__('Entity')}}</span>{{__(ucwords($user->provider->entity))}}
                      </li>
                      <li class="{{app()->getLocale()}}"><span class="{{app()->getLocale()}}">
                          {{__('Company Name')}}</span>{{$user->provider->company_name}}
                      </li>
                  @endif
                  <li>
                      <a href="/settings" class="btn btn-warning">
                          {{__('Edit')}}
                          <i class="fa fa-pencil" aria-hidden="true"></i>
                      </a>
                  </li>
              </ul>
            </div>
            <div class="col-md-4">
                <h4 class="text-gray pt-10 mt-0 mb-30">{{__('Profile Photo')}}</h4>
                <hr>
                <div class="profile-photo">
                    <img src="{{$user->coverLink()}}" alt="{{__('Profile Photo')}}">
                </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- end main-content -->
@endsection
