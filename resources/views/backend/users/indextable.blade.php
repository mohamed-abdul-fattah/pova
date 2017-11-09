@extends('layouts.app')

@section('content')

	<h3>{{ trans("main.All")." ".trans("users.Users") }}</h3>
	<section class="panel">
		<div class="panel-heading">
			@if(!isset($listing))
				<p>
					@if(Auth::user()->can('create_users'))
						{!! link_to_route('users.create', trans("main.Addnew")." ".trans("user.user"),null,array('class'=>'btn btn-success')) !!}
					@endif
					- {!! link_to_route('users.import', trans("main.import")." ".trans("user.user"),null,array('class'=>'btn btn-success')) !!}</p>
				- {!! link_to_route('users.downloadCsvTemplate', trans("main.downloadCsvTemplate").' '.trans("main.user"),null,array('class' => 'btn btn-info')) !!}

			@else
				- {!! link_to_route($type.'.import', trans("main.import").' '.trans("main.user"), array($id), array('class' => 'btn btn-info')) !!}
				- {!! link_to_route($type.'.downloadCsvTemplate', trans("main.downloadCsvTemplate").' '.trans("main.user"),null, array('class' => 'btn btn-info')) !!}
			@endif
			<div class="col-lg-4">



		</div>
		<div class="panel-body">

			<table class="table table-striped table-bordered ddt-responsive table-hover">
				<thead>
				<tr>
					<th>{{trans("user.Name")}}</th>
					<th>{{trans("user.Type")}}</th>
					<th>Action</th>
				</tr>
				</thead>


			</table>
		</div>
		<div class="panel-footer">
		</div>
	</section>


@stop
@section('scripts')
	@parent
	<link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet"/>
	<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/plug-ins/505bef35b56/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	{{--<script src="//cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>--}}
	@include('backend.users.script',compact('id','type'))

@stop