@extends('layouts.app')

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Create")." ".trans("category.Category") }}</h3>
        </div>
        <div class="panel-body row">
            {!! Form::open(array('route' => ['categories.store'], "files" => "true")) !!}
                @include("backend.categories.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
