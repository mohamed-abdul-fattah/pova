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
              <ul class="my-resources">
              </ul>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- end main-content -->
@endsection
