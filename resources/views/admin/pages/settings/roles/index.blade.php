<x-admin.defaults>
    @push('css')
    <link rel="stylesheet" href="{{ url('public/assets/css/icons.css') }}" />
    <link href="{{ url('public/assets/libs/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ url('public/assets/libs/datatables/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ url('public/assets/libs/datatables/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
    <style>
        .text-truncate {
            -webkit-line-clamp: 2;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden !important;
            white-space: normal !important;
        }
    </style>
    @endpush

    @push('script')
    <script src="{{ url('public/assets/libs/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('public/assets/js/app.js') }}"></script>
    <script src="{{ url('public/assets/libs/jquery-validation/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/jquery-validation/js/additional-methods.min.js') }}"></script>
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
    @endpush

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
                        <a href="{{ url('/') }}">
                            Dashboard
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
                                    <h5 class="card-title">Roles Management</h5>
                                </div>
                                <div class="col-sm-4" style="text-align: end;">
                                    <button class="btn btn-outline-primary" type="button" data-toggle="modal"
                                        data-target="#roleModal">
                                        <i class="bx bx-plus bx-flashing mr-1"></i>Add Role
                                    </button>
                                </div>
                            </div>
                            @include('admin.pages.message')
                            <div class="card-body">
                                <table id="datatable-buttons"
                                    class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                    role="grid" aria-describedby="datatable-buttons_info" style="width: 1184px;">
                                    <thead>
                                        <tr>
                                            <th>Actions</th>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $role)
                                        <tr>
                                            <td tabindex="0" class="sorting_1 d-flex align-items-center">
                                                <button
                                                    class="btn avatar avatar-xs bg-soft-info text-info waves-effect waves-light edit-role"
                                                    data-id="{{ $role->id }}" data-name="{{ $role->name }}"
                                                    data-url="{{ route('role.update',[$role->id]) }}"
                                                    data-status="{{ $role->status }}">
                                                    <i class="mdi mdi-pencil align-middle text-primary"></i>
                                                </button>

                                                <form
                                                    action="{{ route('role.destroy', ['role' => encrypt($role->id)]) }}"
                                                    method="post" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="avatar avatar-xs btn bg-soft-danger text-danger waves-effect waves-light"
                                                        onclick="return confirm('Are you sure you want to delete this role? This action cannot be undone.')">
                                                        <i class="mdi mdi-delete align-middle text-danger"></i>
                                                    </button>
                                                </form>
                                                @if($role->status == 1)
                                                <button
                                                    class="btn avatar avatar-xs bg-soft-success text-success waves-effect waves-light">
                                                    <i class="mdi mdi-check-circle text-success"></i>
                                                </button>
                                                @else
                                                <button
                                                    class="btn avatar avatar-xs bg-soft-danger text-danger waves-effect waves-light">
                                                    <i class="mdi mdi-close-circle text-danger"></i>
                                                </button>
                                                @endif
                                            </td>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ ucfirst($role->users_count) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="roleForm" action="{{ route('role.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="modal-header">
                        <h5 class="modal-title" id="roleModalLabel">Add Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="roleId">
                        <div class="form-group">
                            <label for="roleName">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Role" id="roleName" name="name"
                                required>
                            <div class="validation-error text-danger"></div>
                        </div>
                        <div class="form-group">
                            <label for="roleStatus">Status <span class="text-danger">*</span></label>
                            <select class="form-control" id="roleStatus" name="status" required>
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                            <div class="validation-error text-danger"></div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between border-top">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @push('scripts')
    <script>
        $(document).ready(function() {
            $(document).ready(function () {
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
                            $(formId + ' .validation-error').empty();
                        },
                        success: function (response) {
                            if (response.success) {
                                $(modalId).modal('hide');
                                window.location.reload();
                            }
                        },
                        error: function (xhr) {
                            if (xhr.status === 422) {
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

            handleAjaxForm('#roleForm', '#roleModal');
            // handleAjaxForm('#editUserForm', '#editUserModal');

        });

            // Edit Role
            $('.edit-role').on('click', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let status = $(this).data('status');
                let url = $(this).data('url');

                $('#roleId').val(id);
                $('#roleName').val(name);
                $('#roleStatus').val(status);
                $('#roleModalLabel').text('Edit Role');
                $('#roleModal').modal('show');
                $('#roleForm').attr('action', url);
                $('input[name=_method]').val("PUT");
            });

            // Delete Role
            $('.delete-role').on('click', function() {
                let id = $(this).data('id');
                if (confirm('Are you sure you want to delete this role?')) {
                    $.ajax({
                        url: `/roles/${id}`,
                        method: 'DELETE',
                        success: function(response) {
                            alert(response.message);
                            window.location.reload();
                        },
                        error: function(xhr) {
                            console.error(xhr.responseJSON.message);
                        }
                    });
                }
            });
        });
    </script>
    @endpush

</x-admin.defaults>