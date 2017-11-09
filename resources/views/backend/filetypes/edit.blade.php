@extends('layouts.app')
@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3>Edit Filetype</h3>

        </div>
        <div class="panel-body row">

{!! Form::model($filetype, array('method' => 'PATCH', 'route' => array('filetypes.update', $filetype->id))) !!}
@include('backend.filetypes.fields')
{!! Form::close() !!}

@if ($errors->any())
	<ul>
		{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
	</ul>
@endif
</div>
    </section>
@stop
