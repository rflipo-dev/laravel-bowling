<ul class="sidebar-menu">
  @foreach ($nav as $group)
    <li class="header">{{ $group['group_name'] }}</li>
    @foreach ($group['children'] as $menu)
      @if (isset($menu['children']))
        <li class="treeview">
          <a href="#">
            <i class="fa {{ isset($menu['icon']) ? $menu['icon'] : 'fa-link' }}"></i>
            <span>{{ $menu['name'] }}</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            @foreach ($menu['children'] as $children)
              <li><a href="{{ $children['href'] }}"><span>{{ $children['name'] }}</span></a></li>
            @endforeach
          </ul>
        </li>
      @else
        <li>
          <a href="{{ $menu['href'] }}">
            <i class="fa {{ isset($menu['icon']) ? $menu['icon'] : 'fa-link' }}"></i> <span>{{ $menu['name'] }}</span>
          </a>
        </li>
      @endif
    @endforeach
  @endforeach
</ul>
