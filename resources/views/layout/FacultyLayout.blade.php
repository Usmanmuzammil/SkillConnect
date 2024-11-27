<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">


<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Sep 2022 15:00:54 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Faculty | Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- jsvectormap css -->
    <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Min5-->
    {{-- <link href="{{ asset('assets/bootstrap/boostrap5.min.css') }}" rel="stylesheet" type="text/css" /> --}}
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

{{-- datatable links --}}
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
{{-- datatable links --}}
<!-- Bootstrap CSS -->

<!-- Bootstrap JS (needed for dropdown functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-md-block">

                            <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                                <div data-simplebar style="max-height: 320px;">
                                    <!-- item-->
                                    <div class="dropdown-header">
                                        <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                                    </div>

                                    <div class="dropdown-item bg-transparent text-wrap">
                                        <a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">how to
                                            setup <i class="mdi mdi-magnify ms-1"></i></a>
                                        <a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">buttons
                                            <i class="mdi mdi-magnify ms-1"></i></a>
                                    </div>
                                    <!-- item-->
                                    <div class="dropdown-header mt-2">
                                        <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                        <span>Analytics Dashboard</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                        <span>Help Center</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                        <span>My account settings</span>
                                    </a>

                                    <!-- item-->
                                    <div class="dropdown-header mt-2">
                                        <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                                    </div>

                                    <div class="notification-list">
                                        <!-- item -->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-2.jpg"
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="m-0">Angela Bernier</h6>
                                                    <span class="fs-11 mb-0 text-muted">Manager</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- item -->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-3.jpg"
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="m-0">David Grasso</h6>
                                                    <span class="fs-11 mb-0 text-muted">Web Designer</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- item -->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-5.jpg"
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="m-0">Mike Bunch</h6>
                                                    <span class="fs-11 mb-0 text-muted">React Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="text-center pt-3 pb-1">
                                    <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All
                                        Results <i class="ri-arrow-right-line ms-1"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..."
                                                aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>




                        {{-- <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div> --}}

                        {{-- notification --}}
                        <div class="dropdown topbar-head-dropdown ms-1 header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                {{-- <i class='bx bx-bell fs-22'></i> --}}
                                <span class="visually-hidden">unread messages</span></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">

                                <div class="dropdown-head bg-primary bg-pattern rounded-top">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="px-2 pt-2">
                                        <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom"
                                            data-dropdown-tabs="true" id="notificationItemsTab" role="tablist">
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab"
                                                    role="tab" aria-selected="true">
                                                    All MESSAGES
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                                <div class="tab-content" id="notificationItemsTabContent">
                                    <div class="mt-2">



                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- notification --}}

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>


                     <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                            {{ auth()->user()->name }}
                                        </span>
                                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Faculty Member</span>
                                    </span>
                                </span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="page-header-user-dropdown">
                                {{-- <li><a class="dropdown-item" href="/faculty/profile_update/view">
                                    <i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> Profile
                                </a></li> --}}
                                <li><a class="dropdown-item" href="{{ route('faculty.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> Logout
                                </a></li>
                                <form id="logout-form" action="{{ route('faculty.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                        
                            
                            {{-- Only desgin code  --}}
                            {{-- <div class="dropdown ms-sm-3 header-item topbar-user">
                                <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="d-flex align-items-center">
                                        <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                        <span class="text-start ms-xl-2">
                                            <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Anna Adame</span>
                                            <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Founder</span>
                                        </span>
                                    </span>
                                </button>
                            
                                <!-- Dropdown Menu -->
                                <div class="dropdown-menu dropdown-menu-end">
                                    <h6 class="dropdown-header">Welcome Anna!</h6>
                            
                                    <!-- Profile -->
                                    <a class="dropdown-item" href="pages-profile.html">
                                        <i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i>
                                        <span class="align-middle">Profile</span>
                                    </a>
                            
                                    <!-- Messages -->
                                    <a class="dropdown-item" href="apps-chat.html">
                                        <i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i>
                                        <span class="align-middle">Messages</span>
                                    </a>
                            
                                    <!-- Taskboard -->
                                    <a class="dropdown-item" href="apps-tasks-kanban.html">
                                        <i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i>
                                        <span class="align-middle">Taskboard</span>
                                    </a>
                            
                                    <!-- Help -->
                                    <a class="dropdown-item" href="pages-faqs.html">
                                        <i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i>
                                        <span class="align-middle">Help</span>
                                    </a>
                            
                                    <div class="dropdown-divider"></div>
                            
                                    <!-- Balance -->
                                    <a class="dropdown-item" href="pages-profile.html">
                                        <i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i>
                                        <span class="align-middle">Balance: <b>$5971.67</b></span>
                                    </a>
                            
                                    <!-- Settings (New) -->
                                    <a class="dropdown-item" href="pages-profile-settings.html">
                                        <span class="badge bg-soft-success text-success mt-1 float-end">New</span>
                                        <i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i>
                                        <span class="align-middle">Settings</span>
                                    </a>
                            
                                    <!-- Lock screen -->
                                    <a class="dropdown-item" href="auth-lockscreen-basic.html">
                                        <i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i>
                                        <span class="align-middle">Lock screen</span>
                                    </a>
                            
                                    <!-- Logout -->
                                    <a class="dropdown-item" href="auth-logout-basic.html">
                                        <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                        <span class="align-middle">Logout</span>
                                    </a>
                                </div>
                            </div> --}}
                            
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <h4 class="text-light mt-2">

                           GDC & PGC
                            </h4>
                    </span>
                    <span class="logo-lg">
                        <h2 class="text-light mt-2">
                            <?php
                            $setting = App\Models\Setting::where('key', 'name')->get()->first();
                            if ($setting) {
                                echo $setting->value;
                            } else {
                                echo 'Brand name not found';
                            }
                            ?>
                            </h2>
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <h4 class="text-light mt-2">
                         GDC & PGC
                            </h4>
                    </span>
                    <span class="logo-lg">
                        <h2 class="text-light mt-2">
                            <?php
                            $setting = App\Models\Setting::where('key', 'name')->get()->first();
                            if ($setting) {
                                echo $setting->value;
                            } else {
                                echo 'Brand name not found';
                            }
                            ?>

                        </h2>
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="nav-item mt-4">
                            <a class="nav-link " href="{{ url('/faculty/profile_update/view') }}">
                                <i class="ri-dashboard-2-fill"></i></i> <span>Profile</span>
                            </a>
                        </li>

                        
                        {{-- <li class="nav-item "  style="margin-top: -10px;">
                            <a class="nav-link " href="{{ url('/faculty/profile_update/view') }}">
                                <i class="ri-bookmark-2-fill"></i></i> <span>Profile View</span>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item "  style="margin-top: -10px;">
                            <a class="nav-link " href="{{ url('/faculty/book/') }}">
                                <i class=" ri-file-paper-fill"></i></i> <span>Books</span>
                            </a>
                        </li> --}}
                        {{-- </li>
                        <li class="nav-item "  style="margin-top: -10px;">
                            <a class="nav-link " href="{{ url('/admin/course/') }}">
                                <i class=" ri-file-paper-fill"></i></i> <span>Course</span>
                            </a>
                        </li>  --}}
                        {{-- <li class="nav-item "  style="margin-top: -10px;">
                            <a class="nav-link " href="{{ url('/admin/user/') }}">
                                <i class="ri-dashboard-2-fill"></i></i> <span>Users</span>
                            </a>
                        </li> --}}

                        {{-- <li class="nav-item "  style="margin-top: -10px;">
                            <a class="nav-link " href="{{ url('/admin/about/') }}">
                                <i class=" ri-apps-2-fill"></i></i> <span>About</span>
                            </a>
                        </li>

                        <li class="nav-item "  style="margin-top: -10px;">
                            <a class="nav-link " href="{{url('/admin/teacher')}}">
                                <i class=" ri-user-3-fill"></i></i> <span>Faculty</span>
                            </a>
                        </li>

                        <li class="nav-item "  style="margin-top: -10px;">
                            <a class="nav-link " href="{{url('/admin/blog')}}">
                                <i class=" ri-user-3-fill"></i></i> <span>Blog</span>
                            </a>
                        </li>

                        <li class="nav-item "  style="margin-top: -10px;">
                            <a class="nav-link " href="{{url('/admin/attendence')}}">
                                <i class=" ri-user-3-fill"></i></i> <span>Attendence</span>
                            </a>
                        </li>

                        <li class="nav-item "  style="margin-top: -10px;">
                            <a class="nav-link " href="{{url('/admin/event')}}">
                                <i class=" ri-user-3-fill"></i></i> <span>Event</span>
                            </a>
                        </li> --}}


                         {{-- <li class="nav-item" style="margin-top: -10px;">
                            <a class="nav-link menu-link" href="#sidebarUsers" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUsers">
                                <i class="ri-settings-3-line"></i> <span data-key="t-dashboards">Faculty</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarUsers">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{url('/admin/teacher')}}" class="nav-link" data-key="t-individualuser">Teacher</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="/admin/organization-user" class="nav-link" data-key="t-organizationuser">Organization</a>
                                    </li> 
                                </ul>
                            </div>
                        </li> --}}

                        {{-- <li class="nav-item" style="margin-top: -10px;">
                            <a class="nav-link " href="{{ url('/admin/settings') }}">
                                <i class=" ri-settings-5-line"></i></i> <span>Settings</span>
                            </a>
                        </li> --}}






                    </ul>

                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">


                    <div class="row">
                        <div class="col">

                            @yield('content')

                        </div> <!-- end col -->


                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Usman.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Usman
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-primary btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->



    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    {{-- <script src="{{ asset('assets/bootstrap/datatables.bootstrap5.min.js') }}"></script> --}}

    {{-- jquery 3.5.1 --}}
    {{-- <script src="{{ asset('assets/jquery/jquery-3.5.1.js') }}"></script> --}}
    <!-- apexcharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
    <!-- ckeditor -->
    <script src="{{ asset('assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js" async></script>



</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Sep 2022 15:02:13 GMT -->

</html>
