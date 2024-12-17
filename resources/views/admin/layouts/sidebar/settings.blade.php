<li class="side-nav-title side-nav-item menu-title">Settings</li>
<li class="">
    <a href="javascript:void(0);" class="side-nav-link">
        <i class="bx bx-cog bx-spin"></i>
        <span> Settings</span>
        <span class="menu-arrow"></span>
    </a>
    <ul aria-expanded="false" class="nav-second-level mm-collaps" style="">
        <li class="side-nav-item">
            <a class="side-nav-link" href="{{ route('settings.business.index') }}"> Business Settings</a>
        </li>
        <li class="side-nav-item">
            <a class="side-nav-link" href="javascript:void(0)"> General Settings </a>
        </li>
    </ul>
</li>
<li class="">
    <a class="side-nav-link {{ active_route('user.*') }}" href="{{ route('user.index') }}"><i
            class="bx bx-user-circle"></i> <span>Users List</span>
    </a>
</li>
<li class="">
    <a class="side-nav-link {{ active_route('role.*') }}" href="{{ route('role.index') }}"><i class="bx bx-tone"></i>
        <span>User Roles</span> </a>
</li>