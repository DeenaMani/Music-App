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
    <script src="<?php echo e(url('public/assets/libs/jquery-validation/js/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/assets/libs/jquery-validation/js/additional-methods.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#userForm').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 100
                    },
                    username: {
                        required: true,
                        maxlength: 50
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    mobile: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 15
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    profile_picture: {
                        extension: "jpg|jpeg|png",
                        filesize: 500000
                    }
                },
                messages: {
                    name: {
                        required: "Name is required.",
                        maxlength: "Name cannot exceed 100 characters."
                    },
                    username: {
                        required: "Username is required.",
                        maxlength: "Username cannot exceed 50 characters."
                    },
                    email: {
                        required: "Email is required.",
                        email: "Please enter a valid email address."
                    },
                    mobile: {
                        required: "Mobile number is required.",
                        digits: "Only digits are allowed.",
                        minlength: "Mobile number must be at least 10 digits.",
                        maxlength: "Mobile number cannot exceed 15 digits."
                    },
                    password: {
                        required: "Password is required.",
                        minlength: "Password must be at least 6 characters long."
                    },
                    profile_picture: {
                        extension: "Please upload a valid image (jpg, jpeg, png).",
                        filesize: "File size must not exceed 500kb."
                    }
                },
                errorPlacement: function(error, element) {
                    $(element).siblings(".validation-error").text(error.text()).removeClass("d-none");
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
            }, "File size is too large.");
        });
        $(document).ready(function() {
            $('#datatable-buttons').DataTable();
        });
    </script>
    <?php $__env->stopPush(); ?>

    <div class="page-title-box">
        <div class="container-fluid">
            <div class="page-title dflex-between-center">
                <h3 class="mb-1 font-weight-bold">Users</h3>
                <ol class="breadcrumb mb-0 mt-1">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <i class="bx bx-home fs-xs"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="settings.html">
                            Settings
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Users</li>
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
                                    <h5 class="card-title">Users List</h5>
                                </div>
                                <div class="col-sm-4" style="text-align: end;">
                                    <button class="btn btn-outline-primary" type="button" data-toggle="modal"
                                        data-target="#addUserModal">
                                        <i class="bx bx-plus bx-flashing mr-1"></i>Add User
                                    </button>
                                </div>
                            </div>
                            <?php echo $__env->make('admin.pages.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="card-body">
                                <table id="datatable-buttons"
                                    class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                    role="grid" aria-describedby="datatable-buttons_info" style="width: 1184px;">
                                    <thead>
                                        <tr role="row">
                                            <th>Action</th>
                                            <th class="sorting_asc">Name</th>
                                            <th class="sorting">Username</th>
                                            <th class="sorting">Email</th>
                                            <th class="sorting">Mobile</th>
                                            <th class="sorting">Profile Picture</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1 d-flex align-items-center">
                                                <button
                                                    class="btn avatar avatar-xs bg-soft-info text-info waves-effect waves-light"
                                                    onclick="funcEdit(<?php echo e(json_encode($user)); ?>)">
                                                    <i class="mdi mdi-pencil align-middle text-primary"></i>
                                                </button>
                                                <?php if($user->status == 1): ?>
                                                <button
                                                    class="btn avatar avatar-xs bg-soft-success text-success waves-effect waves-light">
                                                    <i class="mdi mdi-check-circle text-success"></i>
                                                </button>
                                                <?php else: ?>
                                                <button
                                                    class="btn avatar avatar-xs bg-soft-danger text-danger waves-effect waves-light">
                                                    <i class="mdi mdi-close-circle text-danger"></i>
                                                </button>
                                                <?php endif; ?>
                                                

                                                <?php if($user->two_factor_enabled == 1): ?>
                                                <button
                                                    class="btn avatar avatar-xs bg-soft-light text-danger waves-effect waves-light">
                                                    <i class="mdi mdi-lock text-success" title="2FA Enabled"></i>
                                                </button>
                                                <?php else: ?>
                                                <button
                                                    class="btn avatar avatar-xs bg-soft-light text-danger waves-effect waves-light">
                                                    <i class="mdi mdi-lock-open text-secondary"
                                                        title="2FA Disabled"></i>
                                                </button>
                                                <?php endif; ?>
                                            </td>

                                            <td><?php echo e($user->name ?? ''); ?></td>
                                            <td><?php echo e($user->username ?? ''); ?></td>
                                            <td><?php echo e($user->email ?? ''); ?></td>
                                            <td><?php echo e($user->mobile ?? ''); ?></td>
                                            <td>
                                                <img src="<?php echo e(url($user->profile_picture ?? 'public/assets/images/users/avatar-1.jpg')); ?>"
                                                    width="40px" height="40px"
                                                    style="border-radius: 8px; object-fit: cover;">
                                            </td>
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

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal">
        <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm" action="<?php echo e(route('user.store')); ?>" method="POST"
                        enctype="multipart/form-data" novalidate autocomplete="off">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="add_role">Role <span class="text-danger">*</span></label>
                                    <select class="form-control" id="add_role" name="role" required>
                                        <option value="" selected disabled>Select a role</option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="validation-error text-danger"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="add_name">Name <span class="text-danger">*</span></label>
                                    <input id="add_name" name="name" type="text" placeholder="Enter Name"
                                        class="form-control">
                                    <div class="validation-error text-danger"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="add_username">Username <span class="text-danger">*</span></label>
                                    <input id="add_username" name="username" type="text" placeholder="Enter Username"
                                        class="form-control">
                                    <div class="validation-error text-danger"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="add_email">Email <span class="text-danger">*</span></label>
                                    <input id="add_email" name="email" type="email" placeholder="Enter Email"
                                        class="form-control">
                                    <div class="validation-error text-danger"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="add_mobile">Mobile <span class="text-danger">*</span></label>
                                    <input id="add_mobile" name="mobile" type="text" placeholder="Enter Mobile Number"
                                        class="form-control">
                                    <div class="validation-error text-danger"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="add_password">Password <span class="text-danger">*</span></label>
                                    <input id="add_password" name="password" type="password"
                                        placeholder="Enter Password" class="form-control">
                                    <div class="validation-error text-danger"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="add_profile_picture">Profile Picture</label>
                                    <input type="file" id="add_profile_picture" name="profile_picture"
                                        class="form-control">
                                    <div class="validation-error text-danger"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="add_role">Status <span class="text-danger">*</span></label>
                                    <select class="form-control" id="add_role" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                    <div class="validation-error text-danger"></div>
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <button class="btn btn-primary" type="submit">Create User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal">
        <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" action="" method="POST" enctype="multipart/form-data" novalidate
                        autocomplete="off">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit_role">Role <span class="text-danger">*</span></label>
                                    <select class="form-control" id="edit_role" name="role" required>
                                        <option value="" selected disabled>Select a role</option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="validation-error text-danger"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit_name">Name <span class="text-danger">*</span></label>
                                    <input id="edit_name" name="name" type="text" placeholder="Enter Name"
                                        class="form-control">
                                    <div class="validation-error text-danger"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit_username">Username <span class="text-danger">*</span></label>
                                    <input id="edit_username" name="username" type="text" placeholder="Enter Username"
                                        class="form-control">
                                    <div class="validation-error text-danger"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit_email">Email <span class="text-danger">*</span></label>
                                    <input id="edit_email" name="email" type="email" placeholder="Enter Email"
                                        class="form-control">
                                    <div class="validation-error text-danger"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit_mobile">Mobile <span class="text-danger">*</span></label>
                                    <input id="edit_mobile" name="mobile" type="text" placeholder="Enter Mobile Number"
                                        class="form-control">
                                    <div class="validation-error text-danger"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit_profile_picture">Profile Picture</label>
                                    <input type="file" id="edit_profile_picture" name="profile_picture"
                                        class="form-control">
                                    <div class="validation-error text-danger"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit_status">Status</label>
                                    <select class="form-control" id="edit_status" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                    <div class="validation-error text-danger"></div>
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <button class="btn btn-primary" type="submit">Edit User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            // CSRF token setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function handleAjaxForm(formId, modalId) {
                $(formId).on('submit', function (e) {
                    e.preventDefault();
                    const form = $(this);
                    const formData = new FormData(form[0]);

                    $.ajax({
                        url: form.attr('action'),
                        method: form.attr('method'),
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function () {
                            // Clear validation errors
                            $(formId + ' .validation-error').empty();
                        },
                        success: function (response) {
                            if (response.success) {
                                // Close the modal and reload the page
                                $(modalId).modal('hide');
                                window.location.reload();
                            }
                        },
                        error: function (xhr) {
                            if (xhr.status === 422) {
                                // Display validation errors
                                const errors = xhr.responseJSON.errors;
                                for (const field in errors) {
                                    const errorField = $(formId).find(`[name="${field}"]`);
                                    errorField.siblings('.validation-error').text(errors[field][0]);
                                }
                            } else {
                                alert(xhr.responseJSON.message || 'An unexpected error occurred.');
                            }
                        }
                    });
                });
            }


            // Bind AJAX forms
            handleAjaxForm('#addUserForm', '#addUserModal');
            handleAjaxForm('#editUserForm', '#editUserModal');

        });

        
        function funcEdit(user) {
            // Set form action to update route with user ID
            const updateUrl = `<?php echo e(route('user.update', ':id')); ?>`.replace(':id', user.id);
            $('#editUserForm').attr('action', updateUrl);

            // Populate the form fields
            $('#editUserForm #edit_role').val(user.role);
            $('#editUserForm #edit_name').val(user.name);
            $('#editUserForm #edit_username').val(user.username);
            $('#editUserForm #edit_email').val(user.email);
            $('#editUserForm #edit_mobile').val(user.mobile);

            // Clear profile picture field (it's file input)
            $('#editUserForm #edit_profile_picture').val('');

            // Show the modal
            $('#editUserModal').modal('show');
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
<?php endif; ?><?php /**PATH D:\xampp\htdocs\horizontamil\projects\webapp\resources\views/admin/pages/settings/users/index.blade.php ENDPATH**/ ?>