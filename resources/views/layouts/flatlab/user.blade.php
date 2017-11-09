<div class="top-nav ">
    <div class="nav top-menu col-xs-5 col-xs-offset-1 search-tayary">


            {!! Form::open(array('route' => 'home.searchingall' ,'role'=>'form','method'=>'get')) !!}
            {!! FORM::input('search', 'q', null,  array('placeholder'=>trans('main.search'),"class"=>"form-control") )!!}
            {!! Form::close() !!}



        </div>
    <ul class="nav pull-right top-menu">

        <li class="dropdown language">
            <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="/lang/{{(App::getLocale() ==  'en' ? 'en': 'ar')}}" aria-expanded="false">
                <img src="/hydrogen/backend/img/flags/{{(App::getLocale() ==  'us' ? 'us': 'ar')}}.png" alt="">
                <span class="username">{{(App::getLocale() ==  'en' ? trans('frontend.EN'): trans('frontend.AR'))}}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="/lang/{{(App::getLocale() ==  'en' ? 'ar': 'en')}}"><img src="/hydrogen/backend/img/flags/{{(App::getLocale() ==  'us' ? 'ar': 'us')}}.png" alt=""> {{(App::getLocale() ==  'en' ? trans('frontend.AR'): trans('frontend.EN'))}}</a></li>
            </ul>
        </li>
        @if(Auth::user()->hasRole(['Super Admin','Meeza Admin']))
        <li>
            <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                <span class="username">{{trans('frontend.setting')}}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                @if(Auth::user()->hasAnyRole(['Super Admin','Meeza Admin']))
                    @if(Auth::user()->SuperCan('use_roles'))
                        <li><a href="/roles"><i class="fa fa-bell-o"></i>{{ucfirst(trans("main.roles"))}}</a></li>
                    @endif
                    @if(Auth::user()->SuperCan('use_permissions'))
                        <li><a href="/permissions"><i class="fa fa-bell-o"></i>{{ucfirst(trans("main.permissions"))}}</a></li>
                    @endif
                    @if(Auth::user()->SuperCan('use_phototypes'))
                       <li><a href="/phototypes"><i class="fa fa-bell-o"></i>{{ucfirst(trans("main.phototypes"))}}</a></li>
                    @endif
                    @if(Auth::user()->SuperCan('use_filetypes'))
                       <li><a href="/filetypes"><i class="fa fa-bell-o"></i>{{ucfirst(trans("main.filetypes"))}}</a></li>
                    @endif
                @endif
            </ul>
        </li>
        @endif
        @impersonating
        <li><a href="{{ route('impersonate.leave') }}">Leave impersonation</a></li>
        @endImpersonating
        <li>
            {!! Form::open(array('route' => 'logout' ,'role'=>'form','method'=>'post')) !!}
            {!! FORM::input('submit', 'logout', 'logout',  array("class"=>"form-control input") )!!}
            {!! Form::close() !!}
        </li>

    </ul>
</div>
