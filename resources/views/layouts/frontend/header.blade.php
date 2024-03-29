@inject('categories', 'App\Category')

<div class="body-overlay"></div>
<div id="side-panel" class="bg-black-111">
  <div class="side-panel-wrap">
    <div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon_close font-30"></i></a></div>
    <a class="menuzord-brand pull-left flip font-playball text-white font-24 pt-30 pb-30" href="/">EGY <i class="fa fa-heart-o font-25"></i> POVA</a>
    <div class="side-panel-nav mt-30">
      <div class="widget no-border">
        <nav>
          <ul class="nav nav-list">
            <li><a href="/">{{__('Home')}}</a></li>
            <li><a href="#">Services</a></li>
            <li><a class="tree-toggler nav-header">Pages <i class="fa fa-angle-down"></i></a>
              <ul class="nav nav-list tree">
                <li><a href="#">About</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">FAQ</a></li>
              </ul>
            </li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="side-panel-widget mt-30">
      <div class="widget no-border">
        <ul>
          <li class="font-14 mb-5"> Phone: <a href="#" class="text-gray">123-456-789</a> </li>
          <li class="font-14 mb-5"> Email: <a href="#" class="text-gray">contact@yourdomain.com</a> </li>
        </ul>
      </div>
      <div class="widget">
        <ul class="social-icons sm-text-center">
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        </ul>
      </div>
      <p>Copyright &copy;2016 ThemeMascot</p>
    </div>
  </div>
</div>
<div id="wrapper" class="clearfix">
<!-- preloader -->
<div id="preloader">
    <div id="spinner">
      <div class="heart-preloader">
        <i class="fa fa-heart font-36 infinite animated pulse"></i>
      </div>
    </div>
</div>

<!-- Header -->
<header id="header" class="header">
  <div class="header-nav navbar-fixed-top header-dark navbar-white navbar-transparent transparent-dark navbar-sticky-animated animated-active">
    <div class="header-nav-wrapper">
      <div class="container">
        <div class="text-center"><a class="font-playball text-theme-colored font-32" href="/">EGY <i class="fa fa-heart-o font-25"></i> POVA</a>
        <nav>
            {{-- <div id="side-panel-trigger" class="side-panel-trigger"><a href="#"><i class="fa fa-bars font-24 text-gray-silver"></i></a></div> --}}
            <div id="menuzord" class="menuzord red menuzord-center">
                <ul class="menuzord-menu">
                  <li class="active"><a href="/">{{__('Home')}}</a></li>
                  @foreach ($categories->parentCategories() as $key => $category)
                      <li>
                          <a href="javascript:void(0)">
                              {{nameLocale($category, app()->getLocale())}}
                          </a>
                          @if (count($category->subCategories))
                              <ul class="dropdown">
                                  @foreach ($category->subCategories as $key => $subCategory)
                                      <li><a href="/listings/{{$subCategory->id}}">{{nameLocale($subCategory, app()->getLocale())}}</a></li>
                                  @endforeach
                              </ul>
                          @endif
                      </li>
                  @endforeach
                  @auth
                      <li>
                          <a href="/profile">{{auth()->user()->name}}</a>
                          <ul class="dropdown">
                              <li>
                                  <a href="/profile">
                                      <i class="fa fa-user" aria-hidden="true"></i>
                                      {{__('Profile')}}
                                  </a>
                              </li>
                              @if (auth()->user()->type === 'provider')
                                  <li>
                                      <a href="/resources">
                                          <span class="pe-7s-display2"></span>
                                          {{__('My Resources')}}
                                      </a>
                                  </li>
                              @endif
                              <li>
                                  <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        {{__('Logout')}}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li>
                  @endauth
                  @guest
                      <li><a href="/login">{{__('Login / Register')}}</a></li>
                      <li>
                          <a href="/provider-signup">{{__('Become a Provider')}}</a>
                      </li>
                  @endguest
                  <li>
                      @if (app()->getLocale() === 'ar')
                          <a href="/lang/en"><img src="/images/icons/en.png" alt="" class="flag-icon"></a>
                      @else
                          <a href="/lang/ar"><img src="/images/icons/ar.png" alt="" class="flag-icon"></a>
                      @endif
                  </li>
                </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>
