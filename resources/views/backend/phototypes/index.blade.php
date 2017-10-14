@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-10"><h3 class="panel-title">All Photo Types</h3></div>
                            <div class="col-xs-2">
                                <a href="{{route('phototypes.create')}}" class="btn btn-primary btn-sm pull-right">Create
                                    Photo Types</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">


                        @if(count($phototypes) == 0)
                            <p>You do not have any UploadedFiles. <a href="{{route('phototypes.create')}}"
                                                                     class="btn btn-primary btn-sm">Create Photo
                                    Types</a><p>
                                @else
                                        <!--            Table view begins-->

                            <table class="table table-hover">
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
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($phototypes as $phototype)
                                    <tr>
                                        <td>{{ $phototype->name }}</td>
                                        <td>{{ $phototype->minWidth ."x".$phototype->maxWidth}}</td>
                                        <td>{{ $phototype->minHeight."x".$phototype->maxHeight }}</td>
                                        <td>{{ $phototype->multi }}</td>
                                        <td>{{ $phototype->mdlname }}</td>
                                        <td>{{ $phototype->maxSize }}</td>
                                        <td>{{ $phototype->extensions }}</td>
                                        <td>{{ $phototype->required }}</td>
                                        {{--@if($user->can('edit_Phototypes'))--}}
                                        <td>

                                            {!! link_to_route('phototypes.edit', 'Edit', array($phototype->id), array('class' => 'btn btn-info')) !!}

                                        </td>
                                        {{--@endif  --}}
                                        {{--@if($user->can('destroy_Phototypes'))--}}
                                        <td>
                                            {!! Form::open(array('method' => 'DELETE', 'route' => array('phototypes.destroy', $phototype->id))) !!}
                                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                                            {!! Form::close() !!}
                                        </td>
                                        {{--@endif--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
