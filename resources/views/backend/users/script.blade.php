<script>
    $('.table').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        sort:true,

        ajax: '{!!  route('users.index') !!}',

        columns: [

            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            {data:'action',name:'action'}

        ]
    });
</script>