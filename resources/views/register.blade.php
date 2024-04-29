<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<!-- Mirrored from seantheme.com/hud/page_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 16:09:59 GMT -->
<head>
    <meta charset="utf-8">
    <title>HUD | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content>

    {{-- Required Css --}}
    <link href="{{ asset('assets/css/vendor.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet">

    {{-- Toastr --}}
    <link href="{{ asset('assets/css/toastr.css') }}" rel="stylesheet">

</head>
<body class="pace-top">

<div id="app" class="app app-full-height app-without-header">

    <div class="register">

        <div class="register-content">
            <form id="registerForm">
                @csrf
                <h1 class="text-center">Sign Up</h1>
                <p class="text-inverse text-opacity-50 text-center">One Admin ID is all you need to access all the Admin services.</p>
                <div class="mb-3">
                    <label class="form-label">User-Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg bg-inverse bg-opacity-5" placeholder="e.g John Smith" name="username">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg bg-inverse bg-opacity-5" placeholder="username@address.com" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control form-control-lg bg-inverse bg-opacity-5" name="password">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 submit">Sign Up</button>
                </div>
                <div class="text-inverse text-opacity-50 text-center">
                    Already have an Admin ID? <a href="{{ route('login-view') }}">Sign In</a>
                </div>
            </form>
        </div>

    </div>

</div>

{{-- Required Scripts --}}
<script src="{{ asset('assets/js/vendor.min.js')}}" type="bb96cbd61bc7dfd01db17eb6-text/javascript"></script>
<script src="{{ asset('assets/js/app.min.js')}}" type="bb96cbd61bc7dfd01db17eb6-text/javascript"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y3Q0VGQKY3" type="bb96cbd61bc7dfd01db17eb6-text/javascript"></script>
<script type="bb96cbd61bc7dfd01db17eb6-text/javascript">
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-Y3Q0VGQKY3');
</script>
{{--<script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="bb96cbd61bc7dfd01db17eb6-|49" defer></script>--}}
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"871382e958c1032f","version":"2024.3.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","b":1}' crossorigin="anonymous"></script>

{{-- jQuery --}}
<script src="{{ asset('assets/plugins/jQuery.js') }}"></script>

{{-- jQuery Validate --}}
<script src="{{ asset('assets/plugins/validate.js') }}"></script>

{{-- Toastr --}}
<script src="{{ asset('assets/plugins/toastr.js') }}"></script>
{{-- End Of Required Scripts --}}

{{-- Custom Scripts --}}
<script>
    {{--  When Submitted This one will be activated --}}
    $("#registerForm").validate({
        // rules: {
        //     username: {required: true},
        //     email: {required: true, email: true},
        //     password: {required: true},
        // },
        // messages: {
        //     username: {required: "Please enter User-Name"},
        //     email: {required: "Please enter Email address", email: "Please enter proper Email address"},
        //     password: {required: "Please enter Password"},
        // },
        errorClass: "text-danger",
        submitHandler: function (form, e) {
            e.preventDefault();
            let data = new FormData(form);
            $.ajax({
                url: '{{route("register")}}',
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
                            window.location.href = "{{ route('login-view') }}";
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

<!-- Mirrored from seantheme.com/hud/page_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 16:09:59 GMT -->
</html>
