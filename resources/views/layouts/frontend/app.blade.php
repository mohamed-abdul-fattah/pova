<!DOCTYPE html>
<html
    @if (app()->getLocale() === 'ar')
        dir="rtl"
    @else
        dir="ltr"
    @endif
    lang="en">

    @include('layouts.frontend.head')

    <body class="has-side-panel side-panel-right fullwidth-page side-push-panel">
        @include('layouts.frontend.header')

        @yield('content')

        @include('layouts.frontend.footer')

        @include('layouts.frontend.scripts')
    </body>
</html>
