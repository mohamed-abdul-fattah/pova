@extends('layouts.app')

@section('page-title')
    POVA | Admin Panel
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Panel</div>

                <div class="panel-body">
                    <div class="row" style="text-align: center;">
                        @if(Auth::user()->hasAnyRole(['Super Admin'])  )
                            @if(Auth::user()->SuperCan('use_users'))
                                <span class="col-md-2">
                                    <a href="/users" class="btn btn-info btn-lg" role="button">
                                        <i class="fa fa-users"></i><br/>Users
                                    </a>
                                </span>
                            @endif
                            <span class="col-md-2">
                                <a href="/users/{{Auth::user()->id}}" class="btn btn-info btn-lg" role="button">
                                    <span class="glyphicon glyphicon-user"></span><br/>Profile
                                </a>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
