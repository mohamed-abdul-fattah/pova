@extends('layouts.app')
@section('content')
<?php $nested=  explode('.',Route::current()->getName())[0]; ?>
{!! Form::model($nav_item, array('method' => 'PATCH', 'route' => array('nav_items.update', $nav_item->id),'files'=>true)) !!}

 <section class="panel panel-default">
        <div class="panel-heading">
<h3>{{ trans("main.Edit")." ".trans("nav_item.Nav_item") }}</h3>
    </div>
        <div class="panel-body row">
	@include("backend.nav_items.fields")

</div>
        <div class="panel-footer">

			</div>
            </section>

    {!! Form::close() !!}




@if ($errors->any())
	<ul>
		{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
	</ul>
@endif

@stop
