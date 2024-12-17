<x-admin.auth>

    <div class="clearfix">
        <img src="{{ url('public/assets/images/logo.png') }}" height="24" alt="Lettstart Admin">
    </div>
    <h5 class="mt-4 font-weight-600">Welcome back!</h5>
    <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
    @include('admin.pages.message')
    <form id="loginForm" action="{{ url('login') }}" method="post" name="loginForm" novalidate="novalidate">
        @csrf
        @method('POST')
        <div class="form-group floating-label">
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
            <label for="email">Email Address</label>
            <div class="validation-error d-none font-size-13">
                <p>Email must be a valid email address</p>
            </div>
        </div>
        <div class="form-group floating-label">
            <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}">
            <label for="password">Password</label>
            <div class="validation-error d-none font-size-13">
                <p>This field is required</p>
            </div>
        </div>

        <div class="form-group text-center">
            <button class="btn btn-primary btn-block waves-effect waves-light" data-effect="wave" type="submit"> Log In
            </button>
        </div>
        <div class="clearfix text-center">
            <a href="#" class="text-primary">Forgot your password?</a>
        </div>
    </form>
    @push('script')
    <script>
        $('#loginForm').validate({
            focusInvalid: false,
            rules: {
                'email': {
                    required: true,
                    email: true
                },
                'password': {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                'password': {
                    required: "Please enter a password.",
                    minlength: "Password must be at least 6 characters long."
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
                e.$(this).submit();
            }
        });
    </script>
    @endpush
</x-admin.auth>