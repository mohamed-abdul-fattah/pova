@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-heading">
    <h2 >Search Result</h2>
        </div>
    <div class="panel-body">


        @if($results)

            <ol >


                @foreach ($results as $k=>$result)
        <li>{{$k}}
                <ol>
                @foreach($result as $single)
                                <li>
                                    {!! $single !!}
{{--                                    {{ link_to_route(lcfirst(str_plural(str_replace('App\\','',get_class($result)))).'.show',$result->name,$result->id) }}--}}
                                </li>


                @endforeach
                    </ol>
        </li>
                @endforeach
            </ol>

        @else
            <p class="alert alert-warning"> There are no Result </p>
        @endif
    </div>
    </div>
@stop 