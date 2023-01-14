<script src="{{ URL::asset('assets/dashboard/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/dashboard/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/dashboard/libs/node-waves/node-waves.min.js') }}"></script>
<script src="{{ URL::asset('assets/dashboard/libs/feather-icons/feather-icons.min.js') }}"></script>
<script src="{{ URL::asset('assets/dashboard/js/pages/plugins/lord-icon-2.1.0.min.js') }}"></script>
<script src="{{ URL::asset('assets/dashboard/js/plugins.min.js?v=1') }}"></script>
@yield('script')
@yield('script-bottom')
@stack('scripts')
