<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Bakly Systems">
    <meta name="keyword" content=" Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/icon.jpg">

    <title>{{config('hydrogen.AppName')}} - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">
    <div style="text-align: center;"><img src="/img/logo.png" style="max-width:200px;max-height:200px;marign:auto;margin-top:10%;"/></div>

    <form role="form" class="form-signin" method="POST" action="{{ url('/password/reset') }}">
        {!! csrf_field() !!}

        <input type="hidden" name="token" value="{{ $token }}">

        <h2 class="form-signin-heading" >reset password</h2>
        <div class="login-wrap">
            <div class="input-cont ">
                <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}"  placeholder="{{trans('main.Enter Your').' '.trans('main.Email')}}">

                @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong> </span>
                @endif

            </div>



            <div class="input-cont ">
                <input type="password" class="form-control col-lg-6" name="password"  placeholder="{{trans('main.Enter Your').' '.trans('main.Password')}}">

                @if ($errors->has('password'))
                    <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                @endif

            </div>


            <div class="input-cont ">
                <input type="password" class="form-control col-lg-6" name="password_confirmation"  placeholder="{{trans('main.Enter Your').' '.trans('main.Password').' '.trans('main.Confirmation')}}">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block"> <strong>{{ $errors->first('password_confirmation') }}</strong></span>
                @endif

            </div>

            <div class="form-group">
                {{--<button class="btn_1" id="change_password_submit">--}}
                {{--<i class="fa fa-btn fa-refresh"></i>{{trans('frontend.Reset Password')}}--}}
                {{--</button>--}}
                <button class="btn btn-lg btn-login btn-block" type="submit">{{trans('main.Reset Password')}}</button>

            </div>

        </div>
    </form>


</div><!-- End container -->







<!-- js placed at the end of the document so the pages load faster -->
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script type="text/javascript">
    @if (count($errors) > 0)
    $('#myModal').modal('show');
    @endif
</script>

</body>
</html>
