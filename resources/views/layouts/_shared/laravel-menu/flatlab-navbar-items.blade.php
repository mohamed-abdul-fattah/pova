@foreach($items as $item)
    @if(Auth::user()->superCan('index_'.$item->route))
    <li @lm-attrs($item) @if($item->hasChildren())class ="dropdown {{BaklySystems\Hydrogen\Models\Hydrogen::childLiClass()}}"@endif  @lm-endattrs>
    @if($item->link)
        <a @lm-attrs($item->link) @if($item->hasChildren()) class="dropdown-toggle" data-toggle="dropdown" @endif @lm-endattrs href="{!! $item->url() !!}">
         <i class="menu-icon fa {{$item->icon}}"></i>
         {!! $item->title !!}
        @if($item->hasChildren() )
          {!! BaklySystems\Hydrogen\Models\Hydrogen::subMenuIcon() !!}
         @endif
         </a>

    @else
        {!! $item->title !!}
    @endif

    @if($item->hasChildren())
        <ul class="submenu {{ BaklySystems\Hydrogen\Models\Hydrogen::parentUlClass() }}">
            @include(config('laravel-menu.views.bootstrap-items'),
             array('items' => $item->children()))
        </ul>
        @endif
        </li>
        @if($item->divider)
            <li{!! Lavary\Menu\Builder::attributes($item->divider) !!}></li>
        @endif
    @endif
        @endforeach
