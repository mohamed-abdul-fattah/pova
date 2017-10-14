@extends('layouts.app')

@section('content')

<h3>{{ trans("main.All")." ".trans("user.Users") }}</h3>
<section class="panel">
    <div class="panel-heading">
<div class="col-lg-4">


</div>

@if(!isset($listing))
	<p>
	@if(Auth::user()->can('create_users'))
		{!! link_to_route('users.create', trans("main.Addnew")." ".trans("user.user"),null,array('class'=>'btn btn-success')) !!}
	@endif
- {!! link_to_route('users.import', trans("main.import")." ".trans("user.user"),null,array('class'=>'btn btn-success')) !!}</p>
- {!! link_to_route('users.downloadCsvTemplate', trans("main.downloadCsvTemplate").' '.trans("main.user"),null,array('class' => 'btn btn-info')) !!}

@else
	{!! link_to_route($type.'.userToOrg', trans("main.add").' '.trans("main.user"), array($id), array('class' => 'btn btn-info')) !!}
	- {!! link_to_route($type.'.import', trans("main.import").' '.trans("main.user"), array($id), array('class' => 'btn btn-info')) !!}
	- {!! link_to_route($type.'.downloadCsvTemplate', trans("main.downloadCsvTemplate").' '.trans("main.user"),null, array('class' => 'btn btn-info')) !!}
@endif


</div>
    <div class="panel-body">

@if ($users->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>{{trans("user.Name")}}</th>
				<th>{{trans("user.Type")}}</th>
				<th>{{trans("user.Parent")}}</th>
				<th colspan="2"></th>

			</tr>
		</thead>

		<tbody>
			@foreach ($users as $user)
				<tr>
					<td><a href="{{ route('users.show',$user->id) }}">{{ $user->name }}</a></td>
					<td><a href="{{ route('users.show',$user->id) }}">{{ $user->type }}</a></td>
					<td></td>
                    {{--@if(Auth::user()->superCan('edit_users'))--}}
                    <td>
                    
                    {!! link_to_route('users.edit', trans("main.Edit"), array($user->id), array('class' => 'btn btn-info')) !!}
                    

					{{--@endif  --}}
                    {{--@if(Auth::user()->superCan('destroy_users'))--}}

                        {!! Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) !!}
                            {!! Form::submit(trans("main.Delete"), array('class' => 'btn btn-danger')) !!}
                        {!! Form::close() !!}
						@canImpersonate
						<a href="{{ route('impersonate', $user->id) }}">Impersonate this user</a>
						@endCanImpersonate
                    </td>
					{{--@endif--}}
				</tr>
			@endforeach
		</tbody>
	</table>
	</div>
        <div class="panel-footer">
	</div>
    </section>
@else
	{{ trans("main.thereareno")." ".trans("user.users") }}
@endif

@stop
