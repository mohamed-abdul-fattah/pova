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
                  <h4 class="text-gray pt-10 mt-0 mb-30">{{__('Become a provider')}}</h4>
                </div>
                <hr>
                <p class="text-gray"></p>
                <div class="row">
                    <div class="col-md-6">
                        <label for="entity">{{__('Entity')}}</label>
                        <div class="form-group">
                            <input type="radio" name="entity" value="individual" checked>
                            <label for="individual">{{__('Individual')}}</label>
                            <br>
                            <input type="radio" name="entity" value="company">
                            <label for="company">{{__('Company')}}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="form-name">{{__('Business Owner Name')}}</label>
                    <input id="form-name" name="name" class="form-control" type="text" required>
                  </div>
                  <div class="form-group col-md-6 company-name">
                    <label for="form-company-name">{{__('Company Name')}}</label>
                    <input id="form-company-name" name="company" class="form-control" type="text" required>
                  </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{__('Email Address')}}</label>
                        <input id="form-email" name="email" class="form-control" type="email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="form-phone">{{__('Phone Number')}}</label>
                        <input id="form-phone" name="number" class="form-control" type="phone" required>
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="form-choose-password">{{__('Choose Password')}}</label>
                    <input id="form-choose-password" name="password" class="form-control" type="password" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="form-re-enter-password">{{__('Re-enter Password')}}</label>
                    <input id="form-re-enter-password" name="password_confirmation"  class="form-control" type="password" required>
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
    <script type="text/javascript">
        $(document).ready(function () {
            const $company = $('.company-name'),
                  $entity  = $('input[name=entity]');

            $entity.click(function (e) {
                if ($(this).val() === 'company') {
                    $company.slideDown('fast');
                } else {
                    $company.slideUp('fast');
                }
            });
        });
    </script>
@endsection
