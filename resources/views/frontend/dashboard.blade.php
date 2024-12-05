<!doctype html>
<html class="no-js" lang="">

@include('frontend.partials.head')

<body>

    <!-- preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end  -->


    @include('frontend.partials.header')

    <main>

        @yield('forntend')

    </main>

    @include('frontend.partials.footer')


    <!-- JS here -->
    @include('frontend.partials.scripts')

</body>

</html>
