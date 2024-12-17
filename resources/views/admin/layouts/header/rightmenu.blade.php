<div class="right-bar">
    <div class="d-inline-flex ml-0 ml-sm-2 d-lg-none dropdown">
        <button data-toggle="dropdown" aria-haspopup="true" type="button" id="page-header-search-dropdown"
            aria-expanded="false" class="btn header-item notify-icon">
            <i class="bx bx-search"></i>
        </button>
        <div aria-labelledby="page-header-search-dropdown"
            class="dropdown-menu-lg dropdown-menu-right p-0 dropdown-menu">
            <form class="p-3">
                <div class="search-box">
                    <div class="position-relative">
                        <input type="text" placeholder="Search..." class="form-control form-control-sm">
                        <i class="bx bx-search icon"></i>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="d-none d-lg-inline-flex ml-2">
        <button type="button" data-toggle="fullscreen" class="btn header-item notify-icon" id="full-screen">
            <i class="bx bx-fullscreen"></i>
        </button>
    </div>
    <div class="d-inline-flex ml-0 ml-sm-2 dropdown">
        <button data-toggle="dropdown" aria-haspopup="true" type="button" id="page-header-profile-dropdown"
            aria-expanded="false" class="btn header-item">
            <img src="{{ url( Auth::user()->profile_picture ?? 'public/assets/images/users/avatar-1.jpg') }}"
                alt="Header Avatar" class="avatar avatar-xs mr-0" style="object-fit: cover;">
            <span class="d-none d-xl-inline-block ml-1">{{ Auth::user()->name }}</span>
            <i class="bx bx-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div aria-labelledby="page-header-profile-dropdown" class="dropdown-menu-right dropdown-menu"
            x-placement="bottom-end"
            style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(114px, 70px, 0px);">
            <a href="{{ route('profile') }}" class="dropdown-item">
                <i class="bx bx-user mr-1"></i> Profile
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="text-danger dropdown-item">
                <i class="bx bx-log-in mr-1 text-danger"></i> Logout
            </a>
        </div>
    </div>
</div>