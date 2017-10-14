<script>
    $('.table').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        sort:true,

        ajax: '{!!  route('nav_items.index')!!}',

        columns: [
            { data: '{{ trans('nav_item.name') }}' , name : '{{ trans('nav_item.name') }}' },
					{ data: '{{ trans('nav_item.route') }}' , name : '{{ trans('nav_item.route') }}' },
					{ data: '{{ trans('nav_item.icon') }}' , name : '{{ trans('nav_item.icon') }}' }

        ]
    });
</script>