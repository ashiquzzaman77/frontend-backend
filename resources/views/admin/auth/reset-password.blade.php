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


    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

    <link href="{{ asset('admin/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">

    <title>Admin | Reset Password</title>
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
                                                <p class="mb-0">Reset your password</p>
                                            </div>

                                            <div class="form-body">

                                                <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

                                                <form class="row g-3" action="{{ route('admin.password.store') }}"
                                                    method="POST">
                                                    @csrf

                                                    <!-- Password Reset Token -->
                                                    <input type="hidden" name="token"
                                                        value="{{ $request->route('token') }}">

                                                    <div class="col-12">
                                                        <label for="inputEmailAddress" class="form-label">Email
                                                            Address</label>
                                                        <input type="email" class="form-control" name="email"
                                                            value="{{ old('email', $request->email) }}"
                                                            id="inputEmailAddress" readonly placeholder="Email Or Phone">

                                                    </div>

                                                    <div class="col-12">

                                                        <label for="inputChoosePassword"
                                                            class="form-label">Password</label>

                                                        <div class="input-group" id="show_hide_password">
                                                            <input type="password" class="form-control border-end-0"
                                                                id="inputPassword" name="password" value=""
                                                                placeholder="Enter Password">
                                                            <a href="javascript:;"
                                                                class="input-group-text bg-transparent @error('password') is-invalid @enderror">
                                                                <i class='bx bx-hide'></i></a>
                                                        </div>
                                                        @error('password')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="inputChoosePassword" class="form-label">Confirm
                                                            Password</label>
                                                        <div class="input-group" id="show_hide_password_confirmation">
                                                            <input type="password" class="form-control border-end-0"
                                                                id="inputConfirmPassword" name="password_confirmation"
                                                                value="" placeholder="Enter Password">
                                                            <a href="javascript:;"
                                                                class="input-group-text bg-transparent @error('password_confirmation') is-invalid @enderror">
                                                                <i class='bx bx-hide'></i></a>
                                                        </div>
                                                        @error('password_confirmation')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>


                                                    <div class="col-5">

                                                        <div class="d-grid">
                                                            <button type="submit"
                                                                class="btn btn-primary rounded-0">Update
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

    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            // Show/Hide password for the main password field
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                let passwordField = $('#inputPassword');
                let icon = $('#show_hide_password i');
                if (passwordField.attr("type") == "text") {
                    passwordField.attr('type', 'password');
                    icon.addClass("bx-hide");
                    icon.removeClass("bx-show");
                } else {
                    passwordField.attr('type', 'text');
                    icon.removeClass("bx-hide");
                    icon.addClass("bx-show");
                }
            });

            // Show/Hide password for the confirm password field
            $("#show_hide_password_confirmation a").on('click', function(event) {
                event.preventDefault();
                let confirmPasswordField = $('#inputConfirmPassword');
                let icon = $('#show_hide_password_confirmation i');
                if (confirmPasswordField.attr("type") == "text") {
                    confirmPasswordField.attr('type', 'password');
                    icon.addClass("bx-hide");
                    icon.removeClass("bx-show");
                } else {
                    confirmPasswordField.attr('type', 'text');
                    icon.removeClass("bx-hide");
                    icon.addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
</body>


</html>


{{-- 
<x-guest-layout>
    <form method="POST" action="{{ route('admin.password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
