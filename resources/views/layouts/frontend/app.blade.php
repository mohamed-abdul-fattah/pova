<!DOCTYPE html>
<html dir="rtl" lang="en">

    @include('layouts.frontend.head')

    <body class="has-side-panel side-panel-right fullwidth-page side-push-panel">
        @include('layouts.frontend.header')

        @yield('content')

        @include('layouts.frontend.footer')

        @include('layouts.frontend.scripts')
    </body>
</html>
