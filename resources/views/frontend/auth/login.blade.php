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
              <p></p>
              <form class="clearfix" role="form" method="POST" action="{{route('login')}}">
                {{ csrf_field() }}
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="form-login-email">{{__('Email or Phone')}}</label>
                    {!!
                        Form::text('login', null, [
                            'id'          => 'form-login-email',
                            'class'       => 'form-control'.($errors->has('loginEmail') ? ' has-error' : ''),
                            'autofocus'   => 'autofocus',
                            'placeholder' => __('Email or Phone'),
                            'required'    => 'required'
                        ])
                    !!}

                    @if ($errors->has('loginEmail'))
                        <span class='help-block'>
                            <strong>{{ $errors->first('loginEmail') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="form-password">{{__('Password')}}</label>
                    {!!
                        Form::password('loginPassword', [
                            'id'          => 'form-password',
                            'class'       => 'form-control'.($errors->has('loginPassword') ? ' has-error' : ''),
                            'placeholder' => __('Password'),
                            'required'    => 'required'
                        ]) 
                    !!}

                    @if ($errors->has('loginPassword'))
                        <span class='help-block'>
                            <strong>{{ $errors->first('loginPassword') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="checkbox pull-left mt-15">
                  <label for="form-checkbox">
                    <input id="form-checkbox" name="form-checkbox" type="checkbox">
                    {{__('Remember me')}} </label>
                </div>
                <div class="form-group pull-right mt-10">
                  <button type="submit" class="btn btn-darker btn-sm">{{__('Login')}}</button>
                </div>
                <div class="clear text-center pt-10">
                  <a class="text-theme-colored font-weight-600 font-12" href="#">{{__('Forgot password?')}}</a>
                </div>
                <div class="clear text-center pt-10">
                  <a class="btn btn-darker btn-fb btn-lg btn-block no-border mt-15 mb-15" href="#">{{__('Login with Facebook')}}</a>
                  <a class="btn btn-darker btn-tw btn-lg btn-block no-border" href="#">{{__('Login with Twitter')}}</a>
                </div>
              </form>
            </div>
            <div class="col-md-7 col-md-offset-1">
              {{-- commented because login errors are displayed in registeration area. --}}
              {{-- @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $key => $error)
                              <li>{{$error}}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif --}}
              <form name="reg-form" class="register-form" method="post" action="/register">
                {{ csrf_field() }}
                <input type="hidden" name="type" value="user">
                <div class="icon-box mb-0 p-0">
                  <a href="javascript:void(0)"
                  @if (app()->getLocale() === 'ar')
                      class="icon icon-bordered icon-rounded icon-sm pull-right mb-0 ml-10"
                  @else
                      class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10"
                  @endif
                  >
                    <i class="pe-7s-users"></i>
                  </a>
                  <h4 class="text-gray pt-10 mt-0 mb-30">{{__('Don\'t have an account? Register Now.')}}</h4>
                </div>
                <hr>
                <p class="text-gray"></p>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="form-name">{{__('Name')}} <span class="required">*</span></label>
                    {!!
                        Form::text('name', null, [
                            'id'       => 'form-name',
                            'class'    => 'form-control'.($errors->has('name') ? ' has-error' : ''),
                            'required' => 'required'
                        ])
                    !!}

                    @if ($errors->has('name'))
                        <span class='help-block'>
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                  </div>
                  {{-- Phone --}}
                  <div class="form-group col-md-6">
                      <label for="form-phone">{{__('Phone Number')}} <span class="required">*</span></label>
                      {!!
                          Form::number('phone', null, [
                              'id'       => 'form-phone',
                              'class'    => 'form-control'.($errors->has('phone') ? ' has-error' : ''),
                              'required' => 'required'
                          ])
                      !!}

                      @if ($errors->has('phone'))
                          <span class='help-block'>
                              <strong>{{ $errors->first('phone') }}</strong>
                          </span>
                      @endif
                  </div>
                  {{-- End Phone --}}
                  {{-- Email --}}
                  <div class="form-group col-md-6">
                    <label for="form-email">{{__('Email Address')}}</label>
                    {!!
                        Form::email('email', null, [
                            'id'       => 'form-email',
                            'class'    => 'form-control'.($errors->has('email') ? ' has-error' : '')
                        ])
                    !!}

                    @if ($errors->has('email'))
                        <span class='help-block'>
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                  {{-- End Email --}}
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="form-choose-password">{{__('Choose Password')}} <span class="required">*</span></label>
                    {!!
                        Form::password('password', [
                            'id'       => 'form-choose-password',
                            'class'    => 'form-control'.($errors->has('password') ? ' has-error' : ''),
                            'required' => 'required'
                        ])
                    !!}

                    @if ($errors->has('password'))
                        <span class='help-block'>
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group col-md-6">
                    <label for="form-re-enter-password">{{__('Re-enter Password')}} <span class="required">*</span></label>
                    {!!
                        Form::password('password_confirmation', [
                            'id'       => 'form-re-enter-password',
                            'class'    => 'form-control'.($errors->has('password_confirmation') ? ' has-error' : ''),
                            'required' => 'required'
                        ])
                    !!}

                    @if ($errors->has('password_confirmation'))
                        <span class='help-block'>
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-darker btn-lg btn-block mt-15" type="submit">{{__('Register Now')}}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- end main-content -->
@endsection
