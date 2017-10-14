
<!--[if !IE]> -->
<script src="/hydrogen/backend/components/jquery/dist/jquery.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="/hydrogen/backend/components/jquery.1x/dist/jquery.js"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='/hydrogen/backend/components/_mod/jquery.mobile.custom/jquery.mobile.custom.js'>"+"<"+"/script>");
</script>
<script src="/hydrogen/backend/components/bootstrap/dist/js/bootstrap.js"></script>

<!-- page specific plugin scripts -->

<!-- ace scripts -->
<script src="/hydrogen/backend/ace-assets/js/src/elements.scroller.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/elements.colorpicker.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/elements.fileinput.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/elements.typeahead.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/elements.wysiwyg.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/elements.spinner.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/elements.treeview.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/elements.wizard.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/elements.aside.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/ace.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/ace.basics.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/ace.scrolltop.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/ace.ajax-content.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/ace.touch-drag.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/ace.sidebar.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/ace.sidebar-scroll-1.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/ace.submenu-hover.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/ace.widget-box.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/ace.settings.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/ace.settings-rtl.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/ace.settings-skin.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/ace.widget-on-reload.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/ace.searchbox-autocomplete.js"></script>

<!-- inline scripts related to this page -->

<!-- the following scripts are used in demo only for onpage help and you don't need them -->
<link rel="stylesheet" href="/hydrogen/backend/ace-assets/css/ace.onpage-help.css" />
{{--<link rel="stylesheet" href="../docs/ace-assets/js/themes/sunburst.css" />--}}

<script type="text/javascript"> ace.vars['base'] = '..'; </script>
<script src="/hydrogen/backend/ace-assets/js/src/elements.onpage-help.js"></script>
<script src="/hydrogen/backend/ace-assets/js/src/ace.onpage-help.js"></script>
<script src="/hydrogen/backend/js/toastr.js"></script>
<script src="/hydrogen/backend/js/hydrogen.js"></script>
{{--<script src="../docs/ace-assets/js/rainbow.js"></script>--}}
{{--<script src="../docs/ace-assets/js/language/generic.js"></script>--}}
{{--<script src="../docs/ace-assets/js/language/html.js"></script>--}}
{{--<script src="../docs/ace-assets/js/language/css.js"></script>--}}
{{--<script src="../docs/ace-assets/js/language/javascript.js"></script>--}}
<script type="text/javascript">
    // Add new phone field
    // TODO: add remove btn
    var addBtnClick = (btn, field, copy) => {
        $(btn).last().on('click', (e) => {
            e.preventDefault();
            addNewField(btn, field, copy);
        });
    }

    var addNewField = (btn, field, copy) => {
        var copyField = $(copy).last().clone();
        field.append(copyField);
        addBtnClick(btn, field, copy);
    }

    var phoneField = $('#phone-container');
    addBtnClick('.btn-phone', phoneField, '.phone-fields');
</script>
