@yield('css')
<!-- Layout config Js -->
<script src="{{ URL::asset('assets/dashboard/js/layout.js') }}"></script>
<!-- Bootstrap Css -->
<link href="{{ URL::asset('assets/dashboard/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('assets/dashboard/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('assets/dashboard/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{ URL::asset('assets/dashboard/css/custom.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

<link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />

@stack('styles')
{{-- @yield('css') --}}
