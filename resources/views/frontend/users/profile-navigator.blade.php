<div class="col-md-3 mb-40">
    <div class="profile-header">
        <h4 class="text-white mt-0 pt-5"> {{$user->name}}</h4>
        <span>{{__('Member Since')}} {{date('M Y', strtotime($user->created_at))}}</span>
        <p>
            <img src="/hydrogen/backend/images/no_image.png" alt="">
        </p>
    </div>
    <ul class="profile-navigation">
        <li>
            <a href="#">
                <img src="/images/icons/icon-cart.png"
                @if (app()->getLocale() === 'ar')
                    class="mr-10 ml-5"
                @else
                    class="ml-10 mr-5"
                @endif
                alt="">
                {{__('My Bookings')}}
            </a>
        </li>
        <li>
            <a href="/profile">
                <img src="/images/icons/icon-user.png"
                @if (app()->getLocale() === 'ar')
                    class="mr-10 ml-5"
                @else
                    class="ml-10 mr-5"
                @endif
                alt="">
                {{__('My Profile')}}
            </a>
        </li>
        @if ($user->type === 'provider')
            <li>
                <a href="/resources">
                    <span
                    @if (app()->getLocale() === 'ar')
                        class="pe-7s-display2 mr-10 ml-5 resources"
                    @else
                        class="pe-7s-display2 ml-10 mr-5 resources"
                    @endif
                    ></span>
                    {{__('My Resources')}}
                </a>
            </li>
        @endif
        <li>
            <a href="#">
                <img src="/images/icons/icon-review.png"
                @if (app()->getLocale() === 'ar')
                    class="mr-10 ml-5"
                @else
                    class="ml-10 mr-5"
                @endif
                alt="">
                {{__('My Reviews')}}
            </a>
        </li>
        <li>
            <a href="/settings">
                <img src="/images/icons/icon-setting.png"
                @if (app()->getLocale() === 'ar')
                    class="mr-10 ml-5"
                @else
                    class="ml-10 mr-5"
                @endif
                alt="">
                {{__('Settings')}}
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                <img src="/images/icons/icon-back.png"
                @if (app()->getLocale() === 'ar')
                    class="mr-10 ml-5"
                @else
                    class="ml-10 mr-5"
                @endif
                alt="">
                {{__('Logout')}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </a>
        </li>
    </ul>
</div>
