<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->

        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning">{{Auth::user()->unreadNotifications->count()}}</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <div class="notify-arrow notify-arrow-yellow"></div>
                <li>
                    <p class="yellow">You have {{Auth::user()->unreadNotifications->count()}} new notifications</p>
                </li>
                @foreach(Auth::user()->unreadNotifications as $notification)
                <li>
                    <a href="{{isset($notification->data['url'])?$notification->data['url']:"#"}}">
                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                       {{str_limit($notification->data['msg'],16)}}
                        <span class="small italic">{{$notification->created_at->diffForHumans()}}</span>
                    </a>
                </li>
                @endforeach

                <li>
                    <a href="/notifications">See all notifications</a>
                </li>
            </ul>
        </li>
        <!-- notification dropdown end -->
    </ul>
</div>