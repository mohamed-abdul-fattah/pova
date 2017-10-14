@extends('layouts.app')

@section('content')
    {!! Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id),'files'=>true)) !!}

     <section class="panel panel-default">
            <div class="panel-heading">
                <h3>{{ trans("main.Edit")." ".trans("users.User") }}</h3>
            </div>
            <div class="panel-body row">
                @include("backend.users.fields")
            </div>
    </section>
    {!! Form::close() !!}
@stop
