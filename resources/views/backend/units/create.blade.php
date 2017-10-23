@extends('layouts.app')

@section('page-title')
    Create New Unit
@endsection

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Create")." ".trans("unit.Unit") }}</h3>
        </div>
        <div class="panel-body row">
            {!! Form::open(array('route' => ['units.store'], "files" => "true")) !!}
                @include("backend.units.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
