<script>
    $('.table').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        sort      : true,

        ajax: '{!!  route('categories.index')!!}',

        columns: [
            { data: 'id', name: 'id' },
            { data: 'nameAr' , name : 'nameAr' },
            { data: 'nameEn' , name : 'nameEn' },
            { data: 'parent', name: 'parent' },
            { data: 'action' , name : 'action' }
        ]
    });
</script>
