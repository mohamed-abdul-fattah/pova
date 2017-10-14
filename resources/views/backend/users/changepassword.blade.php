@extends('layouts.app')


@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3>{{ trans("main.Change")." ".trans("user.password") }}</h3>


        </div>

        <div class="panel-body ">




                    <form method="post" action="/users/changepasswordsubmit" id="change_password_form">
                        {!! csrf_field() !!}

                        <div class="col-lg-3">
                            <span>{!! Form::label('old_password', trans("user.old").' '.trans("user.password").':') !!}</span>
                        </div>
                        <div class="col-lg-9">
                            <input type="password" name="old_password" class="form-control col-lg-12"
                                   placeholder="Type Your Old Password">
                            @if ($errors->has('old_password'))
                                <span class="help-block"><strong>{{ $errors->first('old_password') }}</strong></span>
                            @endif
                        </div>
                        <div class="col-lg-3"><span>{!! Form::label('password', trans("user.password").':') !!}</span>
                        </div>
                        <div class="col-lg-9">
                            <input type="password" name="password" class="form-control col-lg-12"
                                   placeholder="Type Your New Password">
                            @if ($errors->has('password'))
                                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif

                        </div>
                        <div class="col-lg-3">
                            <span>{!! Form::label('password_confirmation', trans("user.password").' '.trans("user.confirmation").':') !!}</span>
                        </div>
                        <div class="col-lg-9">
                            <input type="password" name="password_confirmation"
                                   class="form-control col-lg-12"
                                   placeholder="Type Your New Password Confirm">
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                            @endif

                        </div>

                            {!! Form::submit(trans('user.Change').' '.trans('user.Password'), array('class' => 'btn btn-info')) !!}
                            {{--{!! link_to_route('students.show', trans('main.Cancel'), $student->id, array('class' => 'btn')) !!}--}}

                    </form>


        </div>

            </div>

    </section>
@stop