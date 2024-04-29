
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<!-- Mirrored from seantheme.com/hud/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2024 16:07:21 GMT -->
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content>

    @include('layout.headerLinks')

    <style>
        div.dt-processing{
            /*top: 63%;*/
            left: 56%;
            background: black;
        }
    </style>
    @stack('custom-style')

</head>
<body>

<div id="app" class="app">

    @include('layout.header')


    @include('layout.sideBar')


    <button class="app-sidebar-mobile-backdrop" data-toggle-target=".app" data-toggle-class="app-sidebar-mobile-toggled"></button>


   @yield('content')


{{--    <div class="app-theme-panel">--}}
{{--        <div class="app-theme-panel-container">--}}
{{--            <a href="javascript:;" data-toggle="theme-panel-expand" class="app-theme-toggle-btn"><i class="bi bi-sliders"></i></a>--}}
{{--            <div class="app-theme-panel-content">--}}
{{--                <div class="small fw-bold text-inverse mb-1">Display Mode</div>--}}
{{--                <div class="card mb-3">--}}

{{--                    <div class="card-body p-2">--}}
{{--                        <div class="row gx-2">--}}
{{--                            <div class="col-6">--}}
{{--                                <a href="javascript:;" data-toggle="theme-mode-selector" data-theme-mode="dark" class="app-theme-mode-link active">--}}
{{--                                    <div class="img"><img src="assets/img/mode/dark.jpg" class="object-fit-cover" height="76" width="76" alt="Dark Mode"></div>--}}
{{--                                    <div class="text">Dark</div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="col-6">--}}
{{--                                <a href="javascript:;" data-toggle="theme-mode-selector" data-theme-mode="light" class="app-theme-mode-link">--}}
{{--                                    <div class="img"><img src="assets/img/mode/light.jpg" class="object-fit-cover" height="76" width="76" alt="Light Mode"></div>--}}
{{--                                    <div class="text">Light</div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <div class="card-arrow">--}}
{{--                        <div class="card-arrow-top-left"></div>--}}
{{--                        <div class="card-arrow-top-right"></div>--}}
{{--                        <div class="card-arrow-bottom-left"></div>--}}
{{--                        <div class="card-arrow-bottom-right"></div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="small fw-bold text-inverse mb-1">Theme Color</div>--}}
{{--                <div class="card mb-3">--}}

{{--                    <div class="card-body p-2">--}}

