@php
    $methods = $model->detailsMethods;
@endphp

@foreach($methods as $details)
    @if(view()->exists('backend.'.$details.'.details'))
        @include('backend.'.$details.'.details')
    @else
    <section class="panel" id="{{$details}}">
        <div class="panel-heading">
             <span class="pull-right">
                 @if( Route::has(strtolower($details).'.create') && Auth::user()->supercan('create_'.str_singular($details)) )
                     {{link_to_route(str_plural(strtolower(class_basename($model))).'.createNested','Add New',[$model->id,$details],['class'=>'btn btn-success'])}}
                 @endif
            </span>
            <h3>{{title_case(str_replace('_',' ',snake_case($details)))}}</h3>

        </div>
        <div class="panel-body">
            @php
                if (!is_array($model->$details())) {
                    $mDetails=$model->$details->toArray();
                } else {
                    $mDetails=$model->$details();
                }
            @endphp
            @if($mDetails)
            <table class="table table-sortable">
                <tr>
                    @foreach(array_keys($mDetails[0]) as $key)
                        @php
                            if (ends_with($key,'able_id') ||
                                ends_with($key,'able_type') ||
                                ends_with($key,'_id') ||
                                ends_with($key,'_at') ||
                                ends_with($key,'To') ||
                                $key=='pivot') {
                                continue;
                            }
                        @endphp
                        <th>{{$key}}</th>
                    @endforeach
                </tr>
               @foreach($mDetails as $detail)
                <tr>
                    @foreach ($detail as $v => $row)
                        @php
                            if (ends_with($v,'_at')) {
                                 $row=date('d-m-Y',strtotime($row));
                            }
                            if (ends_with($v,'able_id') || ends_with($v,'able_type') || ends_with($v,'_id') || $v=='pivot') {
                                continue;
                            }
                        @endphp
                        @if($v=='name'&& Route::has($details.'.show'))
                            <td> {{link_to_route($details.'.show',$row,[$detail['id']])}} </td>
                        @else
                            <td>{{$row}}</td>
                        @endif
                    @endforeach
                </tr>
                @endforeach
            </table>
            @endif
        </div>
    </section>

@endif

@endforeach
