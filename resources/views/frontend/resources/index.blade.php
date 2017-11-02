@extends('layouts.frontend.app')

@section('page-title')
    {{__('My Resources')}}
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
                    class="btn btn-primary pull-left"
                @else
                    class="btn btn-primary pull-right"
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
