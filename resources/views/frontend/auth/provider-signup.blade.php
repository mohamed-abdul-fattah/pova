@extends('layouts.frontend.app')

@section('page-title')
    {{__('Become a Provider')}}
@endsection

@section('css-styles')
    <style media="screen">
        .company-name {
            display: none;
        }
    </style>
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
                        <h3 class="title text-theme-colored">{{__('Become a provider')}}</h3>
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
              <h4 class="text-gray mt-0 pt-5"> {{__('How it works')}}</h4>
              <hr>
              <p></p>
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
                {!! Form::hidden('type', 'provider') !!}
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
                  <h4 class="text-gray pt-10 mt-0 mb-30">{{__('Become a provider')}}</h4>
                </div>
                <hr>
                <p class="text-gray"></p>
                <div class="row">
                    <div class="col-md-6">
                        <label for="entity">{{__('Entity')}}</label>
                        <div class="form-group">
                            {!! Form::radio('entity', 'individual', true) !!}
                            <label for="individual">{{__('Individual')}}</label>
                            <br>
                            {!! Form::radio('entity', 'company', false) !!}
                            <label for="company">{{__('Company')}}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="form-name">{{__('Business Owner Name')}}</label>
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
                  <div class="form-group col-md-6 company-name">
                    <label for="form-company-name">{{__('Company Name')}}</label>
                    {!!
                        Form::text('company', null, [
                            'id'       => 'form-company-name',
                            'class'    => 'form-control company-input'.($errors->has('company') ? ' has-error' : ''),
                            'disabled' => 'disabled'
                        ])
                    !!}

                    @if ($errors->has('company'))
                        <span class='help-block'>
                            <strong>{{ $errors->first('company') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{__('Email Address')}}</label>
                        {!!
                            Form::email('email', null, [
                                'id'       => 'form-email',
                                'class'    => 'form-control'.($errors->has('email') ? ' has-error' : ''),
                                'required' => 'required'
                            ])
                        !!}

                        @if ($errors->has('email'))
                            <span class='help-block'>
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="form-phone">{{__('Phone Number')}}</label>
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
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="form-choose-password">{{__('Choose Password')}}</label>
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
                    <label for="form-re-enter-password">{{__('Re-enter Password')}}</label>
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

@section('js-scripts')
    <script src="/js/front-entity.js" charset="utf-8"></script>
@endsection
