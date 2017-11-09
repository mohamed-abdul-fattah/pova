<script>
    $('.table').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        sort      : true,

        ajax: '{!!  route('availabilities.index')!!}',

        columns: [
            { data: 'id', name: 'id' },
            { data: 'start' , name : 'start' },
			{ data: 'end' , name : 'end' },
			{ data: 'type' , name : 'type' },
            { data: 'action' , name : 'action' }
        ]
    });
</script>
