@extends('layouts.app')

@section('content')

<h3>Show Filetype</h3>

<p>{!! link_to_route('filetypes.index', 'Return to all filetypes') !!}</p>

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
		<tr>
			<td>{{{ $filetype->name }}}</td>
					<td>{{{ $filetype->mdlname }}}</td>
					<td>{{{ $filetype->size }}}</td>
					<td>{{{ $filetype->extentions }}}</td>
					<td>{{{ $filetype->required }}}</td>
					<td>{{{ $filetype->multi }}}</td>
                    @if($cuser->can('edit_filetypes'))
                    <td>
                    
                    {!! link_to_route('filetypes.edit', 'Edit', array($filetype->id), array('class' => 'btn btn-info')) !!}
                    
                    </td>  @endif  
                    @if($cuser->can('destroy_filetypes'))
                    <td>
                        {!! Form::open(array('method' => 'DELETE', 'route' => array('filetypes.destroy', $filetype->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        {!! Form::close() !!}
                    </td> @endif
		</tr>
	</tbody>
</table>

@stop
