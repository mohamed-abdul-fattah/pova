<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Bakly Systems">
    <meta name="keyword" content=" Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="/hydrogen/backend/icon.jpg">

    <title>{{config('hydrogen.AppName')}} - Reset</title>

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
    <script src="/hydrogen/backend/js/html5shiv.js"></script>
    <script src="/hydrogen/backend/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">
<div class="container">
    <div class="row">

        @yield('content')
    </div>
</div>


</body>
</html>

