@extends('layouts.app')

@section('content')
    <section class="panel panel-default">
        <div class="panel-heading">
            <h3>Create Filetype</h3>

        </div>
        <div class="panel-body row">


{!! Form::open(array('route' => 'filetypes.store')) !!}
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


