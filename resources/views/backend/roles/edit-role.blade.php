@extends('layouts.app')

@section('content')
<link href={{asset("backend/css/bootstrap/bootstrap.min.css")}} rel="stylesheet">
<link href={{asset("backend/css/duallistbox/bootstrap-duallistbox.min.css")}} rel="stylesheet">

<div class="container">
    
    <div class="row">
        <div class="col-md-10 col-md-offset-1"> 

<div class="panel panel-default">
    <div class="panel-heading">Editing roles</div>
    <div class="panel-body">
        {!! Form::open(array('route' => array('roles.update', $id), 'role' => 'form', 'method' => 'PUT')) !!}
        <div class="form-group">
            <label for="name">Name</label>
            {!!Form::text('name', $name, 
                            array("id"=>"name", "class"=>"form-control", "placeholder"=>"Enter role name"));!!}
            {{$errors->first('name',  '<p class="text-danger">:message</p>')}}
        </div>


        <div class="form-group">
        {!!Form::select('permissions[]', $availPermissions, $assignedPermissions->toArray(),
        array('multiple'=>'multiple', "size"=>10, "style"=>"display:none"))
        !!}                
            {{$errors->first('permissions[]', '<p class="text-danger">:message</p>')}}

        </div>
                

        <button type="submit" class="btn btn-primary btn-sm">Save</button>
        {!! Form::close() !!}
    </div>
</div>

        </div>                    
    </div>
</div>

@stop

@section('scripts')
@parent
<script src={{asset("/backend/js/duallistbox/jquery.bootstrap-duallistbox.min.js")}}></script>
<script>
    $(function () {
        
            var demo1 = $('select[name="permissions[]"]').bootstrapDualListbox({
                nonSelectedListLabel: 'Available permissions',
                selectedListLabel: 'Selected permissions',
                preserveSelectionOnMove: 'moved',
                moveOnSelect: true,
//                nonSelectedFilter: 'ion ([7-9]|[1][0-2])'
            });
//

    });
</script>

@stop