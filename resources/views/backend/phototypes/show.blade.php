@extends('layouts.app')

@section('content')

<h3>Show phototype</h3>

<p>{!! link_to_route('phototypes.index', 'Return to all phototypes') !!}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Width</th>
				<th>Height</th>
				<th>Multi</th>
				<th>Mdlname</th>
				<th>Max Size</th>
				<th>Extensions</th>
				<th>Required</th>
			<th colspan="2"></th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $phototype->name }}}</td>
            <td>{{{ $phototype->minWidth ."x".$phototype->maxWidth}}}</td>
            <td>{{{ $phototype->minHeight."x".$phototype->maxHeight }}}</td>
            <td>{{{ $phototype->multi }}}</td>
            <td>{{{ $phototype->mdlname }}}</td>
            <td>{{{ $phototype->maxSize }}}</td>
            <td>{{{ $phototype->extensions }}}</td>
					<td>{{{ $phototype->required }}}</td>
                    {{--@if($cuser->can('edit_phototypes'))--}}
                    <td>
                    
                    {!! link_to_route('phototypes.edit', 'Edit', array($phototype->id), array('class' => 'btn btn-info')) !!}
                    
                    </td>
			{{--@endif  --}}
                    {{--@if($cuser->can('destroy_phototypes'))--}}
                    <td>
                        {!! Form::open(array('method' => 'DELETE', 'route' => array('phototypes.destroy', $phototype->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        {!! Form::close() !!}
                    </td>
			{{--@endif--}}
		</tr>
	</tbody>
</table>

@stop
