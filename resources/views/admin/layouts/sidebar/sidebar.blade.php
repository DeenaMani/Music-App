<aside class="side-navbar">
    <div class="scroll-content" id="metismenu" data-scrollbar="true" tabindex="-1"
        style="overflow: hidden; outline: none;">
        <div class="scroll-content">
            <ul id="side-menu" class="metismenu list-unstyled">
                @include('admin.layouts.sidebar.menu')
                @include('admin.layouts.sidebar.pages')
                @if(Auth::user()->email == 'horizontamil@gmail.com')
                @include('admin.layouts.sidebar.settings')
                @endif
            </ul>
        </div>
        <div class="scrollbar-track scrollbar-track-x" style="display: none;">
            <div class="scrollbar-thumb scrollbar-thumb-x" style="width: 250px; transform: translate3d(0px, 0px, 0px);">
            </div>
        </div>
        <div class="scrollbar-track scrollbar-track-y" style="display: block;">
            <div class="scrollbar-thumb scrollbar-thumb-y"
                style="height: 91.2008px; transform: translate3d(0px, 0px, 0px);"></div>
        </div>
    </div>
</aside>