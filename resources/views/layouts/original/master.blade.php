<!DOCTYPE html>
<html>
<head>
    @include('layouts.original.head')
</head>
<body>
@include('layouts.original.header')
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
    @yield('content')
    <!-- page end-->
    </section>
</section>
<!--main content end-->


@include('layouts.original.footer')
</section>

<!-- js placed at the end of the document so the pages load faster -->
@include('layouts.original.scripts')
@yield('scripts')


</body>
</html>


