<!doctype html>
<html lang="en">

@include('admin.partials.head')

<body>
    <!--wrapper-->
    <div class="wrapper">

        <!--sidebar wrapper -->
        @include('admin.partials.sidebar')
        <!--end sidebar wrapper -->

        <!--start header -->
        @include('admin.partials.header')
        <!--end header -->

        <!--start page wrapper -->
        <div class="page-wrapper">

            {{ $slot }}
            {{-- @yield('admin') --}}

        </div>
        <!--end page wrapper -->

        @include('admin.partials.footer')

    </div>
    <!--end wrapper-->

    @include('admin.partials.scripts')

</body>

</html>
