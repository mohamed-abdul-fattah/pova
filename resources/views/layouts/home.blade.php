@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Panel</div>

                <div class="panel-body">
                    <div class="row" style="text-align: center;">
                        @if(Auth::user()->hasAnyRole(['Super Admin','Meeza Admin'])  )
                            @if(Auth::user()->SuperCan('use_users'))
                                <span class="col-md-2">  <a href="/users" class="btn btn-info btn-lg" role="button"><i
                                                class="fa fa-users"></i> <br/>Users</a></span>

                            @endif
                                <span class="col-md-2">  <a href="/users/{{Auth::user()->id}}" class="btn btn-info btn-lg" role="button"><span
                                                class="glyphicon glyphicon-user"></span> <br/>Profile</a></span>
                                <span class="col-md-2">  <a href="/categories" class="btn btn-info btn-lg" role="button"><span
                                                class="fa fa-code-fork"></span> <br/>Categories</a></span>
                        @endif
                            @if(Auth::user()->hasAnyRole(['Super Admin','Meeza Admin','Meeza Employee','Corporate Admin','Corporate Employee']) )

                            <span class="col-md-2">  <a href="/corporates" class="btn btn-info btn-lg" role="button"><span
                                    class="fa fa-building-o"></span> <br/>Corporates</a></span>
                            @endif
                            @if(Auth::user()->hasAnyRole(['Super Admin','Meeza Admin','Meeza Employee','Partner Admin','Partner Employee']) )

                            <span class="col-md-2">  <a href="/partners" class="btn btn-info btn-lg" role="button"><span
                                    class="fa fa-gift"></span> <br/>Partners</a></span>
                            @endif

                    </div>
                </div>
            </div>

            <div class="row state-overview">
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol terques">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="value">
                            <h1 class="count">{{$users}}</h1>
                            <p>Total Users</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol red">
                            <i class="fa fa-tags"></i>
                        </div>
                        <div class="value">
                            <h1 class=" count2">{{$deals}}</h1>
                            <p>Total Deals</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol yellow">
                            <i class="fa fa-building-o"></i>
                        </div>
                        <div class="value">
                            <h1 class=" count3">{{$corporates}}</h1>
                            <p>Total Corporates</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol blue">
                            <i class="fa fa-gift"></i>
                        </div>
                        <div class="value">
                            <h1 class=" count4">{{$partners}}</h1>
                            <p>Total Partners</p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

@endsection
