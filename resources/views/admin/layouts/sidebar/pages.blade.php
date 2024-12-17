<li class="side-nav-title side-nav-item menu-title">Pages</li>
<li class="{{ route_active('music.*') }}">
    <a href="javascript:void(0);" class="side-nav-link" aria-expanded="false">
        <i class="bx bx-file"></i>
        <span> Music</span>
        <span class="menu-arrow"></span>
    </a>
    <ul aria-expanded="false" class="nav-second-level mm-collapse">
        <li>
            <a href="{{ route_true('music.song.index') == true ? " javascript:void(0);" : route('music.song.index')}}"
                class="side-nav-link {{ active_route('music.song.*') }}"> Song </a>
        </li>
        <li class="side-nav-item">
            <a href="{{ route_true('music.category.index') == true ? " javascript:void(0);" :
                route('music.category.index')}}" class="side-nav-link {{ active_route('music.category.*') }}"> Category
            </a>
        </li>
        <li class="side-nav-item">
            <a href="{{ route_true('music.singer.index') == true ? " javascript:void(0);" :
                route('music.singer.index')}}"
                class="side-nav-link {{ active_route('music.singer.*') }}"><span>Singer<span>
            </a>
        </li>
    </ul>
</li>