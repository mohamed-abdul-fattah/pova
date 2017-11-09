@foreach($pictures->get() as $pic)

    <div class="col-lg-2">

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
                        <h3>{{$pic->caption}}</h3>
                        @if($pic->caption)
                            <h5>{{$pic->caption}}</h5>
                        @else
                            <div id="f_caption"> {!! Form::text(str_replace(" ","_", $pic->phototype->name).'_caption['.$pic->id.']') !!}</div>
                        @endif
                        <img src="/{{$pic->link}}" class="img-polaroid" style="width:100% !important"/>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <button class="img btn btn-link" data-toggle="modal" data-target="#myModal_img{{$pic->id}}"
                style="margin:0px; padding:0px;">
            {{--@if($pic->caption)--}}
                <h5>{{$pic->caption}}</h5>
           {{-- @else
                <div id="f_caption"> {!! Form::text(str_replace(" ","_", $pic->phototype->name).'_caption['.$pic->id.']') !!}</div>
            @endif--}}
            <img src="/{{$pic->link}}" alt="" class="img-thumbnail"
                 style="max-width:150px !important; max-height:150px !important"/>

        </button>


    </div>


@endforeach
