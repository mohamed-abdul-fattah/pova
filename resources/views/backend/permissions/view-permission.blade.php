@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row">
        <div class="col-md-10 col-md-offset-1"> 

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-10"><h3 class="panel-title">View permissions</h3></div>
            <div class="col-xs-2">
                <a href="{{route('permissions.create')}}" class="btn btn-primary btn-sm pull-right">Create permission</a>
            </div>
        </div>
    </div>
    <div class="panel-body">

        
        
        @if(count($perms) == 0)
        <p>You do not have any permissions.
            {{--<a href="{{route('permissions.create')}}" class="btn btn-primary btn-sm">Create permission</a>--}}
        </p>
            @else
<!--            Table view begins-->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Permission</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($perms as $p)                
                <tr>
                    <td class="col-xs-1">{{$p->id}}</td>
                    <td class="col-xs-2">{{$p->name}}</td>
                    <td class="col-xs-1"><a href="{{route('permissions.edit', $p->id)}}" class="btn btn-primary btn-sm ">Edit</a></td>
                    <td class="col-xs-1">
                        {!! Form::open(array('route' => array('permissions.destroy', $p->id), 'method' => 'DELETE')) !!}
                        <button class="btn btn-danger btn-sm btnDelete" type="submit" >Delete Permission</button>
                        {!! Form::close() !!}                        

                </tr>
                @endforeach                     
            </tbody>
        </table> 
<!--        Table view ends-->
        

        @endif
    </div>
</div>
            
        </div>                    
    </div>
</div>            


<!-- Modal -->
<div class="modal fade" id="dlgModal">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">@if(isset($title)) {{$title}} @else {{'Delete action'}} @endif</h4>
            </div>
            
            
            
            <div class="modal-body">
                <p>@if(isset($message)) {{$message}} @else {{'Are you sure ? '}} @endif</p>
            </div>
            
            
            
            
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal"> No </button>
                <button type="button" class="btn btn-danger btnDeleteConfirm">Delete</button>
            </div>
            
            
            
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@stop


@section('scripts')
@parent
<script src={{asset("backend/js/helpers/dialogDelete.js")}}></script>
@stop