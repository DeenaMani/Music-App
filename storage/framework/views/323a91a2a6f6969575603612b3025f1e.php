<aside class="side-navbar">
    <div class="scroll-content" id="metismenu" data-scrollbar="true" tabindex="-1"
        style="overflow: hidden; outline: none;">
        <div class="scroll-content">
            <ul id="side-menu" class="metismenu list-unstyled">
                <?php echo $__env->make('admin.layouts.sidebar.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.layouts.sidebar.pages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if(Auth::user()->email == 'horizontamil@gmail.com'): ?>
                <?php echo $__env->make('admin.layouts.sidebar.settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
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
</aside><?php /**PATH D:\xampp\htdocs\horizontamil\projects\webapp\resources\views/admin/layouts/sidebar/sidebar.blade.php ENDPATH**/ ?>