@extends('layouts.app')

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Edit")." ".trans("availability.Availability") }}</h3>
        </div>
        <div class="panel-body row">
            {!!
                Form::model($availability, [
                    'method' => 'PATCH',
                    'route' => array('availabilities.update', $availability->id),
                    'files' => "true"
                ])
            !!}
                @include("backend.availabilities.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
