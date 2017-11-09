@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-10"><h3 class="panel-title">All {{ucwords(str_plural($model))}}</h3></div>
                            <div class="col-xs-2">
                                <a href="{{route( str_plural($model).'.create')}}" class="btn btn-primary btn-sm pull-right">
                                    Create new {{$model}}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('backend.'. str_plural($model).'.indextable')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    @parent
    <script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/505bef35b56/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="//cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
    @include('backend.'. str_plural($model).'.script')
@endsection
