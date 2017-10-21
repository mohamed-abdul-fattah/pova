@extends('layouts.app')

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Edit")." ".trans("city.City") }}</h3>
        </div>
        <div class="panel-body row">
            {!!
                Form::model($city, [
                    'method' => 'PATCH',
                    'route' => array('cities.update', $city->id),
                    'files' => "true"
                ])
            !!}
                @include("backend.cities.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
