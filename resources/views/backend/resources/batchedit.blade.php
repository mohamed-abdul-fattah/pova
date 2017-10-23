@extends('layouts.app')

@section('content')
<section class="panel">
    <div class="panel-heading">

        <h3>{{ trans("main.Batch")." ".trans("resource.Resources")." ".trans("main.Edit") }}</h3>

        {!! Form::open(array('method'=>'GET' ,'role'=>'form','class'=>'form-horizontal')) !!}
                {!! Form::input('search', 'q', null, array('id' => 'my_search','placeholder'=>'search', 'class'=>'pull-right input-sm')) !!}
          {!! Form::close() !!}
       {!! link_to_route('resources.create', trans("main.Addnew").trans("resource.resource"),null,array('class'=>'btn btn-success pull-right')) !!}
    </div>

  {!! Form::model($resources, array('method' => 'post', 'route' => array('resources.batchupdate'),'files'=>"true")) !!}

  @if ($resources->count())

@foreach ($resources as $resource)
       <div class="panel-body row">
            {{-- Resources['.$resource>id.'][categoryId] --}}
<div class='bio-row{{ $errors->has('resources['.$resource->id.'][category_id]') ? ' has-error' : '' }}'>
	{!! Form::label('resources['.$resource->id.'][category_id]', trans('resource.CategoryId')) !!}
	{!! Form::text('resources['.$resource->id.'][category_id]', $resource->resources['.$resource->id.'][category_id], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('resources['.$resource->id.'][category_id]'))
		<span class='help-block'>
			<strong>{{ $errors->first('resources['.$resource->id.'][category_id]') }}</strong>
		</span>
	@endif
</div>
{{-- End resources['.$resource->id.'][category_id] --}}

{{-- Resources['.$resource>id.'][userId] --}}
<div class='bio-row{{ $errors->has('resources['.$resource->id.'][user_id]') ? ' has-error' : '' }}'>
	{!! Form::label('resources['.$resource->id.'][user_id]', trans('resource.UserId')) !!}
	{!! Form::text('resources['.$resource->id.'][user_id]', $resource->resources['.$resource->id.'][user_id], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('resources['.$resource->id.'][user_id]'))
		<span class='help-block'>
			<strong>{{ $errors->first('resources['.$resource->id.'][user_id]') }}</strong>
		</span>
	@endif
</div>
{{-- End resources['.$resource->id.'][user_id] --}}

{{-- Resources['.$resource>id.'][title] --}}
<div class='bio-row{{ $errors->has('resources['.$resource->id.'][title]') ? ' has-error' : '' }}'>
	{!! Form::label('resources['.$resource->id.'][title]', trans('resource.Title')) !!}
	{!! Form::text('resources['.$resource->id.'][title]', $resource->resources['.$resource->id.'][title], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('resources['.$resource->id.'][title]'))
		<span class='help-block'>
			<strong>{{ $errors->first('resources['.$resource->id.'][title]') }}</strong>
		</span>
	@endif
</div>
{{-- End resources['.$resource->id.'][title] --}}

{{-- Resources['.$resource>id.'][feature] --}}
<div class='bio-row{{ $errors->has('resources['.$resource->id.'][feature]') ? ' has-error' : '' }}'>
	{!! Form::label('resources['.$resource->id.'][feature]', trans('resource.Feature')) !!}
	{!! Form::checkbox('resources['.$resource->id.'][feature]', $resource->resources['.$resource->id.'][feature]) !!}
	@if ($errors->has('resources['.$resource->id.'][feature]'))
		<span class='help-block'>
			<strong>{{ $errors->first('resources['.$resource->id.'][feature]') }}</strong>
		</span>
	@endif
</div>
{{-- End resources['.$resource->id.'][feature] --}}

       </div>
        @endforeach
       <div class="panel-footer">
            {!! Form::submit(trans("main.Update"), array('class' => 'btn btn-info')) !!}
       </div>
       </section>




    <?php echo  isset($_GET['q'])? $resources->appends(array("q"=>$_GET['q']))->links() : $resources->links(); ?>
  @else
	{{ trans("main.thereareno").trans("resource.resources") }}
	@endif
      {!! Form::close() !!}

@stop
