<script>
    $('.table').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        sort      : true,

        ajax: '{!!  route('cities.index')!!}',

        columns: [
            { data: 'id', name: 'id' },
            { data: 'name' , name : 'name' },
            { data: 'action' , name : 'action' }
        ]
    });
</script>
