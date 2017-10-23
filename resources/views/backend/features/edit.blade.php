@extends('layouts.app')

@section('page-title')
    Edit {{ ucwords(localName($feature)) }}
@endsection

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Edit")." ".trans("feature.Feature") }}</h3>
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

@section('js-scripts')
    @include('backend.features.jsScripts')
@endsection
