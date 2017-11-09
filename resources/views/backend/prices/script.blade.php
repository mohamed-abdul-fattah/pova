<script>
    $('.table').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        sort      : true,

        ajax: '{!!  route('prices.index')!!}',

        columns: [
            { data: 'id', name: 'id' },
            { data: 'price' , name : 'price' },
			{ data: 'currency' , name : 'currency' },
            { data: 'action' , name : 'action' }
        ]
    });
</script>
