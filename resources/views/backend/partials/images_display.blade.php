   <div class="col-xs-6">
        <div class="image-box col-xs-12">
 <h4>{{$phototype->name}} <small>@if($phototype->width && $phototype->height)
  {{$phototype->width}}x{{$phototype->height}}(px) @endif 
  @if($phototype->multi) Multiple @endif</small></h4>

@if(isset($pictures))


	@foreach($pictures as $pic)


		<div class="imginput col-xs-6">

		<!-- Modal -->
		<div class="modal fade" id="myModal_img{{$pic->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">{{$phototype->name}}</h4>
		      </div>
		      <div class="modal-body">
		    <img src="/images/library/{{$phototype->mdlname}}/{{$phototype->name}}/{{$pic->link}}" class="img-polaroid" style="width:100% !important"/>
		      </div>
	
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->


		<a  class="img btn btn-link" data-toggle="modal" data-target="#myModal_img{{$pic->id}}" >
		<img src="/images/library/{{$phototype->mdlname}}/{{$phototype->name}}/{{$pic->link}}" class="img-polaroid" /></a>
		
		
		</div>
	@endforeach
	
@endif
<br class="clear"/>



</div>
</div>