<script>
    $('.table').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        sort: true,

        ajax: '{!!  route('categories.index')!!}',

        columns: [
            { data: 'id', name: 'id' },
            { data: '{{ trans('category.name') }}' , name : '{{ trans('category.name') }}' },
            { data: 'action' , name : 'action' }
        ]
    });
</script>
