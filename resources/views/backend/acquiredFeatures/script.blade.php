<script>
    $('.table').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        sort      : true,

        ajax: '{!!  route('acquired-features.index')!!}',

        columns: [
            { data: 'id', name: 'id' },
            { data: 'featureable' , name : 'featureable' },
			{ data: 'value_string' , name : 'value_string' },
			{ data: 'value_number' , name : 'value_number' },
			{ data: 'value_boolean' , name : 'value_boolean' },
			{ data: 'value_text' , name : 'value_text' },
            { data: 'action' , name : 'action' }
        ]
    });
</script>
