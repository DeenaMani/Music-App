<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="LetStart Admin is a full featured, multipurpose, premium bootstrap admin template built with Bootstrap 4 Framework, HTML5, CSS and JQuery.">
    <meta name="keywords"
        content="admin, panels, dashboard, admin panel, multipurpose, bootstrap, bootstrap4, all type of dashboards">
    <meta name="author" content="MatrrDigital">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sivathuli</title>
    <link rel="shortcut icon" href="{{ url('/public/assets/images/favicon.png') }}" type="image/x-icon">
    @stack('css')
    <link rel="stylesheet" href="{{ url('/public/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('/public/assets/css/styles.css') }}">
</head>
<div class="page-warpper">
    @yield('content')
</div>

<body>
</body>
<script src="{{ url('public/assets/js/vendor.min.js') }}"></script>
@stack('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const formFields = document.querySelectorAll('.form-group.floating-label .form-control');
        
        formFields.forEach(function(field) {
            if (field.value.trim() !== '') {
                const parent = field.closest('.floating-label');
                parent.classList.add('enable-floating-label');
            }

            // field.addEventListener('input', function() {
            //     const parent = field.closest('.floating-label');
            //     if (field.value.trim() !== '') {
            //         parent.classList.add('enable-floating-label');
            //     } else {
            //         parent.classList.remove('enable-floating-label');
            //     }
            // });
        });
    });

</script>
</body>

</html>