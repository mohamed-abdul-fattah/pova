@extends('layouts.frontend.app')

@section('page-title')
    {{__('My Resources')}}
@endsection

@section('css-styles')
    <style media="screen">
        .create-btn {
            color: #337ab7;
        }
        .create-btn:hover {
            color: #fff;
            border-color: #204d74;
            background-color: #286090;
        }
        .cover {
            background-color: #fff;
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
            @include('frontend.users.profile-navigator', ['user' => auth()->user()])
            <div class="col-md-7">
                <a href="/resources/create"
                @if (app()->getLocale() === 'ar')
                    class="btn btn-default create-btn pull-left"
                @else
                    class="btn btn-default create-btn pull-right"
                @endif
                >
                    {{__('Create New Resource')}}
                </a>
              <h4 class="text-gray pt-10 mt-0 mb-30">{{__('My Resources')}}</h4>
              <hr>
              <div class="col-sm-12 col-md-12 blog-pull-right">
                @php
                    if (app()->getLocale() === 'ar') {
                        $angleLocale = 'left';
                    } else {
                        $angleLocale = 'right';
                    }
                @endphp
                @foreach ($resources as $key => $resource)
                    <div class="upcoming-events media bg-light mb-20">
                      <div class="row equal-height">
                        <div class="col-sm-4 cover">
                            <img class="img-fullwidth" src="{{$resource->cover()}}" alt="{{titleLocale($resource, app()->getLocale())}}">
                        </div>
                        <div class="col-sm-8 border-right pl-0 pl-sm-15">
                          <div class="event-details p-15 mt-20">
                            <h3 class="media-heading font-weight-500">{{titleLocale($resource, app()->getLocale())}}</h3>
                            <h5>{{nameLocale($resource->category, app()->getLocale())}}</h5>
                            <h6>{{__('Created at')}} {{date('Y-m-d D', strtotime($resource->created_at))}}</h6>
                            <p>
                                @if ($resource->acquiredFeatures()->where('feature_id', $desc->id)->first())
                                    {{$resource->acquiredFeatures()->where('feature_id', $desc->id)->first()->value()}}
                                @else
                                    {{__('No description provided!')}}
                                @endif
                            </p>
                            <a href="#" class="btn btn-flat btn-dark btn-theme-colored btn-sm">{{__('Details')}} <i class="fa fa-angle-double-{{$angleLocale}}"></i></a>
                            <a href="#" class="btn btn-warning btn-sm">{{__('Edit')}} <i class="fa fa-angle-double-{{$angleLocale}}"></i></a>
                            <a href="#" class="btn btn-danger btn-sm">{{__('Delete')}} <i class="fa fa-angle-double-{{$angleLocale}}"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- end main-content -->
@endsection
