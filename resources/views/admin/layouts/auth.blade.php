@extends('admin/layouts/master')
@section('content')
@push('css')
<link rel="stylesheet" href="{{ url('public/assets/libs/wave-effect/css/waves.min.css') }}" />
<link rel="stylesheet" href="{{ url('public/assets/libs/owl-carousel/css/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ url('public/assets/libs/owl-carousel/css/owl.carousel.min.css') }}" />
@endpush
<div class="auth-pages">
    <div class="container">
        <div class="justify-content-center">
            <div class="col-xl-11">
                <div class="row justify-content-center">
                    <div class="col-md-6 pr-md-0">
                        <div class="auth-page-sidebar">
                            <div class="overlay"></div>
                            <div class="auth-user-testimonial">
                                <div class="owl-carousel owl-loaded owl-drag">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                            style="transform: translate3d(-909px, 0px, 0px); transition: 0.25s; width: 3182px;">
                                            <div class="owl-item cloned" style="width: 454.5px;">
                                                <div class="item">
                                                    <h3 class="text-white mb-1">I love this theme!</h3>
                                                    <h5 class="text-white mb-3">"Admin templete. I love it very much!"
                                                    </h5>
                                                    <p>- Admin User</p>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 454.5px;">
                                                <div class="item">
                                                    <h3 class="text-white mb-1">I love this theme!</h3>
                                                    <h5 class="text-white mb-3">"Admin templete. I love it very much!"
                                                    </h5>
                                                    <p>- Admin User</p>
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 454.5px;">
                                                <div class="item">
                                                    <h3 class="text-white mb-1">I love this theme!</h3>
                                                    <h5 class="text-white mb-3">"Admin templete. I love it very much!"
                                                    </h5>
                                                    <p>- Admin User</p>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 454.5px;">
                                                <div class="item">
                                                    <h3 class="text-white mb-1">I love this theme!</h3>
                                                    <h5 class="text-white mb-3">"Admin templete. I love it very much!"
                                                    </h5>
                                                    <p>- Admin User</p>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 454.5px;">
                                                <div class="item">
                                                    <h3 class="text-white mb-1">I love this theme!</h3>
                                                    <h5 class="text-white mb-3">"Admin templete. I love it very much!"
                                                    </h5>
                                                    <p>- Admin User</p>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 454.5px;">
                                                <div class="item">
                                                    <h3 class="text-white mb-1">I love this theme!</h3>
                                                    <h5 class="text-white mb-3">"Admin templete. I love it very much!"
                                                    </h5>
                                                    <p>- Admin User</p>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 454.5px;">
                                                <div class="item">
                                                    <h3 class="text-white mb-1">I love this theme!</h3>
                                                    <h5 class="text-white mb-3">"Admin templete. I love it very much!"
                                                    </h5>
                                                    <p>- Admin User</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-nav disabled"><button type="button" role="presentation"
                                            class="owl-prev"><span aria-label="Previous">‹</span></button><button
                                            type="button" role="presentation" class="owl-next"><span
                                                aria-label="Next">›</span></button></div>
                                    <div class="owl-dots disabled"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-md-0">
                        <div class="card mb-0 p-2 p-md-3">
                            <div class="card-body">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="{{ url('public/assets/js/utils/colors.js') }}"></script>
<script src="{{ url('public/assets/libs/owl-carousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('public/assets/libs/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script src="{{ url('public/assets/libs/jquery-validation/js/additional-methods.min.js') }}"></script>
<script src="{{ url('public/assets/js/app.js') }}"></script>
<script>
    $(".auth-user-testimonial .owl-carousel").owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
</script>
@stack('script')
@endpush
@endsection