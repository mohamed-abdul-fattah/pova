<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Happy Wedding - Wedding Event & Planner Website" />
    <meta name="keywords" content="wedding,holes rentals" />
    <meta name="author" content="POVA" />

    <!-- Stylesheet -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <link href="/css/animate.css" rel="stylesheet" type="text/css">
    <link href="/css/css-plugin-collections.css" rel="stylesheet"/>
    <!-- CSS | menuzord megamenu skins -->
    <link id="menuzord-menu-skins" href="/css/menuzord-skins/menuzord-bottom-trace.css" rel="stylesheet"/>
    <!-- CSS | Main style file -->
    <link href="/css/style-main.css" rel="stylesheet" type="text/css">
    <!-- CSS | Theme Color -->
    <link href="/css/colors/theme-skin-deep-pink.css" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="/css/preloader.css" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="/css/responsive.css" rel="stylesheet" type="text/css">
    @if (app()->isLocale('ar'))
        <!-- CSS | For RTL Layout -->
        <link href="/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css">
        <link href="/css/style-main-rtl.css" rel="stylesheet" type="text/css">
        <link href="/css/style-main-rtl-extra.css" rel="stylesheet" type="text/css">
    @endif
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <link href="/css/master.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Page Title -->
    <title>@yield('page-title')</title>

    <!-- Favicon and Touch Icons -->
    <link href="/images/favicon.png" rel="shortcut icon" type="image/png">
    <link href="/images/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

    @yield('css-styles')
</head>
