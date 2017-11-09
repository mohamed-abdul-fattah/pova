@extends('layouts.app')

@section('page-title')
    Create New City
@endsection

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Create")." ".trans("city.City") }}</h3>
        </div>
        <div class="panel-body row">
            {!! Form::open(array('route' => ['cities.store'], "files" => "true")) !!}
                @include("backend.cities.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
