@extends('layouts.app')

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Create")." ".trans("price.Price") }}</h3>
        </div>
        <div class="panel-body row">
            {!! Form::open(array('route' => ['prices.store'], "files" => "true")) !!}
                @include("backend.prices.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
