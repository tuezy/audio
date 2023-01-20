<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')| Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/dashboard/images/favicon.ico')}}">
    @include('dashboard::layouts.head-css')
</head>

@section('body')
    @include('dashboard::layouts.body')
@show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('dashboard::layouts.topbar')
        @include('dashboard::layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column justify-content-end">
                                            <div class="flex-grow-1">
                                                <h4 class="fs-16 mb-1">{{ $pageTitle ?? 'Dashboard' }}</h4>
                                            </div>
                                        </div><!-- end card header -->
                                    </div>
                                </div>
                                @yield('content')
                            </div> <!-- end .h-100-->
                        </div> <!-- end col -->
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

{{--    @include('dashboard::layouts.customizer')--}}

    <!-- JAVASCRIPT -->
    @include('dashboard::layouts.vendor-scripts')
    @include("dashboard::layouts.errors")
</body>

</html>
