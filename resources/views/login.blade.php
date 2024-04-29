
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<!-- Mirrored from seantheme.com/hud/page_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 16:09:10 GMT -->
<head>
    <meta charset="utf-8">
    <title>HUD | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content>

    {{-- Required Css --}}
    <link href="{{ asset('assets/css/vendor.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.min.cs')}}s" rel="stylesheet">

    {{-- Toastr --}}
    <link href="{{ asset('assets/css/toastr.css') }}" rel="stylesheet">

</head>
<body class="pace-top">

<div id="app" class="app app-full-height app-without-header">

    <div class="login">

        <div class="login-content">
            <form id="loginForm" >
                @csrf
                <h1 class="text-center">Sign In</h1>
                <div class="text-inverse text-opacity-50 text-center mb-4">
                    For your protection, please verify your identity.
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg bg-inverse bg-opacity-5" name="email" placeholder>
                </div>
                <div class="mb-3">
                    <div class="d-flex">
                        <label class="form-label">Password <span class="text-danger">*</span></label>
                        <a href="#" class="ms-auto text-inverse text-decoration-none text-opacity-50">Forgot password?</a>
                    </div>
                    <input type="password" class="form-control form-control-lg bg-inverse bg-opacity-5" name="password" placeholder>
                </div>

                <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">Sign In</button>
                <div class="text-center text-inverse text-opacity-50">
                    Don't have an account yet? <a href="{{ route('register-view') }}">Sign up</a>.
                </div>
            </form>
        </div>

    </div>

</div>

{{-- Required Scripts --}}
<script src="{{ asset('assets/js/vendor.min.js') }}" type="4ea02e71d0372fb26913de7e-text/javascript"></script>
<script src="{{ asset('assets/js/app.min.js') }}" type="4ea02e71d0372fb26913de7e-text/javascript"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y3Q0VGQKY3" type="4ea02e71d0372fb26913de7e-text/javascript"></script>


{{-- jQuery --}}
<script src="{{ asset('assets/plugins/jQuery.js') }}"></script>

{{-- jQuery Validate --}}
<script src="{{ asset('assets/plugins/validate.js') }}"></script>

{{-- Toastr --}}
<script src="{{ asset('assets/plugins/toastr.js') }}"></script>

{{-- Custom Scripts --}}
<script>
    {{--  When Submitted This one will be activated --}}
    $("#loginForm").validate({
        rules: {
            email: {required: true, email: true},
            password: {required: true},
        },
        messages: {
            email: {required: "Please enter Email address", email: "Please enter proper Email address"},
            password: {required: "Please enter Password"},
        },
        errorClass: "text-danger",
        submitHandler: function (form, e) {
            e.preventDefault();
            let data = new FormData(form);
            $.ajax({
                url: '{{route("login")}}',
                type: "POST",
                dataType: "JSON",
                data: data,
                cache: false,
                async: false,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.status == 200) {
                        toastr.success(data.response, { timeOut: 2000 });
                        setTimeout(function () {
                            window.location.href = "{{ route('dashboard') }}";
                        }, 2000);
                    } else {
                        toastr.error(data.response, { timeOut: 3000 });
                    }
                },
            });
        }
    })

</script>

</body>

<!-- Mirrored from seantheme.com/hud/page_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 16:09:10 GMT -->
</html>
