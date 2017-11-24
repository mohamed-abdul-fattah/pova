@extends('layouts.frontend.app')

@section('page-title')
    {{__('Settings')}}
@endsection

@section('css-styles')
    <link rel="stylesheet" href="/css/component.css">
    <style media="screen">
        .company-name {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="main-content">
      @include('frontend.users.profile-header', ['title' => 'Settings'])

      <section>
        <div class="container">
          <div class="row">
            @include('frontend.users.profile-navigator')
            <div class="col-md-4">
              {!! Form::open(['url' => '/settings', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
              <h4 class="text-gray pt-10 mt-0 mb-30">{{__('Personal Information')}}</h4>
              <hr>
              <div class="form-group">
                  <label for="form-name" class="form-label">{{__('Name')}}</label>
                  {!!
                      Form::text('name', $user->name, [
                          'id'          => 'form-name',
                          'class'       => 'form-control'.($errors->has('name') ? ' has-error' : ''),
                          'required'    => 'required',
                          'placeholder' => __('Name')
                      ])
                  !!}

                  @if ($errors->has('name'))
                      <span class='help-block'>
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group">
                  <label for="form-email" class="form-label">{{__('Email')}}</label>
                  {!!
                      Form::email('email', $user->email, [
                          'id'          => 'form-email',
                          'class'       => 'form-control'.($errors->has('email') ? ' has-error' : ''),
                          'placeholder' => __('Email')
                      ])
                  !!}

                  @if ($errors->has('email'))
                      <span class='help-block'>
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group">
                  <label for="form-phone" class="form-label">{{__('Phone Number')}}</label>
                  {!!
                      Form::number('phone', $user->phone, [
                          'id'          => 'form-phone',
                          'class'       => 'form-control'.($errors->has('phone') ? ' has-error' : ''),
                          'required'    => 'required',
                          'placeholder' => __('Phone Number')
                      ])
                  !!}

                  @if ($errors->has('phone'))
                      <span class='help-block'>
                          <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                  @endif
              </div>
              @if ($user->provider)
                  <br>
                  <h4 class="text-gray pt-10 mt-0 mb-30">{{__('Business Information')}}</h4>
                  <hr>
                  <div class="form-group">
                      <label for="form-entity" class="form-label">{{__('Entity')}}</label>
                      <div class="form-group">
                          {!! Form::radio('entity', 'individual', ($user->provider->entity === 'individual')) !!}
                          <label class="form-label">{{__('Individual')}}</label>
                          <br>
                          {!! Form::radio('entity', 'company', ($user->provider->entity === 'company')) !!}
                          <label class="form-label">{{__('Company')}}</label>
                      </div>
                      <div class="form-group company-name">
                          <label for="form-company-name" class="form-label">{{__('Company Name')}}</label>
                          {!!
                              Form::text('company_name', $user->provider->company_name, [
                                  'id'          => 'form-company-name',
                                  'class'       => 'form-control company-input'.($errors->has('company_name') ? ' has-error' : ''),
                                  'required'    => 'required',
                                  'placeholder' => __('Company Name'),
                                  'disabled'    => 'disabled'
                              ])
                          !!}

                          @if ($errors->has('company_name'))
                              <span class='help-block'>
                                  <strong>{{ $errors->first('company_name') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
              @endif
              {{-- Profile photo --}}
              <input type="file" name="profile" id="file-3" class="inputfile inputfile-6" />
              <label for="file-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>{{__('Profile Photo')}}</span></label>
              @if ($errors->has('profile'))
                  <span class='help-block'>
                      <strong>{{ $errors->first('profile') }}</strong>
                  </span>
              @endif
              <button type="submit" class="btn btn-success">{{__('Save Changes')}}</button>
              {!! Form::close() !!}
            </div>
            <div class="col-md-4">
                {!! Form::open(['url' => 'update-password', 'method' => 'PUT']) !!}
                <h4 class="text-gray pt-10 mt-0 mb-30">{{__('Change Password')}}</h4>
                <hr>
                <div class="form-group">
                    <label for="form-current-pass">{{__('Current Password')}}</label>
                    {!!
                        Form::password('oldPassword', [
                            'id'          => 'form-current-pass',
                            'class'       => 'form-control'.($errors->has('oldPassword') ? ' has-error' : ''),
                            'required'    => 'required',
                            'placeholder' => __('Current Password')
                        ])
                    !!}

                    @if ($errors->has('oldPassword'))
                        <span class='help-block'>
                            <strong>{{ $errors->first('oldPassword') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="form-password" class="form-label">{{__('New Password')}}</label>
                    {!!
                        Form::password('password', [
                            'id'          => 'form-password',
                            'class'       => 'form-control'.($errors->has('password') ? ' has-error' : ''),
                            'required'    => 'required',
                            'placeholder' => __('New Password')
                        ])
                    !!}

                    @if ($errors->has('password'))
                        <span class='help-block'>
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="form-confirm" class="form-label">{{__('Re-enter New Password')}}</label>
                    {!!
                        Form::password('password_confirmation', [
                            'id'          => 'form-confirm',
                            'class'       => 'form-control'.($errors->has('password_confirmation') ? ' has-error' : ''),
                            'required'    => 'required',
                            'placeholder' => __('Re-enter New Password')
                        ])
                    !!}

                    @if ($errors->has('password_confirmation'))
                        <span class='help-block'>
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">{{__('Change Password')}}</button>
                {!! Form::close() !!}
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection

@section('js-scripts')
    <script src="/js/jquery.custom-file-input.js" charset="utf-8"></script>
    <script src="/js/front-entity.js" charset="utf-8"></script>
@endsection
