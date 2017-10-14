@extends('layouts.app')

@section('content')
<link href={{asset("backend/css/bootstrap/bootstrap.min.css")}} rel="stylesheet">
<link href={{asset("backend/css/duallistbox/bootstrap-duallistbox.min.css")}} rel="stylesheet">
<div class="container">
    
    <div class="row">
        <div class="col-md-10 col-md-offset-1">  


<div class="panel panel-default">
    <div class="panel-heading">User: {{$user->name}}</div>
    <div class="panel-body">
        {!! Form::open(array('route' => array('users.update', $user->id), 'role' => 'form', 'method' => 'PUT','files' =>true)) !!}

        
        <div class="form-group">
        {!!Form::select('roles[]', $data['availRoles'], $data['assignedRoles'],
            array('multiple'=>'multiple', "size"=>5, "style"=>"display:none"))
        !!}
            {{$errors->first('roles[]', '<p class="text-danger">:message</p>')}}

        </div>

        @foreach($user->phototypes() as $phototype)
            @include('backend.partials.images',array('pictures'=>$user->photos($phototype->id),'phototype'=>$phototype))
        @endforeach

        
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
<script src={{asset("backend/js/duallistbox/jquery.bootstrap-duallistbox.min.js")}}></script>
<script>
    $(function () {
        
            var roles = $('select[name="roles[]"]').bootstrapDualListbox({
                nonSelectedListLabel: 'Available roles',
                selectedListLabel: 'Assigned roles',
                preserveSelectionOnMove: 'moved',
                moveOnSelect: true,
//                nonSelectedFilter: 'ion ([7-9]|[1][0-2])'
            });
          

    });
</script>
@stop