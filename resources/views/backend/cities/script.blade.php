<script>
    $('.table').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        sort      : true,

        ajax: '{!!  route('cities.index')!!}',

        columns: [
            { data: 'id', name: 'id' },
            { data: 'country', name: 'country' },
            { data: 'nameAr' , name : 'name' },
            { data: 'nameEn' , name : 'name' },
            { data: 'action' , name : 'action' }
        ]
    });
</script>
