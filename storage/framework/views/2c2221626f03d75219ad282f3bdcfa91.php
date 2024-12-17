<?php if (isset($component)) { $__componentOriginal22e3871cf6e38c18158ec487bc4d1150 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22e3871cf6e38c18158ec487bc4d1150 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Defaults::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.defaults'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Admin\Defaults::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('public/assets/css/icons.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(url('public/assets/libs/wave-effect/css/waves.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(url('public/assets/libs/owl-carousel/css/owl.carousel.min.css')); ?>" />
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('script'); ?>
    
    <script src="<?php echo e(url('public/assets/js/utils/colors.js')); ?>"></script>
    
    <script src="<?php echo e(url('public/assets/js/app.js')); ?>"></script>
    <?php $__env->stopPush(); ?>


    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-5 col-xl-6">
                    <div class="page-title">
                        <h3 class="mb-1 font-weight-bold">Sivathuli</h3>
                        <ol class="breadcrumb mb-3 mb-md-0">
                            <li class="breadcrumb-item active">Welcome to Admin Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content-wrapper mt--45">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">total
                                        songs</span>
                                    <?php
                                    $song = App\Models\Music\Song::count();
                                    ?>
                                    <h2 class="mb-0 mt-1"><?php echo e($song); ?></h2>
                                </div>
                                <div class="text-center">
                                    <div id="t-rev"></div>
                                    <span class="text-success font-weight-bold font-size-13">
                                        <i class="bx bx-up-arrow-alt"></i> 10.21%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <?php
                                    $singer = App\Models\Music\Singer::count();
                                    ?>
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total
                                        Singers</span>
                                    <h2 class="mb-0 mt-1"><?php echo e($singer); ?></h2>
                                </div>
                                <div class="text-center">
                                    <div id="t-order"></div>
                                    <span class="text-danger font-weight-bold font-size-13">
                                        <i class="bx bx-down-arrow-alt"></i> 5.05%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <?php
                                    $category = App\Models\Music\Category::count();
                                    ?>
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">total
                                        category</span>
                                    <h2 class="mb-0 mt-1"><?php echo e($category); ?></h2>
                                </div>
                                <div class="text-center">
                                    <div id="t-user"></div>
                                    <span class="text-success font-weight-bold font-size-13">
                                        <i class="bx bx-up-arrow-alt"></i> 25.21%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <?php
                                    $user = App\Models\User::whereNot('email','horizontamil@gmail.com')->count();
                                    ?>
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">total
                                        users</span>
                                    <h2 class="mb-0 mt-1"><?php echo e($user); ?></h2>
                                </div>
                                <div class="text-center">
                                    <div id="t-visitor"></div>
                                    <span class="text-danger font-weight-bold font-size-13">
                                        <i class="bx bx-down-arrow-alt"></i> 5.16%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22e3871cf6e38c18158ec487bc4d1150)): ?>
<?php $attributes = $__attributesOriginal22e3871cf6e38c18158ec487bc4d1150; ?>
<?php unset($__attributesOriginal22e3871cf6e38c18158ec487bc4d1150); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22e3871cf6e38c18158ec487bc4d1150)): ?>
<?php $component = $__componentOriginal22e3871cf6e38c18158ec487bc4d1150; ?>
<?php unset($__componentOriginal22e3871cf6e38c18158ec487bc4d1150); ?>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\horizontamil\projects\webapp\resources\views/admin/pages/dashboard.blade.php ENDPATH**/ ?>