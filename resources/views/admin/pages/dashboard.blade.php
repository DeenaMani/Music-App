<x-admin.defaults>
    @push('css')
    <link rel="stylesheet" href="{{ url('public/assets/css/icons.css') }}" />
    <link rel="stylesheet" href="{{ url('public/assets/libs/wave-effect/css/waves.min.css') }}" />
    <link rel="stylesheet" href="{{ url('public/assets/libs/owl-carousel/css/owl.carousel.min.css') }}" />
    @endpush

    @push('script')
    {{-- <script src="{{ url('public/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/chartjs/js/Chart.bundle.min.js') }}"></script> --}}
    <script src="{{ url('public/assets/js/utils/colors.js') }}"></script>
    {{-- <script src="{{ url('public/assets/js/pages/dashboard.init.js') }}"></script> --}}
    <script src="{{ url('public/assets/js/app.js') }}"></script>
    @endpush


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
                                    @php
                                    $song = App\Models\Music\Song::count();
                                    @endphp
                                    <h2 class="mb-0 mt-1">{{ $song }}</h2>
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
                                    @php
                                    $singer = App\Models\Music\Singer::count();
                                    @endphp
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total
                                        Singers</span>
                                    <h2 class="mb-0 mt-1">{{ $singer }}</h2>
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
                                    @php
                                    $category = App\Models\Music\Category::count();
                                    @endphp
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">total
                                        category</span>
                                    <h2 class="mb-0 mt-1">{{ $category }}</h2>
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
                                    @php
                                    $user = App\Models\User::whereNot('email','horizontamil@gmail.com')->count();
                                    @endphp
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">total
                                        users</span>
                                    <h2 class="mb-0 mt-1">{{ $user }}</h2>
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

</x-admin.defaults>