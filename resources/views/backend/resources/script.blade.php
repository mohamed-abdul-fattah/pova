<script>
    $('.table').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        sort      : true,

        ajax: '{!!  route('resources.index')!!}',

        columns: [
            { data: 'id', name: 'id' },
            { data: 'titleAr' , name : 'titleAr' },
            { data: 'titleEn' , name : 'titleEn' },
            { data: 'user' , name : 'user' },
            { data: 'category' , name : 'category' },
			{ data: 'feature' , name : 'feature' },
            { data: 'action' , name : 'action' }
        ]
    });
</script>
