<script>
    $('.table').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        sort      : true,

        ajax: '{!!  route('resources.index')!!}',

        columns: [
            { data: 'id', name: 'id' },
            { data: 'title' , name : 'title' },
            { data: 'category' , name : 'category' },
            { data: 'owner' , name : 'owner' },
			{ data: 'featured' , name : 'featured' },
            { data: 'action' , name : 'action' }
        ]
    });
</script>
