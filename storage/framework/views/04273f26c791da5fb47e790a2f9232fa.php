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
    <link href="<?php echo e(url('public/assets/libs/datatables/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(url('public/assets/libs/datatables/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(url('public/assets/libs/datatables/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" />
    <style>
        .text-truncate {
            -webkit-line-clamp: 2;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden !important;
            white-space: normal !important;
        }
    </style>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('script'); ?>
    <script src="<?php echo e(url('public/assets/libs/datatables/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/libs/datatables/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/libs/datatables/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/libs/datatables/js/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/js/app.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#datatable-buttons').DataTable();
        });
    </script>
    <?php $__env->stopPush(); ?>

    <div class="page-title-box">
        <div class="container-fluid">
            <div class="page-title dflex-between-center">
                <h3 class="mb-1 font-weight-bold">Songs</h3>
                <ol class="breadcrumb mb-0 mt-1">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <i class="bx bx-home fs-xs"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(url('/')); ?>">
                            Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Song</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="page-content-wrapper mt--45">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h5 class="card-title">Songs List</h5>
                                </div>
                                <div class="col-sm-4" style="text-align: end;">
                                    <a href="<?php echo e(route('music.song.create')); ?>" class="btn btn-outline-primary">
                                        <i class="bx bx-plus bx-flashing mr-1"></i>Add Song
                                    </a>
                                </div>
                            </div>
                            <?php echo $__env->make('admin.pages.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="card-body">
                                <table id="datatable-buttons"
                                    class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                    role="grid" aria-describedby="datatable-buttons_info" style="width: 1184px;">
                                    <thead>
                                        <tr role="row">
                                            <th>Acton</th>
                                            <th class="sorting_asc">Title</th>
                                            <th class="sorting">Image</th>
                                            <th class="sorting">Cover image</th>
                                            <th class="sorting">Category</th>
                                            <th class="sorting">Singer</th>
                                            <th class="sorting">Watch Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1 d-flex align-items-center">
                                                <a class="avatar avatar-xs bg-soft-info text-info waves-effect waves-light"
                                                    href="<?php echo e(route('music.song.edit',['song' => encrypt($song->song_id)])); ?>">
                                                    <i class="mdi mdi-pencil align-middle text-primary"></i>
                                                </a>
                                                <form
                                                    action="<?php echo e(route('music.song.destroy',['song' => encrypt($song->song_id)])); ?>"
                                                    method="post">
                                                    <input type="hidden" name="_token"
                                                        value="N0C3AxMotEyMX1V15Hq7vYsApHBf4cijfKMwjGvL"
                                                        autocomplete="off"> <input type="hidden" name="_method"
                                                        value="DELETE"> <a
                                                        class="avatar avatar-xs bg-soft-danger text-danger waves-effect waves-light"
                                                        type="submit"
                                                        onclick="return confirm('Are you sure you want to delete this Song? This action cannot be undone.')"
                                                        class="dropdown-item p-0">
                                                        <i class="mdi mdi-delete align-middle text-danger"></i>
                                                    </a>
                                                </form>
                                            </td>
                                            <td><?php echo e($song->title ?? ''); ?></td>
                                            <td><img src="<?php echo e(url($song->image) ?? ''); ?>" width="40px" height="40px"
                                                    style="border-radius: 8px;"></td>
                                            <td><img src="<?php echo e(url($song->cover_image) ?? ''); ?>" width="40px"
                                                    height="40px" style="border-radius: 8px;"></td>
                                            <td><?php echo e($song->category ?? ''); ?></td>
                                            <td><?php echo e($song->singer ?? ''); ?></td>
                                            <td><?php echo e($song->count ?? 0); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
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
<?php endif; ?><?php /**PATH D:\xampp\htdocs\horizontamil\projects\webapp\resources\views/admin/pages/music/song/index.blade.php ENDPATH**/ ?>