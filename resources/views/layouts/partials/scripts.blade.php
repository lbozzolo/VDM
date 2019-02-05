<!-- plugins:js -->
<script src="{{ asset('staradmin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('staradmin/vendors/js/vendor.bundle.addons.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('staradmin/js/off-canvas.js') }}"></script>
<script src="{{ asset('staradmin/js/misc.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('staradmin/js/dashboard.js') }}"></script>
<!-- End custom js for this page-->

<script src="{{ asset('datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('datepicker/locales/bootstrap-datepicker.es.js') }}"></script>

<script type="text/javascript" src="{{ asset('selectize/dist/js/selectize.js') }}"></script>

@yield('js')
