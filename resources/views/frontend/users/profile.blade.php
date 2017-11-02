@extends('layouts.frontend.app')

@section('page-title')
    {{__('Profile')}}
@endsection

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
      <!-- Section: inner-header -->
      <section class="divider parallax layer-overlay overlay-deep" data-stellar-background-ratio="0.2"  data-bg-img="images/bg/bg2.jpg">
        <div class="container pt-120">
          <div class="section-content text-center">
              <div class="row">
                  <div class="col-md-12">
                      <h3 class="title text-theme-colored">{{__('Profile')}}</h3>
                  </div>
              </div>
          </div>
        </div>
      </section>

      <section>
        <div class="container">
          <div class="row">
            <div class="col-md-4 mb-40">
                <div class="profile-header">
                    <h4 class="text-white mt-0 pt-5"> {{$user->name}}</h4>
                    <span>{{__('Member Since')}} {{date('M Y', strtotime($user->created_at))}}</span>
                    <p>
                        <img src="/hydrogen/backend/images/no_image.png" alt="">
                    </p>
                </div>
                <ul class="profile-navigation">
                    <li>
                        <a href="#">
                            <img src="/images/icons/icon-cart.png"
                            @if (app()->getLocale() === 'ar')
                                class="mr-10 ml-5"
                            @else
                                class="ml-10 mr-5"
                            @endif
                            alt="">
                            {{__('My Bookings')}}
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/images/icons/icon-user.png"
                            @if (app()->getLocale() === 'ar')
                                class="mr-10 ml-5"
                            @else
                                class="ml-10 mr-5"
                            @endif
                            alt="">
                            {{__('My Profile')}}
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/images/icons/icon-review.png"
                            @if (app()->getLocale() === 'ar')
                                class="mr-10 ml-5"
                            @else
                                class="ml-10 mr-5"
                            @endif
                            alt="">
                            {{__('My Reviews')}}
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/images/icons/icon-setting.png"
                            @if (app()->getLocale() === 'ar')
                                class="mr-10 ml-5"
                            @else
                                class="ml-10 mr-5"
                            @endif
                            alt="">
                            {{__('Settings')}}
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/images/icons/icon-back.png"
                            @if (app()->getLocale() === 'ar')
                                class="mr-10 ml-5"
                            @else
                                class="ml-10 mr-5"
                            @endif
                            alt="">
                            {{__('Logout')}}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-7">
              <h4 class="text-gray pt-10 mt-0 mb-30">{{__('Personal Information')}}</h4>
              <hr>
              <ul class="personal-info">
                  <li class="{{app()->getLocale()}}"><span class="{{app()->getLocale()}}">{{__('Name')}}</span>{{$user->name}}</li>
                  <li class="{{app()->getLocale()}}"><span class="{{app()->getLocale()}}">{{__('Email')}}</span>{{$user->email}}</li>
                  <li class="{{app()->getLocale()}}"><span class="{{app()->getLocale()}}">{{__('Phone Number')}}</span>01274206535</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- end main-content -->
@endsection
