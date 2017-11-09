@extends('layouts.app')

@section('content')
	<section class="panel panel-default">
		<div class="panel-heading">
			<h3>All Filetypes</h3>

		</div>
		<div class="panel-body row">



<p>{!! link_to_route('filetypes.create', 'Add new filetype') !!}</p>

@if ($filetypes->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Mdlname</th>
				<th>Size</th>
				<th>Extentions</th>
				<th>Required</th>
				<th>Multi</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($filetypes as $filetype)
				<tr>
					<td>{{ $filetype->name }}</td>
					<td>{{ $filetype->mdlname }}</td>
					<td>{{ $filetype->size }}</td>
					<td>{{ $filetype->extentions }}</td>
					<td>{{ $filetype->required }}</td>
					<td>{{ $filetype->multi }}</td>
                    {{--@if($cuser->can('edit_filetypes'))--}}
                    <td>
                    
                    {!! link_to_route('filetypes.edit', 'Edit', array($filetype->id), array('class' => 'btn btn-info')) !!}
                    
                    </td>
					{{--@endif  --}}
                    {{--@if($cuser->can('destroy_filetypes'))--}}
                    <td>
                        {!! Form::open(array('method' => 'DELETE', 'route' => array('filetypes.destroy', $filetype->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        {!! Form::close() !!}
                    </td>
					{{--@endif--}}
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no filetypes
@endif
</div>
	</section>
@stop
