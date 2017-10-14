@extends('layouts.app')

@section('content')
    {!! Form::open(array('route' => 'users.store',"files"=>true)) !!}
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3>{{ trans("main.Create")." ".trans("users.User") }}</h3>
        </div>
        <div class="panel-body row">
            @include("backend.users.fields",['creating'=>'creating'])
        </div>
    </section>
    {!! Form::close() !!}
@stop
