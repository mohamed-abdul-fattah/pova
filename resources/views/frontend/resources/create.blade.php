@extends('layouts.frontend.app')

@section('page-title')
    {{__('Create New Resource')}}
@endsection

@section('css-styles')
    @include('frontend.resources.styles')
@endsection

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
      @include('frontend.users.profile-header', ['title' => 'Profile'])

      <section>
        <div class="container">
          <div class="row">
            @include('frontend.users.profile-navigator', ['user' => auth()->user()])
            <div class="col-md-8">
              <h3 class="text-gray pt-10 mt-0 mb-30">{{__('Create New Resource')}}</h3>
              <hr>
              {!! Form::open(['action' => 'ResourcesController@frontStore', 'method' => 'POST']) !!}
                @include('frontend.resources.fields')
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- end main-content -->
@endsection

@section('js-scripts')
    @include('frontend.resources.scripts')
    <script type="text/javascript">
        var isEdit = false;
    </script>
@endsection
