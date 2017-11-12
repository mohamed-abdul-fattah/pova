<!-- external javascripts -->
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/jquery-migrate.js" charset="utf-8"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="/js/jquery-plugin-collection.js"></script>
<!-- JS | Custom script for all pages -->
@if (app()->getLocale() === 'ar')
    <script src="/js/locales/bootstrap-datepicker.ar.js" charset="utf-8"></script>
@endif
<script src="/js/custom.js"></script>

@yield('js-scripts')
