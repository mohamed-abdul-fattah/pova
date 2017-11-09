<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Bakly Systems">
    <meta name="keyword" content=" Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>{{config('hydrogen.AppName')}} - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="/hydrogen/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="/hydrogen/backend/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/hydrogen/backend/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/hydrogen/backend/css/style.css" rel="stylesheet">
    <link href="/hydrogen/backend/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">
    <div style="text-align: center;"><img src="/hydrogen/backend/img/logo.png" style="max-width:200px;max-height:200px;marign:auto;"/></div>
   @yield('content')

</div>



<!-- js placed at the end of the document so the pages load faster -->
<script src="/hydrogen/backend/js/jquery.js"></script>
<script src="/hydrogen/backend/js/bootstrap.min.js"></script>

<script type="text/javascript">
    @if (count($errors) > 0)
    $('#myModal').modal('show');
    @endif
</script>
</body>
</html>
