<script src="/js/jquery.js"></script>
<script type="text/javascript">

    $("document").ready(function(){
        // alert('llll');
     /*   var var_id = "<?php echo $phototype->name;?>";



        $("#postimg_"+var_id+"").change(function() {
            //    alert('llll');

            var fileName = $(this).val().replace('C:\\fakepath\\', '');

            var iSize = ($("#postimg_"+var_id+"")[0].files[0].size );

            if(iSize>1000000) //do something if file size more than 1 mb (1048576)
            {
                /// alert(iSize +" bites\nToo big!");
                $(this).val('');
                /////$("#img_err_label_s_"+var_id+"").html( iSize + "bites\nToo big!");
                $('#img_err_label_'+var_id+'').html("Only '.jpeg','.jpg' formats and lower to 1MG size are allowed..");
                ///  $('#img_err_label_'+var_id+'').html("");

                $("#file_upload_filename_"+var_id+"").html("<?php echo trans('main.no file selected'); ?>");

            }else{
                // alert(iSize +" bites\nYou are good to go!");
                ///////// $("#img_err_label_s_"+var_id+"").html("");
                $('#img_err_label_'+var_id+'').html("");

                /////var fileName = $(this).val().replace('C:\\fakepath\\', '');
                $("#file_upload_filename_"+var_id+"").html(fileName);
            }


            var val = $(this).val();
            // var t = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
            // alert(t);
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'jpeg': case 'jpg':  case 'png':
                //alert("an image");
                $('#img_err_label_'+var_id+'').html("");
                $("#file_upload_filename_"+var_id+"").html(fileName);
                break;
                default:
                    $(this).val('');
                    // error message here
                    //  alert("not an image");
                    $('#img_err_label_'+var_id+'').html("Only '.jpeg','.jpg' formats and lower to 1MG size are allowed.");
                    ///  $("#img_err_label_s_"+var_id+"").html("");
                    $("#file_upload_filename_"+var_id+"").html("<?php echo trans('main.no file selected'); ?>");
                    break;
            }
        });*/

    });
</script>



<div class="col-xs-6">
    <div class="image-box col-xs-12">
        <h4>{{str_replace("_"," ", $phototype->name)}}
            <small>
                @if($phototype->width && $phototype->height)
                    {{$phototype->width}}x{{$phototype->height}}(px)
                @endif
                @if($phototype->multi) Multiple @endif</small>
        </h4>

        @if(isset($pictures))

            @foreach($pictures->get() as $pic)


                <div class="img-model">

                    <!-- Modal -->
                    <div class="modal fade" id="myModal_img{{$pic->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel"></h4>
                                </div>
                                <div class="modal-body">
                                    <img src="/{{$pic->link}}" class="img-polaroid" style="width:100% !important"/>
                                </div>

                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <h5>{{$pic->caption}}</h5>
                    <img src="/{{ $pic->link }}" class="img-polaroid" style="max-width:150px;max-height:150px;"/>

                    <div class="img-control">
                        <a class="img btn btn-link imgzoom" data-toggle="modal" data-target="#myModal_img{{$pic->id}}"
                           style="margin:0px; padding:0px;"><i class="glyphicon glyphicon-zoom-in"></i></a>
                        <a href="./photos/{{$pic->id}}"><i class="glyphicon glyphicon-remove" ></i></a>
                        @if(!$pic->isCover() && $phototype->multi)

                            <a href="#" ><i class="glyphicon glyphicon-book" title="Set as Cover"></i></a>

                        @endif
                    </div>


                </div>
            @endforeach

        @endif
        <br class="clear"/>

<br/>
        <div id="imgsins">
            <?php
            $attributes = array();

            if ($phototype->required && count($pictures) == 0) {

                $attributes = array("required" => "required", "class" => "form-control");
            }
            ?>
            @if($phototype->multi==0)

                <label class="fileContainer">
                    Choose File
                    {!! Form::file(str_replace(" ","_", $phototype->name),$attributes+=array('id'=>$phototype->name)) !!}
                    {!! Form::text(str_replace(" ","_", $phototype->name).'_caption')!!}

                </label>
            @else
                <label class="fileContainer">
                    Choose File
                    {!! Form::file(str_replace(" ","_", $phototype->name).'[]',$attributes+=array('id'=>$phototype->name,"multiple"=>"true")) !!}

                    <div id="f_caption"> {!! Form::text(str_replace(" ","_", $phototype->name).'_caption[]') !!}</div>

                </label>

            @endif
        </div>
    </div>
</div>


