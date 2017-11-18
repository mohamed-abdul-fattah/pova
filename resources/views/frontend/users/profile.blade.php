@extends('layouts.frontend.app')

@section('page-title')
    {{__('Profile')}}
@endsection

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
      @include('frontend.users.profile-header', ['title' => 'Profile'])

      <section>
        <div class="container">
          <div class="row">
            @include('frontend.users.profile-navigator')
            <div class="col-md-7">
              <h4 class="text-gray pt-10 mt-0 mb-30">{{__('Personal Information')}}</h4>
              <hr>
              <ul class="personal-info">
                  <li class="{{app()->getLocale()}}"><span class="{{app()->getLocale()}}">
                      {{__('Name')}}</span>{{$user->name}}
                  </li>
                  <li class="{{app()->getLocale()}}"><span class="{{app()->getLocale()}}">
                      {{__('Email')}}</span>{{$user->email}}
                  </li>
                  <li class="{{app()->getLocale()}}"><span class="{{app()->getLocale()}}">
                      {{__('Phone Number')}}</span>{{$user->phone->phone}}
                  </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- end main-content -->
@endsection
