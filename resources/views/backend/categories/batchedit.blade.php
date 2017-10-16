@extends('layouts.app')

@section('content')
<section class="panel">
    <div class="panel-heading">

        <h3>{{ trans("main.Batch")." ".trans("category.Categories")." ".trans("main.Edit") }}</h3>

        {!! Form::open(array('method'=>'GET' ,'role'=>'form','class'=>'form-horizontal')) !!}
                {!! Form::input('search', 'q', null, array('id' => 'my_search','placeholder'=>'search', 'class'=>'pull-right input-sm')) !!}
          {!! Form::close() !!}
       {!! link_to_route('categories.create', trans("main.Addnew").trans("category.category"),null,array('class'=>'btn btn-success pull-right')) !!}
    </div>

  {!! Form::model($categories, array('method' => 'post', 'route' => array('categories.batchupdate'),'files'=>"true")) !!}

  @if ($categories->count())

@foreach ($categories as $category)
       <div class="panel-body row">
            <div class='bio-row{{ $errors->has('categories['.$category->id.'][name]') ? ' has-error' : '' }}'>
	{!! Form::label('categories['.$category->id.'][name]', trans('category.Name')) !!}
	{!! Form::text('categories['.$category->id.'][name]', $category->categories['.$category->id.'][name], array('class' => 'form-control', 'required' => 'required')) !!}

	@if ($errors->has('categories['.$category->id.'][name]'))
		<span class='help-block'>
			<strong>{{ $errors->first('categories['.$category->id.'][name]') }}</strong>
		</span>
	@endif
</div>

       </div>
        @endforeach
       <div class="panel-footer">
            {!! Form::submit(trans("main.Update"), array('class' => 'btn btn-info')) !!}
       </div>
       </section>




    <?php echo  isset($_GET['q'])? $categories->appends(array("q"=>$_GET['q']))->links() : $categories->links(); ?>
  @else
	{{ trans("main.thereareno").trans("category.categories") }}
	@endif
      {!! Form::close() !!}

@stop
