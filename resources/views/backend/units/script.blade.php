<script>
    $('.table').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        sort      : true,

        ajax: '{!!  route('units.index')!!}',

        columns: [
            { data: 'id', name: 'id' },
            { data: 'name' , name : 'name' },
			{ data: 'type' , name : 'type' },
            { data: 'action' , name : 'action' }
        ]
    });
</script>
