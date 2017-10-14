<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Bakly Systems">
<meta name="keyword" content=" Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
{{--<link rel="shortcut icon" href="/logo.jpg">--}}
<link rel="shortcut icon" href="/icon.jpg">
<title>{{config('hydrogen.AppName')}}- @yield('page')</title>

<!-- Bootstrap core CSS -->
<link href="{{url('/hydrogen/backend/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{url('/hydrogen/backend/css/bootstrap-reset.css')}}" rel="stylesheet">
<!--external css-->
<link href="{{url('/hydrogen/backend/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

<!--right slidebar-->
<link href="{{url('/hydrogen/backend/css/slidebars.css')}}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{url('/hydrogen/backend/css/style.css')}}" rel="stylesheet">
<link href="{{url('/hydrogen/backend/css/style-responsive.css')}}" rel="stylesheet" />

<link href="{{url('/hydrogen/backend/assets/jquery-multi-select/css/multi-select.css')}}" rel="stylesheet" />
<link href="{{url('/hydrogen/backend/assets/select2/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{url('/hydrogen/backend/assets/toastr-master/toastr.css')}}" rel="stylesheet" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
<script src="/hydrogen/backend/js/html5shiv.js"></script>
<script src="/hydrogen/backend/js/respond.min.js"></script>
<![endif]-->
<style media="screen">
    #phone-container {
        text-align: left;
    }
    #map {
      width: 100%;
      height: 400px;
    }
    #map-wrapper {
      margin: 1em 0;
    }
    .phones {
        border: 1px solid #e2e2e4;
        border-radius: 5px 0 0 5px;
        height: 34px;
        font-size: 14px;
        line-height: 1.42857143;
        padding: 6px 12px;
        width: 80%;
    }
    .btn-phone {
        border-radius: 0 5px 5px 0;
        margin-bottom: 3px;
        margin-left: -4px;
    }
</style>
@yield('head')
