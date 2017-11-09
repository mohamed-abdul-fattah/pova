@extends('layouts.app')

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans("main.Edit")." ".trans("price.Price") }}</h3>
        </div>
        <div class="panel-body row">
            {!!
                Form::model($price, [
                    'method' => 'PATCH',
                    'route' => array('prices.update', $price->id),
                    'files' => "true"
                ])
            !!}
                @include("backend.prices.fields")
            {!! Form::close() !!}
        </div>
    </section>
@stop
