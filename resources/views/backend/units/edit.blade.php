@extends('layouts.app')

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Edit")." ".trans("unit.Unit") }}</h3>
        </div>
        <div class="panel-body row">
            {!!
                Form::model($unit, [
                    'method' => 'PATCH',
                    'route' => array('units.update', $unit->id),
                    'files' => "true"
                ])
            !!}
                @include("backend.units.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
