@extends('layouts.app')

@section('content')
<h3>{{ trans("main.Show")." ".trans("nav_item.Nav_item") }}</h3>

<p>{!! link_to_route('nav_items.index', trans("main.back")." ".trans("nav_item.nav_items")) !!}</p>

 <section class="panel panel-default">
        <div class="panel-heading">
         <h4>{{ $nav_item->name }}</h4>
                </div>
 <div class="panel-body row">


			<div class='bio-row'><p><span class='bold'>{{ trans('nav_item.name') }} :</span>
                        {{ $nav_item->name }}</p></div>
					<div class='bio-row'><p><span class='bold'>{{ trans('nav_item.route') }} :</span>
                        {{ $nav_item->route }}</p></div>
					<div class='bio-row'><p><span class='bold'>{{ trans('nav_item.icon') }} :</span>
                        {{ $nav_item->icon }}</p></div>
					<div class='bio-row'><p><span class='bold'>{{ trans('nav_item.nav') }} :</span>
                        </p></div>
					<div class='bio-row'><p><span class='bold'>{{ trans('nav_item.nav_item') }} :</span>
                        </p></div>

        </div>
        <div class="panel-footer row">

            @if(Auth::user()->can('edit',$nav_item))


                {!! link_to_route('nav_items.edit', trans('main.Edit'), array($nav_item->id), array('class' => 'btn btn-info
                col-lg-1')) !!}

            @endif
            @if(Auth::user()->can('delete',$nav_item))

                {!! Form::open(array('method' => 'DELETE', 'route' => array('nav_items.destroy',
                $nav_item->id),"class"=>"col-lg-1")) !!}
                {!! Form::submit(trans('main.Delete'), array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </section>
@stop