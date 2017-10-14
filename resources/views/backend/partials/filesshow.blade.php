<div class="panel">
    <div class="panel-heading"><h3>{{$filetype->name}} <small>
                @if($filetype->width && $filetype->height)
                    {{$filetype->width}}x{{$filetype->height}}(px)
                @endif
                @if($filetype->multi)
                    Multiple
                @endif</small></h3>

        @if(Auth::user()->superCan('edit_'.str_plural($model)))
    <button class=" btn btn-info addfilebtn" style="float: right;  top: -34px; position: relative;">Add</button>
            @endif

    </div>
    <div class="panel-body">
<div class="addfiles" style="display:none; border:1px dashed darkgrey;">
    <h4>Add Files</h4>
    {!! Form::open(["route"=>[str_plural(strtolower(class_basename($model))).".files",$model->id],'files'=>'true']) !!}
    @if($filetype->multi==0)

        {!! Form::file(str_replace(" ","_", $filetype->name),array('id'=>$filetype->name)) !!}<br/>
        {!! Form::text(str_replace(" ","_", $filetype->name).'_caption',null,["class"=>"form-control"])!!}

    @else
        {!! Form::file(str_replace(" ","_", $filetype->name).'[]',array('id'=>$filetype->name,"multiple"=>"true")) !!}<br/>
        <div id="f_caption" class="col-lg-2"> {!! Form::text(str_replace(" ","_", $filetype->name).'_caption[]',null,["class"=>"form-control"]) !!}</div>

    @endif
    <button class="btn btn-success">Submit</button>
    {!! Form::close() !!}
</div>
        <div class="image-box col-lg-12">

@if(isset($files))


	@foreach($files->get() as $file)

		<div class="imginput col-lg-6">
            <p>
                <h5>{{substr(array_last(explode("/",$file->link)),15)}}</h5>
            {{--@if($file->caption)--}}
            <h5>{{$file->caption}}</h5>
         {{--   @else
                <div id="f_caption" class="col-lg-4">
                    {!! Form::text(str_replace(" ","_", $file->filetype->name).'_caption['.$file->id.']',
                        null,["class"=>"form-control"]) !!}
                </div>
                @endif--}}
                <a href="/{{$file->link}}">Download</a>
            </p>
		</div>
	@endforeach
	
@endif
<br class="clear"/>



</div>
</div>
</div>
