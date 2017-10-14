<!-- #section:basics/navbar.user_menu -->
<li class="light-blue dropdown-modal">
    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
        <img class="nav-user-photo" src="/{{Auth::user()->firstImageLink(1)}}"  />
								<span class="user-info">
									<small>{{trans('main.Welcome')}},</small>
									@if(Auth::user())
                                        {{ Auth::user()->name }}
                                    @endif
								</span>

        <i class="ace-icon fa fa-caret-down"></i>
    </a>

    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
        <li>
            <a href="#">
                <i class="ace-icon fa fa-cog"></i>
                {{trans("main.settings")}}
            </a>
        </li>

        <li>
            <a href="{{ url('/users/'.Auth::user()->id) }}">
                <i class="ace-icon fa fa-user"></i>
                {{trans("main.Profile")}}
            </a>
        </li>

        <li class="divider"></li>

        <li>
            {!! Form::open(array('route' => 'logout' ,'role'=>'form','method'=>'post')) !!}
            <i class="ace-icon fa fa-power-off"></i>{!! FORM::input('submit', 'logout', 'logout',  array("class"=>"btn btn-link") )!!}
            {!! Form::close() !!}
        </li>
    </ul>
</li>

<!-- /section:basics/navbar.user_menu -->