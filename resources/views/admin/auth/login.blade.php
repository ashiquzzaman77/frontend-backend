<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--favicon-->
    <link rel="icon" href="{{ asset('admin/assets/images/favicon-32x32.png') }}" type="image/png" />

    <!--plugins-->
    <link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />

    <!-- loader-->
    {{-- <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script> --}}

    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

    <link href="{{ asset('admin/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">

    <title>Admin | Login</title>
</head>

<body class="bg-dark" style="background: linear-gradient(to bottom, #1b2d3a, #000c0e);">

    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-lg-0"
            style="margin-top: 40%">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <div class="card mb-0 shadow-none rounded-0">
                            <div class="card-body">
                                <div class="p-4">
                                    <div class="row">

                                        <div class="col-lg-5 d-none d-lg-block">
                                            <img src="https://azshipping.net/backend/login/assets/logo/ship2.jpg" style="width:100%;height:500px"
                                                alt="" />
                                        </div>


                                        <div class="col-lg-6 col-12 mx-auto my-auto">

                                            <div class="mb-3">
                                                <img src="assets/images/logo-icon.png" width="60" alt="" />
                                            </div>
                                            <div class="mb-4">
                                                <h5 class="">Rocker Admin</h5>
                                                <p class="mb-0">Please log in to your account</p>
                                            </div>

                                            <div class="form-body">

                                                <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

                                                <form class="row g-3" action="{{ route('admin.login') }}"
                                                    method="POST">
                                                    @csrf

                                                    <div class="col-12">
                                                        <label for="inputEmailAddress" class="form-label">Email Or
                                                            Phone</label>
                                                        <input type="text"
                                                            class="form-control @error('login') is-invalid @enderror"
                                                            name="login" id="inputEmailAddress"
                                                            placeholder="Email Or Phone">

                                                        @error('login')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="inputChoosePassword"
                                                            class="form-label">Password</label>
                                                        <div class="input-group" id="show_hide_password">
                                                            <input type="password" class="form-control border-end-0"
                                                                id="inputChoosePassword" name="password" value=""
                                                                placeholder="Enter Password"> <a href="javascript:;"
                                                                class="input-group-text bg-transparent @error('password') is-invalid @enderror"><i
                                                                    class='bx bx-hide'></i></a>
                                                        </div>
                                                        @error('password')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-check form-switch">

                                                            <input class="form-check-input" type="checkbox"
                                                                id="remember_me" name="remember">

                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckChecked">Remember Me</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 text-end"> <a
                                                            href="{{ route('admin.password.request') }}">Forgot Password
                                                            ?</a>
                                                    </div>
                                                    <div class="col-3">

                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-primary rounded-0">Sign
                                                                in</button>
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
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>

    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
</body>


</html>


{{-- <!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title>Admin Login</title>

    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="Metronic" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />

    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('backend/assets/media/logos/favicon.ico') }}" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('backend/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative"
                style="background-color: #F2C98A">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <!--begin::Content-->
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                        <!--begin::Logo-->
                        <a href="javascript:;" class="py-9 mb-5">
                            <img alt="Logo" src="{{ asset('backend/assets/media/logos/logo-2.png') }}"
                                class="h-60px" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Title-->
                        <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #986923;">Welcome to DadaBhai</h1>
                        <!--end::Title-->
                        <!--begin::Description-->

                        <!--end::Description-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Illustration-->
                    <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
                        style="background-image: url(assets/media/illustrations/sketchy-1/13.png)"></div>
                    <!--end::Illustration-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form class="form w-100" action="{{ route('admin.login') }}" method="POST">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Sign In DadaBhaai</h1>
                                <!--end::Title-->
                            </div>
                            <!--begin::Heading-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-10">

                                

                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-bolder text-dark">Email Or Phone</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input
                                    class="form-control form-control-lg form-control-solid @error('login') is-invalid @enderror"
                                    type="text" id="login" placeholder="Email Or Phone" name="login"
                                    autocomplete="off" />

                                @error('login')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <!--end::Input-->

                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack mb-2">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                    <!--end::Label-->
                                    <!--begin::Link-->
                                    <a href="{{ route('admin.password.request') }}"
                                        class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                                    <!--end::Link-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Input-->
                                <input
                                    class="form-control form-control-lg @error('password') is-invalid @enderror form-control-solid"
                                    type="password" name="password" id="password" placeholder="*********"
                                    autocomplete="off" />

                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!-- Remember Me -->
                            <div class="block mb-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                        name="remember">
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <!--begin::Actions-->
                            <div class="text-center">
                                <!--begin::Submit button-->
                                <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    Submit
                                </button>
                                <!--end::Submit button-->
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->

            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <script src="{{ asset('backend/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('backend/assets/js/custom/authentication/sign-in/general.js') }}"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html> --}}


{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
