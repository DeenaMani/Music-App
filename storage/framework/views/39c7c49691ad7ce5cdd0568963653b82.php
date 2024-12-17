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
    <script src="<?php echo e(url('public/assets/libs/jquery-validation/js/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/libs/jquery-validation/js/additional-methods.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/js/app.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/js/app.js')); ?>"></script>
    <?php $__env->stopPush(); ?>

    <div class="page-title-box">
        <div class="container-fluid">
            <div class="page-title dflex-between-center">
                <h3 class="mb-1 font-weight-bold">Projects</h3>
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
                    <li class="breadcrumb-item active">Projects</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="page-content-wrapper mt--45">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <a href="jascript:void(0)" class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#addModal">
                                <i class="bx bx-plus bx-flashing mr-1"></i>Add Category
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <form class="float-sm-right mt-3 mt-sm-0">
                                <div class="search-box">
                                    <div class="position-relative">
                                        <form action="<?php echo e(route('music.category.index')); ?>" method="get">
                                            <input type="text" name="search" value="<?php echo e($data); ?>"
                                                placeholder="Search Category..." class="form-control form-control-sm">
                                            <i class="bx bx-search icon"></i>
                                        </form>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('admin.pages.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <img class="border-4 me-3 avatar" width="50px" height="50px"
                                    src="<?php echo e(url($category->image)); ?>" alt="">
                                <div class="media-body overflow-hidden">
                                    <h6 class="card-title mb-2 pr-4 text-truncate">
                                        <a href="#" class="text-dark"
                                            title="Option 2 App Design, Development and Maintenance">
                                            <?php echo e($category->name); ?></a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <h5 class="font-size-14 mb-0" data-toggle="tooltip" data-placement="top"
                                                title="" data-original-title="Song">
                                                <i class="bx bxs-music fs-sm text-secondary op-6 align-middle"></i>
                                                <span class="align-middle"><?php echo e($category->songs_count); ?></span>
                                            </h5>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <div class="col pl-2">
                                    <?php if($category->status == 1): ?>
                                    <span class="badge badge-success float-right">Active</span>
                                    <?php else: ?>
                                    <span class="badge badge-danger float-right">Inactive</span>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        <div class="dropdown edit-field-half-left">
                            <div class="btn-icon btn-icon-sm btn-icon-soft-primary dropdown-toggle mr-0 edit-field-icon"
                                data-toggle="dropdown">
                                <i class="mdi mdi-dots-vertical fs-sm"></i>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"
                                    onclick="funcEdit('<?php echo e(route('music.category.update',['category' => encrypt($category->id)])); ?>','<?php echo e($category->name); ?>','<?php echo e(url($category->image)); ?>',<?php echo e($category->status); ?>)">
                                    <i class="mdi mdi-pencil align-middle mr-1 text-primary"></i>
                                    <span>Edit</span>
                                </a>
                                <form
                                    action="<?php echo e(route('music.category.destroy',['category' => encrypt($category->id)])); ?>"
                                    method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this Category? This action cannot be undone.')"
                                        class="dropdown-item">
                                        <i class="mdi mdi-delete align-middle mr-1 text-danger"></i>
                                        <span>Delete</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="row">
                <div class="col-12">
                    <ul class="pagination flat-rounded-pagination justify-content-center mb-4">

                        <?php if($categories->onFirstPage()): ?>
                        <li class="page-item disabled">
                            <a href="javascript: void(0);" class="page-link waves-effect waves-light"
                                data-effect="wave">
                                <i class="bx bx-chevron-left"></i>
                            </a>
                        </li>
                        <?php else: ?>
                        <li class="page-item">
                            <a href="<?php echo e($categories->previousPageUrl()); ?>" class="page-link waves-effect waves-light"
                                data-effect="wave">
                                <i class="bx bx-chevron-left"></i>
                            </a>
                        </li>
                        <?php endif; ?>


                        <?php $__currentLoopData = $categories->getUrlRange(1, $categories->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="page-item <?php echo e($categories->currentPage() == $page ? 'active' : ''); ?>">
                            <a href="<?php echo e($url); ?>" class="page-link waves-effect waves-light" data-effect="wave"><?php echo e($page); ?></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <?php if($categories->hasMorePages()): ?>
                        <li class="page-item">
                            <a href="<?php echo e($categories->nextPageUrl()); ?>" class="page-link waves-effect waves-light"
                                data-effect="wave">
                                <i class="bx bx-chevron-right"></i>
                            </a>
                        </li>
                        <?php else: ?>
                        <li class="page-item disabled">
                            <a href="javascript: void(0);" class="page-link waves-effect waves-light"
                                data-effect="wave">
                                <i class="bx bx-chevron-right"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered">
            <form action="<?php echo e(route('music.category.store')); ?>" id="categoryAdd" name="categoryAdd" method="POST"
                class="modal-content" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-header border-bottom">
                    <h4 class="modal-title" id="myCenterModalLabel"><b>New Category</b></h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body my-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group floating-label enable-floating-label show-label">
                                <input id="categoryName" name="name" type="text" placeholder="Enter Category Name"
                                    class="form-control">
                                <label for="categoryName">Category Name <span class="text-danger">*</span></label>
                                <div class="validation-error d-none font-size-13">This field is required</div>
                            </div>
                            <div class="form-group floating-label enable-floating-label show-label mb-0">
                                <input id="categoryImage" name="image" type="file" placeholder="Select Image"
                                    class="form-control" accept="image/*">
                                <label for="categoryImage">Category Image <span class="text-danger"></span></label>
                                <div class="validation-error d-none font-size-13">This field is required</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="submit" class="btn btn-success">Save Category</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-dialog-centered">
            <form action="" id="categoryEdit" name="categoryAdd" method="POST" class="modal-content"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-header border-bottom">
                    <h4 class="modal-title" id="myCenterModalLabel"><b>New Category</b></h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body my-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group floating-label enable-floating-label show-label">
                                <input id="categoryName" name="name" type="text" placeholder="Enter Category Name"
                                    class="form-control">
                                <label for="categoryName">Category Name <span class="text-danger">*</span></label>
                                <div class="validation-error d-none font-size-13">This field is required</div>
                            </div>
                            <div class="form-group floating-label enable-floating-label show-label mb-0">
                                <input id="categoryImages" name="image" type="file" placeholder="Select Image"
                                    class="form-control" accept="image/*">
                                <label for="categoryImages">Category Image <span class="text-danger"></span></label>
                                <div class="validation-error d-none font-size-13">This field is required</div>
                            </div>
                            <img src="" id="categoryImage" alt="" class="my-2" height="50px">
                            <div class="form-group floating-label enable-floating-label show-label mb-0">
                                <select id="categoryStatus" name="status" type="select"
                                    class="form-select form-control">
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                                <label for="categoryStatus">Category Image <span class="text-danger"></span></label>
                                <div class="validation-error d-none font-size-13">This field is required</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="submit" class="btn btn-success">Save Category</button>
                </div>
            </form>
        </div>
    </div>
    <?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            $('#categoryAdd').validate({
                focusInvalid: false,
                rules: {
                    name: {
                        required: true,
                        maxlength: 60
                    },
                    image: {
                        extension: "jpg|jpeg|png",
                        filesize: 500000
                    }
                },
                messages: {
                    name: {
                        required: "Category name is required.",
                        maxlength: "Category name must not exceed 60 characters."
                    },
                    image: {
                        extension: "Please upload a file in these formats only (jpg, jpeg, png).",
                        filesize: "File size must not exceed 500KB."
                    }
                },
                errorPlacement: function(error, element) {
                    var message = error.text() || "This field is invalid.";
                    $(element).siblings(".validation-error").text(message).removeClass("d-none");
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass("invalid-field");
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass("invalid-field");
                    $(element).siblings(".validation-error").addClass("d-none").empty();
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
            
            $.validator.addMethod("filesize", function(value, element, param) {
                var file = element.files[0];
                if (file) {
                    return file.size <= param;
                }
                return true;
            }, "File size must not exceed 500KB.");
        });

        function funcEdit(url,name,image,status)
            {
                $('#editModal form').attr('action', url);
                $('#editModal #categoryName').val(name);
                $('#editModal #categoryImage').attr('src',image);
                $('#editModal #categoryStatus').val(status);
                $('#editModal').modal('show');
            }
    </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22e3871cf6e38c18158ec487bc4d1150)): ?>
<?php $attributes = $__attributesOriginal22e3871cf6e38c18158ec487bc4d1150; ?>
<?php unset($__attributesOriginal22e3871cf6e38c18158ec487bc4d1150); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22e3871cf6e38c18158ec487bc4d1150)): ?>
<?php $component = $__componentOriginal22e3871cf6e38c18158ec487bc4d1150; ?>
<?php unset($__componentOriginal22e3871cf6e38c18158ec487bc4d1150); ?>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\horizontamil\projects\webapp\resources\views/admin/pages/music/category/index.blade.php ENDPATH**/ ?>