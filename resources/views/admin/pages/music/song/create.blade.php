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
    <script src="{{ url('public/assets/libs/jquery-validation/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/jquery-validation/js/additional-methods.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('public/assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#songForm').validate({
                focusInvalid: false,
                rules: {
                    title: {
                        required: true,
                        maxlength: 100
                    },
                    category: {
                        required: true
                    },
                    singer: {
                        required: true
                    },
                    song: {
                        required: true,
                        extension: "mp3",
                    },
                    cover_image: {
                        extension: "jpg|jpeg|png",
                        filesize: 500000
                    },
                    image: {
                        required: true,
                        extension: "jpg|jpeg|png",
                        filesize: 500000
                    }
                },
                messages: {
                    title: {
                        required: "Song title is required.",
                        maxlength: "Song title must not exceed 100 characters."
                    },
                    category: {
                        required: "Please select a category."
                    },
                    singer: {
                        required: "Please select a singer."
                    },
                    song: {
                        extension: "Please upload an MP3 file only."
                    },
                    cover_image: {
                        extension: "Please upload a valid image (jpg, jpeg, png).",
                        filesize: "File size must not exceed 500kb."
                    },
                    image: {
                        required: "Please upload an image for the song.",
                        extension: "Please upload a valid image (jpg, jpeg, png).",
                        filesize: "File size must not exceed 500kb."
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
            }, "File size is too large.");
        });
    </script>
    @endpush

    <div class="page-content">
        <!-- page header -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="page-title dflex-between-center">
                    <h3 class="mb-1 font-weight-bold">Create Song</h3>
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
                        <li class="breadcrumb-item">
                            <a href="music.html">
                                Music
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Create Song</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- page content -->
        <div class="page-content-wrapper mt--45">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Create Song</h5>
                    </div>
                    <div class="card-body">
                        <form id="songForm" action="{{ route('music.song.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-12 col-lg-6">
                                    <div class="form-group floating-label enable-floating-label show-label">
                                        <input id="title" name="title" type="text" placeholder="Enter Song Title"
                                            class="form-control" value="{{ old('title') }}">
                                        <label for="title">Song Title <span class="text-danger">*</span></label>
                                        <div class="validation-error font-size-13 text-danger">@error('title'){{
                                            $message }}@enderror</div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="form-group floating-label enable-floating-label show-label">
                                        <select class="form-control" id="category" name="category">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category')==$category->id ?
                                                'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="category">Category <span class="text-danger">*</span></label>
                                        <div class="validation-error font-size-13 text-danger"> @error('category'){{
                                            $message }} @enderror</div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="form-group floating-label enable-floating-label show-label">
                                        <select class="form-control" id="singer" name="singer">
                                            <option value="">Select Singer</option>
                                            @foreach ($singers as $singer)
                                            <option value="{{ $singer->id }}" {{ old('singer')==$singer->id ? 'selected'
                                                : '' }}>
                                                {{ $singer->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="singer">Singer <span class="text-danger">*</span></label>
                                        <div class="validation-error font-size-13 text-danger"> @error('singer'){{
                                            $message }}@enderror</div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="form-group floating-label enable-floating-label show-label">
                                        <input type="file" id="song" name="song" class="form-control">
                                        <label for="song">Song (MP3)</label>
                                        <div class="validation-error font-size-13 text-danger"> @error('song'){{
                                            $message }} @enderror</div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="form-group floating-label enable-floating-label show-label">
                                        <input type="file" id="cover_image" name="cover_image" class="form-control">
                                        <label for="cover_image">Cover Image (jpg, jpeg, png)</label>
                                        <div class="validation-error font-size-13 text-danger">@error('cover_image'){{
                                            $message }}@enderror</div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="form-group floating-label enable-floating-label show-label">
                                        <input type="file" id="image" name="image" class="form-control">
                                        <label for="image">Image (Required) <span class="text-danger">*</span></label>
                                        <div class="validation-error font-size-13 text-danger">@error('image'){{
                                            $message }}@enderror</div>
                                    </div>
                                </div>

                                <div class="col-lg-12 clearfix" style="text-align: end;">
                                    <button class="btn btn-primary waves-effect waves-light" data-effect="wave"
                                        type="submit">Create Song</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-admin.defaults>