{{--                        <div class="app-theme-list">--}}
{{--                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-pink" data-theme-class="theme-pink" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink">&nbsp;</a></div>--}}
{{--                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-red" data-theme-class="theme-red" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Red">&nbsp;</a></div>--}}
{{--                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-warning" data-theme-class="theme-warning" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Orange">&nbsp;</a></div>--}}
{{--                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-yellow" data-theme-class="theme-yellow" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow">&nbsp;</a></div>--}}
{{--                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-lime" data-theme-class="theme-lime" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime">&nbsp;</a></div>--}}
{{--                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-green" data-theme-class="theme-green" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green">&nbsp;</a></div>--}}
{{--                            <div class="app-theme-list-item active"><a href="javascript:;" class="app-theme-list-link bg-teal" data-theme-class data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default">&nbsp;</a></div>--}}
{{--                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-info" data-theme-class="theme-info" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cyan">&nbsp;</a></div>--}}
{{--                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-primary" data-theme-class="theme-primary" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Blue">&nbsp;</a></div>--}}
{{--                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-purple" data-theme-class="theme-purple" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple">&nbsp;</a></div>--}}
{{--                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-indigo" data-theme-class="theme-indigo" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo">&nbsp;</a></div>--}}
{{--                            <div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-gray-100" data-theme-class="theme-gray-200" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Gray">&nbsp;</a></div>--}}
{{--                        </div>--}}

{{--                    </div>--}}


{{--                    <div class="card-arrow">--}}
{{--                        <div class="card-arrow-top-left"></div>--}}
{{--                        <div class="card-arrow-top-right"></div>--}}
{{--                        <div class="card-arrow-bottom-left"></div>--}}
{{--                        <div class="card-arrow-bottom-right"></div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="small fw-bold text-inverse mb-1">Theme Cover</div>--}}
{{--                <div class="card">--}}

{{--                    <div class="card-body p-2">--}}

{{--                        <div class="app-theme-cover">--}}
{{--                            <div class="app-theme-cover-item active">--}}
{{--                                <a href="javascript:;" class="app-theme-cover-link" style="background-image: url(assets/img/cover/cover-thumb-1.jpg);" data-theme-cover-class data-toggle="theme-cover-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default">&nbsp;</a>--}}
{{--                            </div>--}}
{{--                            <div class="app-theme-cover-item">--}}
{{--                                <a href="javascript:;" class="app-theme-cover-link" style="background-image: url(assets/img/cover/cover-thumb-2.jpg);" data-theme-cover-class="bg-cover-2" data-toggle="theme-cover-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cover 2">&nbsp;</a>--}}
{{--                            </div>--}}
{{--                            <div class="app-theme-cover-item">--}}
{{--                                <a href="javascript:;" class="app-theme-cover-link" style="background-image: url(assets/img/cover/cover-thumb-3.jpg);" data-theme-cover-class="bg-cover-3" data-toggle="theme-cover-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cover 3">&nbsp;</a>--}}
{{--                            </div>--}}
{{--                            <div class="app-theme-cover-item">--}}
{{--                                <a href="javascript:;" class="app-theme-cover-link" style="background-image: url(assets/img/cover/cover-thumb-4.jpg);" data-theme-cover-class="bg-cover-4" data-toggle="theme-cover-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cover 4">&nbsp;</a>--}}
{{--                            </div>--}}
{{--                            <div class="app-theme-cover-item">--}}
{{--                                <a href="javascript:;" class="app-theme-cover-link" style="background-image: url(assets/img/cover/cover-thumb-5.jpg);" data-theme-cover-class="bg-cover-5" data-toggle="theme-cover-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cover 5">&nbsp;</a>--}}
{{--                            </div>--}}
{{--                            <div class="app-theme-cover-item">--}}
{{--                                <a href="javascript:;" class="app-theme-cover-link" style="background-image: url(assets/img/cover/cover-thumb-6.jpg);" data-theme-cover-class="bg-cover-6" data-toggle="theme-cover-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cover 6">&nbsp;</a>--}}
{{--                            </div>--}}
{{--                            <div class="app-theme-cover-item">--}}
{{--                                <a href="javascript:;" class="app-theme-cover-link" style="background-image: url(assets/img/cover/cover-thumb-7.jpg);" data-theme-cover-class="bg-cover-7" data-toggle="theme-cover-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cover 7">&nbsp;</a>--}}
{{--                            </div>--}}
{{--                            <div class="app-theme-cover-item">--}}
{{--                                <a href="javascript:;" class="app-theme-cover-link" style="background-image: url(assets/img/cover/cover-thumb-8.jpg);" data-theme-cover-class="bg-cover-8" data-toggle="theme-cover-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cover 8">&nbsp;</a>--}}
{{--                            </div>--}}
{{--                            <div class="app-theme-cover-item">--}}
{{--                                <a href="javascript:;" class="app-theme-cover-link" style="background-image: url(assets/img/cover/cover-thumb-9.jpg);" data-theme-cover-class="bg-cover-9" data-toggle="theme-cover-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cover 9">&nbsp;</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}


{{--                    <div class="card-arrow">--}}
{{--                        <div class="card-arrow-top-left"></div>--}}
{{--                        <div class="card-arrow-top-right"></div>--}}
{{--                        <div class="card-arrow-bottom-left"></div>--}}
{{--                        <div class="card-arrow-bottom-right"></div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

</div>

    @include('layout.footerLinks')
    <script>
        $(document).on('click', '.menu-item.has-sub', function (e){
           $(this).addClass('active');
        });

        $(document).on('click', '.menu-item.has-sub.active', function (e){
            $(this).removeClass('active');
        });
    </script>

    @stack('custom-js')
{{--<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/vendor.min.js" type="771fe153c31c0abbba221400-text/javascript"></script>--}}
{{----}}
{{--<script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="771fe153c31c0abbba221400-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"871382814b56032f","version":"2024.3.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","b":1}' crossorigin="anonymous"></script>--}}
</body>
</html>
