@include('layouts.'.config('hydrogen.template').'.master')

<script type="text/javascript">
    function confirmDelete(e){
        var x = confirm('Are you sure you want to delete this ?');
        if(x == false){
            e.preventDefault();
        }
    }
</script>
