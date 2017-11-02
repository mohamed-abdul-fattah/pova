@extends('layouts.frontend.app')

@section('page-title')
    Login | Register
@endsection

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
      <!-- Section: inner-header -->
      <section class="divider parallax layer-overlay overlay-deep" data-stellar-background-ratio="0.2"  data-bg-img="images/bg/bg2.jpg">
        <div class="container pt-120">
          <div class="section-content text-center">
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title text-theme-colored">{{__('Login / Register')}}</h3>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div class="container">
          <div class="row">
            <div class="col-md-4 mb-40">
              <h4 class="text-gray mt-0 pt-5"> {{__('Login')}}</h4>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
              <form class="clearfix" role="form" method="POST" action="{{route('login')}}">
                {{ csrf_field() }}
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="form_username_email">{{__('Email')}}</label>
                    <input id="form_username_email" name="email" class="form-control" type="text">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="form_password">{{__('Password')}}</label>
                    <input id="form_password" name="password" class="form-control" type="password">
                  </div>
                </div>
                <div class="checkbox pull-left mt-15">
                  <label for="form_checkbox">
                    <input id="form_checkbox" name="form_checkbox" type="checkbox">
                    {{__('Remember me')}} </label>
                </div>
                <div class="form-group pull-right mt-10">
                  <button type="submit" class="btn btn-dark btn-sm">{{__('Login')}}</button>
                </div>
                <div class="clear text-center pt-10">
                  <a class="text-theme-colored font-weight-600 font-12" href="#">{{__('Forgot password?')}}</a>
                </div>
                <div class="clear text-center pt-10">
                  <a class="btn btn-dark btn-lg btn-block no-border mt-15 mb-15" href="#" data-bg-color="#3b5998">{{__('Login with Facebook')}}</a>
                  <a class="btn btn-dark btn-lg btn-block no-border" href="#" data-bg-color="#00acee">{{__('Login with Twitter')}}</a>
                </div>
              </form>
            </div>
            <div class="col-md-7 col-md-offset-1">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $key => $error)
                              <li>{{$error}}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <form name="reg-form" class="register-form" method="post" action="/register">
                {{ csrf_field() }}
                <input type="hidden" name="type" value="user">
                <div class="icon-box mb-0 p-0">
                  <a href="#"
                  @if (app()->getLocale() === 'ar')
                      class="icon icon-bordered icon-rounded icon-sm pull-right mb-0 ml-10"
                  @else
                      class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10"
                  @endif
                  >
                    <i class="pe-7s-users"></i>
                  </a>
                  <h4 class="text-gray pt-10 mt-0 mb-30">{{__('Don\'t have an Account? Register Now.')}}</h4>
                </div>
                <hr>
                <p class="text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi id perspiciatis facilis nulla possimus quasi, amet qui. Ea rerum officia, aspernatur nulla neque nesciunt alias.</p>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="form_name">{{__('Name')}}</label>
                    <input id="form_name" name="name" class="form-control" type="text">
                  </div>
                  <div class="form-group col-md-6">
                    <label>{{__('Email Address')}}</label>
                    <input id="form_email" name="email" class="form-control" type="email">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="form_choose_password">{{__('Choose Password')}}</label>
                    <input id="form_choose_password" name="password" class="form-control" type="password">
                  </div>
                  <div class="form-group col-md-6">
                    <label>{{__('Re-enter Password')}}</label>
                    <input id="form_re_enter_password" name="password_confirmation"  class="form-control" type="password">
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-dark btn-lg btn-block mt-15" type="submit">{{__('Register Now')}}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- end main-content -->
@endsection
