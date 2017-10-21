<section class="panel" id="acquiredFeatures">
    <div class="panel-heading">
         <span class="pull-right">
             {{link_to_route(str_plural(kebab_case(class_basename($model))).'.createNested','Add New',[$model->id, 'acquiredFeatures'],['class'=>'btn btn-success'])}}
        </span>
        <h3>{{title_case(str_replace('_',' ',snake_case('acquiredFeatures')))}}</h3>

    </div>
    <div class="panel-body">
        @php
            $details = $model->acquiredFeatures;
        @endphp
        @if($details)
        <table class="table table-sortable">
            <tr>
                <th>#</th>
                <th>Name in Arabic</th>
                <th>Name in English</th>
            </tr>
            @foreach ($details as $key => $detail)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{json_decode($detail->feature->name)->nameAr}}</td>
                    <td>{{json_decode($detail->feature->name)->nameEn}}</td>
                    <td>
                        {!! Form::open(['url' => "/acquired-features/{$detail['id']}", 'method' => 'DELETE']) !!}
                            <button type="submit" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        @endif
    </div>
</section>
