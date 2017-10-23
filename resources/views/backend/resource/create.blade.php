@extends('layouts.app')

@section('page-title')
    Create New Resource
@endsection

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Create {{ucwords($model)}}</h3>
        </div>
        <div class="panel-body row">
            {!! Form::open(array('route' => str_plural($model).'.store',"files"=>true)) !!}
            	@include('backend.'.str_plural($model).'.fields')
            {!! Form::close() !!}
        </div>
    </section>
@stop
