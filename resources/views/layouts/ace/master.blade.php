<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.ace.head')
</head>

<body class="no-skin">
@include('layouts.ace.header')
<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>
@include('layouts.ace.sidebar')
    <div class="main-content">
        <div class="main-content-inner">
@include('layouts.ace.breadcrumbs')
            <div class="page-content">
@include('layouts.ace.settings')
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                            @yield('content')
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

 @include('layouts.ace.footer')
</div><!-- /.main-container -->

<!-- basic scripts -->
@include('layouts.ace.scripts')
@yield('scripts')
</body>
</html>
