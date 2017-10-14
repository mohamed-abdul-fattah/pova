@extends('layouts.app')
@section('content')
	<section class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Edit {{ucwords($model)}}</h3>
		</div>
		<div class="panel-body row">
			{!! Form::model(${$model}, array('method' => 'PATCH', 'route' => array( str_plural($model).'.update', ${$model}->id),'files'=>true)) !!}
				@include('backend.'.str_plural($model).'.fields')
			{!! Form::close() !!}
		</div>
	</section>
@stop
