@extends('layouts.app')

@section('page-title')
    Create New Acquired Feature
@endsection

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Create")." ".trans("acquiredFeature.AcquiredFeature") }}</h3>
        </div>
        <div class="panel-body row">
            {!! Form::open(array('route' => ['acquired-features.store'], "files" => "true")) !!}
                @include("backend.acquiredFeatures.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
