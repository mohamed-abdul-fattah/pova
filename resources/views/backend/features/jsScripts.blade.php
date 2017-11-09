<script type="text/javascript">
    var $selections    = $('#selections-field'),
        $selectionType = $('select[name=type]');

    /**
     * Enable selections when feature type is selection.
     */
    $selectionType.on('change', function (e) {
        var type = $selectionType.val();

        if (type === 'selection') {
            $selections.show('fast');
        } else {
            $selections.hide('fast');
        }
    });
</script>
