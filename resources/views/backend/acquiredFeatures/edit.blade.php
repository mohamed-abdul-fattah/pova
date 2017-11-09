@extends('layouts.app')

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Edit")." ".trans("acquiredFeature.AcquiredFeature") }}</h3>
        </div>
        <div class="panel-body row">
            {!!
                Form::model($acquiredFeature, [
                    'method' => 'PATCH',
                    'route' => array('acquired-features.update', $acquiredFeature->id),
                    'files' => "true"
                ])
            !!}
                @include("backend.acquiredFeatures.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
