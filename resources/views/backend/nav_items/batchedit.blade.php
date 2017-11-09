@extends('layouts.app')

@section('content')
<section class="panel">
    <div class="panel-heading">

        <h3>{{ trans("main.Batch")." ".trans("nav_item.Nav_items")." ".trans("main.Edit") }}</h3>

        {!! Form::open(array('method'=>'GET' ,'role'=>'form','class'=>'form-horizontal')) !!}
         <div class="control-label col-lg-3">
            {!!Form::label(trans("main.Search"))!!}
            <div class="col-lg-9">
                {!! Form::input('search', 'q', null, array('id' => 'my_search', 'class'=>'form-control input-sm')) !!}
            </div>
         </div>
          {!! Form::close() !!}
        <p>{!! link_to_route('nav_items.create', trans("main.Addnew").trans("nav_item.nav_item"),null,array('class'=>'btn btn-success')) !!}</p>
    </div>
</section>
  {!! Form::model($nav_items, array('method' => 'PATCH', 'route' => array('nav_items.batchupdate'),'files'=>"true")) !!}

  @if ($nav_items->count())


    @foreach ($nav_items as $nav_item)

        <section class="panel">
            <div class="panel-heading">
            </div>

       <div class="panel-body row">
                    <div class='bio-row'>
                <p><span>
            {!! Form::label('nav_items[$nav_item->id][name]', trans("nav_item.Name").':') !!}</span>
            @if(str_singular(explode('.',Route::current()->getName())[0])!=substr('name',0,-3))
{!! Form::text('nav_items[$nav_item->id][name]',$nav_item->nav_items[$nav_item->id][name],array('class'=>'form-control')) !!}
@endif

            </p>
        </div>
        <div class='bio-row'>
                <p><span>
            {!! Form::label('nav_items[$nav_item->id][route]', trans("nav_item.Route").':') !!}</span>
            @if(str_singular(explode('.',Route::current()->getName())[0])!=substr('route',0,-3))
{!! Form::text('nav_items[$nav_item->id][route]',$nav_item->nav_items[$nav_item->id][route],array('class'=>'form-control')) !!}
@endif

            </p>
        </div>
        <div class='bio-row'>
                <p><span>
            {!! Form::label('nav_items[$nav_item->id][icon]', trans("nav_item.Icon").':') !!}</span>
            @if(str_singular(explode('.',Route::current()->getName())[0])!=substr('icon',0,-3))
{!! Form::text('nav_items[$nav_item->id][icon]',$nav_item->nav_items[$nav_item->id][icon],array('class'=>'form-control')) !!}
@endif

            </p>
        </div>
        <div class='bio-row'>
                <p><span>
            {!! Form::label('nav_items[$nav_item->id][nav_id]', trans("nav_item.Nav_id").':') !!}</span>
            @if(str_singular(explode('.',Route::current()->getName())[0])!=substr('nav_id',0,-3))

              {!!  Form::select('nav_items[$nav_item->id][nav_id]',getsel('Nav'),null,array('class'=>'form-control')) !!}
                             @endif

            </p>
        </div>
        <div class='bio-row'>
                <p><span>
            {!! Form::label('nav_items[$nav_item->id][nav_item_id]', trans("nav_item.Nav_item_id").':') !!}</span>
            @if(str_singular(explode('.',Route::current()->getName())[0])!=substr('nav_item_id',0,-3))

              {!!  Form::select('nav_items[$nav_item->id][nav_item_id]',getsel('Nav_item'),null,array('class'=>'form-control')) !!}
                             @endif

            </p>
        </div>
       </div>
       <div class="panel-footer">
            {!! Form::submit(trans("main.Update"), array('class' => 'btn btn-info')) !!}
       </div>
       </section>

    @endforeach


    <?php echo  isset($_GET['q'])? $nav_items->appends(array("q"=>$_GET['q']))->render() : $nav_items->render(); ?>
  @else
	{{ trans("main.thereareno").trans("nav_item.nav_items") }}
	@endif
      {!! Form::close() !!}

@stop
