<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="#">PrevServ </a>, Todos direitos reservados. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Feito com <i class="ft-heart pink"></i></span>
    </p>
</footer>


<!-- BEGIN VENDOR JS-->
<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
<!-- END VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.time.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/legacy.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/daterange/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ asset('app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/js/core/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/prototype/jquery.plugins.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/ErrorResponser.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/Cookies.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/Auth.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/app.js') }}" type="text/javascript"></script>
<!-- END MODERN JS-->

<!-- BEGIN PAGE LEVEL JS-->
<script>
    $(document).on('click', '[data-dismiss=alertMessage].close', function (e) {
        e.preventDefault();

        $(this).closest('.alert').fadeOut();
    });

    $(document).on('click', '#btn_Logout', function (e) {
        e.preventDefault();

        var auth = new Auth(window.API_URL);
        auth.logout();
    });
</script>
@stack('scripts')
<script src="{{ asset('assets/js/core/Websocket.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->




</body>
</html>