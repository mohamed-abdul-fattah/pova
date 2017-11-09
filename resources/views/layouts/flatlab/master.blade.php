<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.flatlab.head')
</head>

<body>
    <section id="container" class="">
        @include('layouts.flatlab.header')
        @include('layouts.flatlab.sidebar')
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <!-- page start-->
                @include('flash::message')
                @yield('content')
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->

        @include('layouts.flatlab.footer')
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    @include('layouts.flatlab.scripts')
    @yield('scripts')
</body>
</html>
