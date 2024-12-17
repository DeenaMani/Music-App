<x-admin.defaults>
    @push('css')
    <link rel="stylesheet" href="{{ url('public/assets/css/icons.css') }}" />
    <link href="{{ url('public/assets/libs/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ url('public/assets/libs/datatables/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ url('public/assets/libs/datatables/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
    @endpush

    @push('script')
    <script src="{{ url('public/assets/libs/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('public/assets/js/app.js') }}"></script>
    <script src="{{ url('public/assets/libs/jquery-validation/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/jquery-validation/js/additional-methods.min.js') }}"></script>
    @endpush
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="page-title dflex-between-center">
                <h3 class="mb-1 font-weight-bold">Profile</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html">
                            <i class="bx bx-home fs-xs"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="page-content-wrapper mt--45">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media mb-3">
                                <img src="{{ url( Auth::user()->profile_picture ?? 'public/assets/images/users/avatar-1.jpg') }}"
                                    alt="profile" class="avatar-lg rounded-circle mr-3" style="object-fit: cover;">
                                <div class="media-body">
                                    <h5 class="text-dark font-weight-600 mt-2">{{ $user->name }} <i
                                            class="bx bxs-badge-check fs-sm align-middle text-success"></i></h5>
                                    <h6 class="text-muted font-weight-600 mt-2 mb-3">{{ $user->role }}</h6>
                                </div>
                            </div>
                            <div class="mt-3 pt-2 border-top">
                                <h5 class="mb-3 pt-2 font-weight-600">Contact Information</h5>
                                <div class="table-responsive">
                                    <table class="table table-borderless text-muted mb-0 table-sm">
                                        <tbody>
                                            <tr>
                                                <th class="pl-0" scope="row">Email</th>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th class="pl-0" scope="row">Phone</th>
                                                <td>{{ $user->mobile }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills bg-light nav-justified" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link {{ ( old('current_password') || old('new_password') || old('confirm_password') ) ? '': 'active' }}"
                                        id="pills-activity-tab" data-toggle="pill" href="#pills-activity" role="tab"
                                        aria-controls="pills-activity" aria-selected="true">
                                        Profile
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ ( old('current_password') || old('new_password') || old('confirm_password') ) ? 'active': '' }}"
                                        id="pills-projects-tab" data-toggle="pill" href="#pills-projects" role="tab"
                                        aria-controls="pills-projects" aria-selected="false">
                                        Change Password
                                    </a>
                                </li>
                            </ul>
                            <div class="pt-3">
                                @include('admin.pages.message')
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade  {{ ( old('current_password') || old('new_password') || old('confirm_password') ) ? '': 'show active' }}"
                                        id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                                        <form id="addUserForm" action="{{ route('profile') }}" method="POST"
                                            enctype="multipart/form-data" novalidate autocomplete="off">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="add_name">Name <span
                                                                class="text-danger">*</span></label>
                                                        <input id="add_name" name="name" type="text"
                                                            placeholder="Enter Name" class="form-control"
                                                            value="{{ $user->name }}">
                                                        <div class="validation-error text-danger">@error('name'){{
                                                            $message }}@enderror</div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="add_email">Email <span
                                                                class="text-danger">*</span></label>
                                                        <input id="add_email" name="email" type="email"
                                                            placeholder="Enter Email" class="form-control"
                                                            value="{{ $user->email }}">
                                                        <div class="validation-error text-danger">@error('email'){{
                                                            $message }}@enderror</div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="add_mobile">Mobile <span
                                                                class="text-danger">*</span></label>
                                                        <input id="add_mobile" name="mobile" type="text"
                                                            placeholder="Enter Mobile Number" class="form-control"
                                                            value="{{ $user->mobile }}">
                                                        <div class="validation-error text-danger">@error('mobile'){{
                                                            $message }}@enderror</div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="add_profile_picture">Profile Picture</label>
                                                        <input type="file" id="add_profile_picture"
                                                            name="profile_picture" class="form-control">
                                                        <div class="validation-error text-danger">
                                                            @error('profile_picture'){{
                                                            $message }}@enderror</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <div class="text-right">
                                                        <button class="btn btn-primary" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade  {{ ( old('current_password') || old('new_password') || old('confirm_password') ) ? 'show active': '' }}"
                                        id="pills-projects" role="tabpanel" aria-labelledby="pills-projects-tab">
                                        <form id="addUserForm" action="{{ route('changepassword') }}" method="POST"
                                            novalidate autocomplete="off">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="current_password">Current Password <span
                                                                    class="text-danger">*</span></label>
                                                            <input id="current_password" name="current_password"
                                                                type="text" placeholder="Enter Current Password"
                                                                class="form-control"
                                                                value="{{ old('current_password') }}">
                                                            <div class="validation-error text-danger">
                                                                @error('current_password'){{
                                                                $message }}@enderror</div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="new_password">New Password <span
                                                                    class="text-danger">*</span></label>
                                                            <input id="new_password" name="new_password" type="text"
                                                                placeholder="Enter New Password" class="form-control"
                                                                value="{{ old('new_password') }}">
                                                            <div class="validation-error text-danger">
                                                                @error('new_password'){{
                                                                $message }}@enderror</div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="confirm_password">Confirm Password <span
                                                                    class="text-danger">*</span></label>
                                                            <input id="confirm_password" name="confirm_password"
                                                                type="text" placeholder="Enter Confirm Password"
                                                                class="form-control"
                                                                value="{{ old('confirm_password') }}">
                                                            <div class="validation-error text-danger">
                                                                @error('confirm_password'){{
                                                                $message }}@enderror</div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-12">
                                                        <div class="text-right">
                                                            <button class="btn btn-primary" type="submit">Change
                                                                Password</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div style="top: 60px;">
                                                        <img class="rounded mx-auto d-block"
                                                            src="{{ url('public/assets/images/change_password.webp') }}"
                                                            alt="Change Password" style="width: 75%; height: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-admin.defaults>