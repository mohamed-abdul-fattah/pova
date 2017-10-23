@extends('layouts.app')

@section('page-title')
    Edit {{localTitle($resource)}}
@endsection

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Edit")." ".trans("resource.Resource") }}</h3>
        </div>
        <div class="panel-body row">
            {!!
                Form::model($resource, [
                    'method' => 'PATCH',
                    'route' => array('resources.update', $resource->id),
                    'files' => "true"
                ])
            !!}
                @include("backend.resources.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
