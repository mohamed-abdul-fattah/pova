@extends('layouts.app')

@section('page-title')
    Edit {{ ucwords(nameLocale($category)) }}
@endsection

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Edit")." ".trans("category.Category") }}</h3>
        </div>
        <div class="panel-body row">
            {!!
                Form::model($category, [
                    'method' => 'PATCH',
                    'route' => array('categories.update', $category->id),
                    'files' => "true"
                ])
            !!}
                @include("backend.categories.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
