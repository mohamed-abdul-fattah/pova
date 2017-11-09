<script>
    $('.table').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        sort      : true,

        ajax: '{!!  route('features.index')!!}',

        columns: [
            { data: 'id', name: 'id' },
            { data: 'nameAr' , name : 'nameAr' },
            { data: 'nameEn' , name : 'nameEn' },
			{ data: 'type' , name : 'type' },
			{ data: 'required' , name : 'required' },
			{ data: 'selections' , name : 'selections' },
            { data: 'action' , name : 'action' }
        ]
    });
</script>
