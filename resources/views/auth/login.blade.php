@extends('layouts.'.config('hydrogen.template').'.login')

@section('content')

                <div class="panel-body">


                        <form class="form-signin" action="{{ url('login') }}" method="post">
                            {!! csrf_field() !!}

                            <h2 class="form-signin-heading">sign in now</h2>
                            <div class="login-wrap">
                                <input type="email" class="form-control" name="email" placeholder="User ID" autofocus><br/>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
                                </label>
                                <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>

                            </div>
                        </form>


                        <!-- Modal -->
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <form action="/password/email" method="post" >
                                            {{csrf_field()}}
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Forgot Password ?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Enter your e-mail address below to reset your password.</p>
                                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                                    </div>
                                    @if (count($errors) > 0)
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li><h5 style="color: gainsboro;font-style: italic;">{!! $error !!}</h5></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                        <button type="submit" class="btn btn-success" >{{trans('main.Submit')}}</button>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- modal -->

                </div>
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
