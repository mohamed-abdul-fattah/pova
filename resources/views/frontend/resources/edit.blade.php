@extends('layouts.frontend.app')

@section('page-title')
    {{__('Edit')}} {{$resource->title}}
@endsection

@section('css-styles')
    @include('frontend.resources.styles')
@endsection

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
      @include('frontend.users.profile-header', ['title' => 'My Resources'])

      <section>
        <div class="container">
          <div class="row">
            @include('frontend.users.profile-navigator', ['user' => auth()->user()])
            <div class="col-md-8">
              <h3 class="text-gray pt-10 mt-0 mb-30">{{__('Edit')}} {{$resource->title}}</h3>
              <hr>
              {!!
                  Form::open([
                      'action'  => ['ResourcesController@frontUpdate', $resource->id],
                      'method'  => 'PUT',
                      'enctype' => 'multipart/form-data'
                  ])
              !!}
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
        var isEdit = true;
    </script>
@endsection
