@extends('layouts.app')

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Create")." ".trans("feature.Feature") }}</h3>
        </div>
        <div class="panel-body row">
            {!! Form::open(array('route' => ['features.store'], "files" => "true")) !!}
                @include("backend.features.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
