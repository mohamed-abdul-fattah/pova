@extends('layouts.app')

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Create")." ".trans("availability.Availability") }}</h3>
        </div>
        <div class="panel-body row">
            {!! Form::open(array('route' => ['availabilities.store'], "files" => "true")) !!}
                @include("backend.availabilities.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
