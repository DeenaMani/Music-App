<li class="side-nav-title side-nav-item menu-title">Menu</li>
<li>
    <a href="{{ route_true('dashboard') == true ? " javascript:void(0);" : route('dashboard')}}"
        class="side-nav-link {{ active_route('dashboard') }}">
        <i class="bx bx-home-circle"></i>
        <span> Dashboard</span>
    </a>
</li>