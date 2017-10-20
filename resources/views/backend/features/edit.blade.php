@extends('layouts.app')

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Edit")." ".trans("feature.feature") }}</h3>
        </div>
        <div class="panel-body row">
            {!!
                Form::model($feature, [
                    'method' => 'PATCH',
                    'route' => array('features.update', $feature->id),
                    'files' => "true"
                ])
            !!}
                @include("backend.features.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
