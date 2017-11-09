
   <div class="col-lg-6" >
        <div class="image-box col-lg-12">
 <h4>{{$filetype->name}} <small>
  @if($filetype->width && $filetype->height)
    {{$filetype->width}}x{{$filetype->height}}(px) 
  @endif 
  @if($filetype->multi) Multiple @endif</small></h4>

@if(isset($files))

	@foreach($files->get() as $file)


		<div class="imginput col-lg-6 ">

         <p>
             <h5>{{$file->id}}</h5>
            <h5>{{$file->caption}}</h5>
             <a href="/{{$file->link}}">Download</a>
            <a  href={{url('uploadedfiles/delete', $file->id )}} ><i class="glyphicon glyphicon-remove" ></i></a>
         </p>

		</div>
		
	@endforeach
	
@endif
<br class="clear"/>

<div id="imgsins">
<?php 
$attributes=array();

if($filetype->required && count($files)==0){

	$attributes=array("required"=>"required");
}
?>
@if($filetype->multi==0)

{!! Form::file(str_replace(" ","_", $filetype->name),$attributes+=array('id'=>$filetype->name)) !!}<br/>
        {!! Form::text(str_replace(" ","_", $filetype->name).'_caption')!!}

    @else
{!! Form::file(str_replace(" ","_", $filetype->name).'[]',$attributes+=array('id'=>$filetype->name,"multiple"=>"true")) !!}<br/>
 <div id="f_caption"> {!! Form::text(str_replace(" ","_", $filetype->name).'_caption[]') !!}</div>

    @endif
</div>
</div>
</div>
