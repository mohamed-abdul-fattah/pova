@extends('layouts.app')

@section('content')
    <h3>{{ trans("main.All")." ".trans("users.Users") }}</h3>
    <section class="panel">
        <div class="panel-heading">
            <p>{!! link_to_route('users.create', trans("main.Addnew")." ".trans("users.user"),null,array('class'=>'btn btn-success')) !!}</p>
            <div class="panel-body">
                <table class="table table-striped table-bordered ddt-responsive table-hover">
                    <thead>
                    <tr>
                        <th>{{trans("users.Name")}}</th>
                        <th>{{trans("users.Email")}}</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
    </section>
@stop
@section('scripts')
    @parent
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/505bef35b56/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    @include('backend.users.scriptall')
@stop
