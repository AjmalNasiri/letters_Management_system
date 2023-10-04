<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Admin LTE 3 with Bootstrap 4 --}}
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    {{-- Bootstrap 4 RTL --}}
    <link href="{{ asset('css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @yield('style')
    <style>
        img {
            position: absolute;
            top: 50%;
            left: 50%;
            -moz-transform: translateX(-50%) translateY(-50%);
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
        }

        #loadingImage {
            opacity: 0.2;
        }
    </style>


    @guest
        <style>
            body {
                background-image: url("{{ asset('images/mcit.jpg') }}");
                background-size: 100% 100%;
            }
        </style>
    @endguest
    <style>
        .container {
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    {{-- <div id="app">
        <main > --}}
    @auth
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">{{ __('lables.main_page') }}</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav mr-auto-navbav">

                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                            title="خروج از سیستم">
                            <i class="fa fa-sign-out-alt"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Sidebar -->
                <div
                    class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-rtl os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
                    <!-- Sidebar Menu -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
                        <h5 class="text-white">{{ Auth::user()->name }}</h5>
                        {{-- <div class="info">
                            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                        </div> --}}
                    </div>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                                                                                        with font-awesome or any other icon font library -->
                            {{-- مدیریت وسایط شروع --}}
                            <li
                                class="nav-item has-treeview {{ strpos(Route::currentRouteName(), 'car') !== false ? 'menu-open ' : '' }}">
                                <a href="#"
                                    class="nav-link {{ strpos(Route::currentRouteName(), 'car') !== false ? 'active ' : '' }}">
                                    <i class="nav-icon fas fa-car"></i>
                                    <p>
                                        مکتوبونه مدیریت
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                @role('super_admin')

                                    <li class="nav-item">
                                        <a href="{{ route('documents.index') }}"
                                            class="nav-link {{ Route::currentRouteName() == 'carCodr.index' ? 'active' : '' }}">
                                            <i class="fas fa-clipboard-list nav-icon"></i>
                                            <p>د مکتوبونو لیست</p>
                                        </a>
                                    </li>
                                    @endrole
                                    @can('create order')
                                        <li class="nav-item">
                                            <a href="{{ route('documents.create') }}"
                                                class="nav-link {{ Route::currentRouteName() == 'car.create' ? 'active' : '' }}">
                                                <i class="far fa-save nav-icon"></i>
                                                <p>د نوی مکتوپ ثپتول</p>
                                            </a>
                                        </li>
                                    @endcan
                                    <li class="nav-item">
                                        <a href="{{ route('department.documents') }}"
                                            class="nav-link {{ Route::currentRouteName() == 'carCodr.index' ? 'active' : '' }}">
                                            <i class="fas fa-clipboard-list nav-icon"></i>
                                            <p>د اړوند ډیپارټمنټ مکتوبونه</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('archive.documents') }}"
                                            class="nav-link {{ Route::currentRouteName() == 'carCodr.index' ? 'active' : '' }}">
                                            <i class="fas fa-clipboard-list nav-icon"></i>
                                            <p>د آرشیف شوی مکتوبونه</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{-- ختم مدیریت وسایط --}}

                            @can('create order')
                                {{-- مدیریت قطعه ها --}}
                                {{-- <li
                                    class="nav-item has-treeview {{ Route::currentRouteName() == 'qataa.index' ? 'menu-open ' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::currentRouteName() == 'qataa.index' ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-city"></i>
                                        <p>
                                            د ډیپارټمنټونو مدیریت
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href=""
                                                class="nav-link {{ Route::currentRouteName() == 'qataa.index' ? 'active' : '' }}">
                                                <i class="fas fa-list nav-icon"></i>
                                                <p>ثبت دیپارتمنتها</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li> --}}
                                {{-- ختم مدیریت قطعه ها --}}
                            @endcan



                            @can('print report')
                                {{-- شروع مدیریت راپور ها --}}
                                <li class="nav-item">
                                    <a href="{{ route('report.all') }}"
                                        class="nav-link {{ Route::currentRouteName() == 'report.all' ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-file-alt"></i>
                                        <p>مدیریت راپور ها</p>
                                    </a>
                                </li>
                                {{-- ختم مدیریت راپور ها --}}
                            @endcan
                            @can('super_admin')
                                {{-- شروع مدیریت راپور ها --}}
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}"
                                        class="nav-link {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-file-alt"></i>
                                        <p>مدیریت یوزر ها</p>
                                    </a>
                                </li>
                                {{-- ختم مدیریت راپور ها --}}
                            @endcan
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                    <div class="os-padding">
                    </div>
                </div>
                <!-- /.sidebar -->
            </aside>
            {{-- End of Main Sidebar Container --}}

            <div class="content-wrapper" style="min-height: 680px;">
                @yield('content')
            </div>
        </div>
    @endauth
    @guest
        @yield('content')
    @endguest
    <div id="loadingImage" class="d-none">
        <img src="{{ asset('images/loading.gif') }}" alt="loading">
    </div>

    {{-- </main>
    </div> --}}

    {{-- Scripts --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-rtl.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/adminlte.js') }}"></script>
    @yield('script')
    <script>
        function displayLoading() {
            $('#loadingImage').removeClass('d-none');
            $('.wrapper').addClass('d-none');
            $('.container').addClass('d-none');
            $('input,button,select').attr('disabled', 'true');
        }

        function removeLoading() {
            $('input,button,select').removeAttr('disabled');
            $('#loadingImage').addClass('d-none');
            $('.wrapper').removeClass('d-none');
            $('.container').removeClass('d-none');
        }

        function hideModal() {
            $('.modal-backdrop').remove();
        }
    </script>
</body>

</html>
