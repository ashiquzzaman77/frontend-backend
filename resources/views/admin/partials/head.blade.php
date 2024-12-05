<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta http-equiv="refresh" content="30"> --}}

    {{-- <meta name="description" content="{!! optional($meta)->description ?? '' !!}">
    <meta name="keywords" content="{{ optional($meta)->keyword ?? '' }}">
    <meta name="author" content="{{ optional($meta)->name ?? '' }}"> --}}


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--favicon-->
    <link rel="icon" href="{{ asset('admin/assets/images/favicon-32x32.png') }}" type="image/png" />

    <!--plugins-->
    <link href="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

    <!-- loader-->
    <link href="{{ asset('admin/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('admin/assets/js/pace.min.js') }}"></script>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/select2%404.1.0-rc.0/dist/css/select2.min.css" />
	<link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/select2-bootstrap-5-theme%401.3.0/dist/select2-bootstrap-5-theme.min.css" /> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@latest/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />


    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

    <link href="{{ asset('admin/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">

    {{-- Font Awesome  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/header-colors.css') }}" />

    <title>Admin DashBoard</title>

</head>
