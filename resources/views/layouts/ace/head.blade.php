<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>{{config('hydrogen.AppName')}}- @yield('page')</title>

<meta name="description" content="" />
<meta name="_tokeb" content="{{csrf_token()}}"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="{{ url('/hydrogen/backend/ace-assets/css/bootstrap.css') }}" />
<link rel="stylesheet" href="{{ url('/hydrogen/backend/components//font-awesome/css/font-awesome.css') }}" />

<!-- page specific plugin styles -->

<!-- text fonts -->
<link rel="stylesheet" href=" {{ url('/hydrogen/backend/ace-assets/css/ace-fonts.css')}}" />

<!-- ace styles -->
<link rel="stylesheet" href=" {{ url('/hydrogen/backend/ace-assets/css/ace.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

<!--[if lte IE 9]>
<link rel="stylesheet" href=" {{ url('/hydrogen/backend/ace-assets/css/ace-part2.css')}}" class="ace-main-stylesheet" />
<![endif]-->
<link rel="stylesheet" href=" {{ url('/hydrogen/backend/ace-assets/css/ace-skins.css')}}" />
<link rel="stylesheet" href=" {{ url('/hydrogen/backend/ace-assets/css/ace-rtl.css')}}" />
<link rel="stylesheet" href=" {{ url('/hydrogen/backend/css/hydrogen.css')}}" />

<!--[if lte IE 9]>
<link rel="stylesheet" href=" {{ url('/hydrogen/backend/ace-assets/css/ace-ie.css')}}" />
<![endif]-->

<!-- inline styles related to this page -->

<!-- ace settings handler -->
<script src="/hydrogen/backend/ace-assets/js/ace-extra.js"></script>

<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--[if lte IE 8]>
<script src="/hydrogen/backend/components//html5shiv/dist/html5shiv.min.js"></script>
<script src="/hydrogen/backend/components//respond/dest/respond.min.js"></script>
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
