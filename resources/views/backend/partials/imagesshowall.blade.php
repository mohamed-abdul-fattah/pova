@foreach($model->phototypes() as $phototype)
   <div class="panel">
      <div class="panel-heading"><h3>{{$phototype->name}}</h3>
          {{--@if(Auth::user()->supercan('edit_'.str_plural($model)))--}}
              <button class=" btn btn-info addfilebtn" style="float: right;  top: -34px; position: relative;">Add</button>
          {{--@endif--}}
      </div>
    <div class="panel-body">
        <div class="addfiles" style="display:none;">
            <h4>Add Photos</h4>

            {!! Form::open(["route"=>[str_plural(strtolower(class_basename($model))).".photos",$model->id],"files"=>"true"]) !!}
            @if($phototype->multi==0)

                {!! Form::file(str_replace(" ","_", $phototype->name),array('id'=>$phototype->name)) !!}<br/>
                {!! Form::text(str_replace(" ","_", $phototype->name).'_caption')!!}

            @else
                {!! Form::file(str_replace(" ","_", $phototype->name).'[]',array('id'=>$phototype->name,"multiple"=>"true")) !!}<br/>
                <div id="f_caption"> {!! Form::text(str_replace(" ","_", $phototype->name).'_caption[]') !!}</div>

            @endif
            <button class="btn btn-success">Submit</button>
            {!! Form::close() !!}
        </div>
    @include("backend.partials.imagesshow",array("pictures"=>$model->photos($phototype->id),"phototype"=>$phototype))
    </div>
   </div>
@endforeach