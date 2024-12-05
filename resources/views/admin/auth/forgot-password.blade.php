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

    <title>Admin | Forgot Password</title>
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
                                            <img src="https://azshipping.net/backend/login/assets/logo/ship2.jpg"
                                                style="width:100%;height:500px" alt="" />
                                        </div>


                                        <div class="col-lg-6 col-12 mx-auto my-auto">

                                            <div class="mb-3">
                                                <img src="assets/images/logo-icon.png" width="60" alt="" />
                                            </div>
                                            <div class="mb-4">
                                                <h5 class="">Rocker Admin</h5>
                                                <p class="mb-0">Recover your password provide your email address</p>
                                            </div>

                                            <div class="form-body">

                                                <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

                                                <form class="row g-3" action="{{ route('admin.password.email') }}"
                                                    method="POST">
                                                    @csrf

                                                    <div class="col-12">
                                                        <label for="inputEmailAddress" class="form-label">Email
                                                            Address</label>
                                                        <input type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" id="inputEmailAddress"
                                                            placeholder="Email Address">

                                                        @error('email')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>




                                                    <div class="col-5">

                                                        <div class="d-grid">
                                                            <button type="submit"
                                                                class="btn btn-primary rounded-0">Reset
                                                                Password</button>
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


    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
</body>

</html>


{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('admin.password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
