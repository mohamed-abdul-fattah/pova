@extends('layouts.app')

@section('content')
<?php $nested=  explode('.',Route::current()->getName())[0]; ?>

<h3>{{ trans("main.All")." ".trans("nav_item.Nav_items") }}</h3>
<section class="panel">
    <div class="panel-heading">
<div class="col-lg-4">


</div>
@if(Auth::user()->superCan('create',"App\NavItem"))
<p>{!! link_to_route('nav_items.create', trans("main.Addnew")." ".trans("nav_item.nav_item"),null,array('class'=>'btn btn-success')) !!}</p>
 @endif

</div>
    <div class="panel-body">
@if ($nav_items->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>{{trans("nav_item.Name")}}</th>
				<th>{{trans("nav_item.Route")}}</th>
				<th>{{trans("nav_item.Icon")}}</th>
				<th></th>
                <th></th>
			</tr>
		</thead>

		<tbody>
			@foreach ($nav_items as $nav_item)
				<tr>
					<td><a href="{{ route('nav_items.show',$nav_item->id) }}">{{ $nav_item->name }}</a></td>
					<td><a href="{{ route('nav_items.show',$nav_item->id) }}">{{ $nav_item->route }}</a></td>
					<td><a href="{{ route('nav_items.show',$nav_item->id) }}">{{ $nav_item->icon }}</a></td>
                    @if(Auth::user()->superCan('edit_nav_items'))
                    <td>
                        {!! link_to_route('nav_items.edit', trans("main.Edit"), array($nav_item->id), array('class' => 'btn btn-info')) !!}
                    </td>
                    @endif
                    @if(Auth::user()->superCan('destroy_nav_items'))
                    <td>
                        {!! Form::open(array('method' => 'DELETE', 'route' => array('nav_items.destroy', $nav_item->id))) !!}
                            {!!
                                Form::submit(trans("main.Delete"), array(
                                    'class'   => 'btn btn-danger',
                                    'onclick' => 'confirmDelete()'
                                ))
                            !!}
                        {!! Form::close() !!}
                    </td>
                    @endif
				</tr>
			@endforeach
		</tbody>
	</table>
	</div>
        <div class="panel-footer">
	</div>
    </section>
@else
	{{ trans("main.thereareno")." ".trans("nav_item.nav_items") }}
@endif

@stop
