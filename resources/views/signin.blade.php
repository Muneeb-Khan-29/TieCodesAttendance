<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../../">
    <meta charset="utf-8" />
    <title>Tie Codes | Attendance App</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="assets/css/pages/login/classic/login-3.css?v=7.0.5" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="assets/css/themes/layout/header/base/light.css?v=7.0.5" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/header/menu/light.css?v=7.0.5" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/brand/dark.css?v=7.0.5" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/aside/dark.css?v=7.0.5" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/sm-logo.svg') }}" />
</head>
<!--end::Head-->
<!--begin::Body-->
<style>
.svg-container{
    filter: drop-shadow(4px 4px 6px rgba(0, 0, 0, 0.5)); /* Drop shadow for 3D effect */
    transform: rotate(10deg); /* Optional: Adds slight rotation for a 3D feel */
}
.three-d-text {
    font-size: 4rem;
    font-weight: bold;
    color: #fcaf17;
    text-shadow: 
        1px 1px 0px #000,
        2px 2px 0px #555, 
        3px 3px 0px #333, 
        4px 4px 0px rgba(0, 0, 0, 0.7);
    
    transform: translateZ(10px);
}
</style>

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-3 login-signin-on d-flex flex-row-fluid " id="">
            <div class="d-flex flex-center bgi-size-cover bgi-no-repeat bg-dark flex-row-fluid"
                style="background-image: url(assets/media/bg/yellow_background.jpg);">
                <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                    <!--begin::Login Header-->
                    <div class="d-flex flex-center mb-15">
                        <a href="#">
                            <div class="svg-container">
                                <img src="{{ asset('assets/media/logos/sm-logo.svg') }}" height="250" style=""
                                    alt="" />
                            </div>
                        </a>
                    </div>
                    <!--end::Login Header-->
                    <!--begin::Login Sign in form-->
                    <div class="login-signin">
                        <div class="m-5">
                            <h1 class="three-d-text">Tie Codes</h1>
                        </div>
                        <div class="">
                            {{-- <h3>Sign In To Admin</h3> --}}
                            <p class="opacity-60 text-dark font-weight-bold">Enter your details to login to your account:</p>
                        </div>
                        <form id="myForm" class="form" action="{{ url('signin') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input
                                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"
                                    type="text" placeholder="Email" name="email" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <input
                                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"
                                    type="password" placeholder="Password" name="password" />
                            </div>
                            <div class="form-group text-center mt-10">
                                <button id="formSubmitButton" save-button="true"
                                    class="btn btn-pill btn-outline-dark  font-weight-bold opacity-90 px-15 py-3">Log
                                    In</button>
                            </div>
                            <div
									class="form-group text-center" >
									<div class="my-3 mr-2">
										<span class="text-dark mr-2">Don't have an account?</span>
										<a href="{{ url('signup/page') }}" class="font-weight-bold">Signup</a>
									</div>
									
								</div>
                        </form>
                    </div>
                    <!--end::Login Sign in form-->
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->
    <script>
        var HOST_URL = "https://keenthemes.com/metronic/tools/preview";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js?v=7.0.5"></script>
    <script src="assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5"></script>
    <script src="assets/js/scripts.bundle.js?v=7.0.5"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="assets/js/pages/custom/login/login-general.js?v=7.0.5"></script>
    <script>
        $(document).ready(function() {
            $('#formSubmitButton').on('click', function(event) {
                $(this).attr('save-button', 'false');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('form').on("submit", function(e) {
                $('#kt_login_signin_submit').attr('disabled', true);
            });

            $('form').bind("keypress", function(e) {
                if (e.keyCode == 13) {
                    e.preventDefault();
                    return false;
                }
            });

            $('#formSubmitButton').on('click', function(event) {
                $(this).attr('save-button', 'false');
                $(this).prop('disabled', true); // Disable the button

                $('#myForm').submit();
            });
        });
    </script>
    <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>
