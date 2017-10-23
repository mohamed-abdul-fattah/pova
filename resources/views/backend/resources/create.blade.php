@extends('layouts.app')

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Create")." ".trans("resource.Resource") }}</h3>
        </div>
        <div class="panel-body row">
            {!! Form::open(array('route' => ['resources.store'], "files" => "true")) !!}
                @include("backend.resources.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
