<section class="panel">
    {{--<header class="panel-heading">--}}
        {{--Chats--}}
                              {{--<span class="tools pull-right">--}}
                                {{--<a class="fa fa-chevron-down" href="javascript:;"></a>--}}
                                {{--<a class="fa fa-times" href="javascript:;"></a>--}}
                            {{--</span>--}}
    {{--</header>--}}
    <div class="panel-body">
        <div class="timeline-messages">
            <!-- Comment -->
            @foreach($commentable->comments as $comment)
            <div class="msg-time-chat">

                <a href="#" class="message-img"><img class="avatar" src="/hydrogen/backend/{{($comment->user?$comment->user->firstImageLink('ProfilePic'):'')}}" alt=""></a>
                <div class="message-body msg-in">
                    <span class="arrow"></span>
                    <div class="text">
                        <p class="attribution"><a href="#">{{($comment->user?$comment->user->name:'')}}</a> at
                            {{$comment->created_at->diffForHumans()}}
                        </p>
                        <p>{{$comment->body}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /comment -->


        </div>
        <form method="post" action="{{URL::current()}}/add-comments">
            {{csrf_field()}}
        <div class="chat-form">
            <div class="input-cont ">
                <input type="text" name="commentMsg" class="form-control col-lg-12" placeholder="Type Comment here...">
            </div>
            <div class="form-group">
                <div class="pull-right chat-features">
                    {{--<a href="javascript:;">--}}
                        {{--<i class="fa fa-camera"></i>--}}
                    {{--</a>--}}
                    {{--<a href="javascript:;">--}}
                        {{--<i class="fa fa-link"></i>--}}
                    {{--</a>--}}
                    <button class="btn btn-danger" >Send</button>
                </div>
            </div>

        </div>
        </form>
    </div>
</section>