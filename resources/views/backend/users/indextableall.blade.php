@extends('layouts.app')

@section('page-title')
    Users
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-10"><h3>All Users</h3></div>
                            <div class="col-xs-2">
                                <a href="{{route('users.create')}}" class="btn btn-primary btn-sm pull-right">
                                    Create New User
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered ddt-responsive table-hover">
                            <thead>
                            <tr>
                                <th>{{trans("user.Name")}}</th>
                                <th>{{trans("user.Email")}}</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    @parent
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/505bef35b56/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    @include('backend.users.scriptall')
@stop
