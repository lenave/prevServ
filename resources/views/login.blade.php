
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Login Operador</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.4.93/css/materialdesignicons.min.css">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/login-register.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <div class="p-1">
                                        <img src="{{ asset('app-assets/images/logo/logo-png.png') }}" style="max-width: 100px;" alt="">
                                    </div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Login Operador</span></h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="alert alert-message mb-2" role="alert" style="display: none;">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <div class="alert-text"></div>
                                    </div>
                                    <form id="form_Login">
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control form-control-lg input-lg" id="txt_User" placeholder="Digite seu login">
                                            <div class="form-control-position" style="top:0;">
                                                <i class="mdi mdi-account"></i>
                                            </div>
                                        </div>
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control form-control-lg input-lg" id="txt_Password"
                                                   placeholder="Digite a senha" >
                                            <div class="form-control-position" style="top:0;">
                                                <i class="mdi mdi-key"></i>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-lg btn-block m-0"><i class="ft-unlock"></i> Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN VENDOR JS-->
<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('assets/js/core/app.js') }}"></script>
<script src="{{ asset('assets/js/core/prototype/jquery.plugins.js') }}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app.js') }}"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('assets/js/core/Cookies.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/Auth.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/ErrorResponser.js') }}" type="text/javascript"></script>
<script>
    $('#form_Login').on('submit', function (e) {
        e.preventDefault();
        var btn = $(this).find('button[type=submit]');
        var user = $('#txt_User');
        var password = $('#txt_Password');
        var isOK = true;
        $('.alert-message').hide();
        if ($.trim(user.val()) == '') {
            isOK = false;
            user.addClass('has-danger');
        } else {
            user.removeClass('has-danger');
        }
        if ($.trim(password.val()) == '') {
            isOK = false;
            password.addClass('has-danger');
        } else {
            password.removeClass('has-danger');
        }
        if (isOK) {
            var auth = new Auth(window.API_URL);
            $.alertMessage('info', 'Fazendo login...');
            auth.login($.trim(user.val()), $.trim(password.val()), function (response) {
                if (response.status == 200) {
                    if (response.data.token != undefined && response.data.user != undefined) {
                        var c = {
                            user_id: response.data.user.user_id,
                            login: response.data.user.login,
                            guard: response.data.user.guard,
                            token: response.data.token.access_token,
                            _token: '{{ csrf_token() }}'
                        };
                        var cookie = new Cookies('{{ route('cookies.set') }}');
                        cookie.set(c, function (_response) {
                            console.log(_response);
                            if (_response.status == 200) {
                                localStorage.setItem('login', response.data.user.login);
                                window.location.href = '{{ route('home') }}';
                            }
                        });
                    } else {
                        $('#lbl_Error').html('Não conseguimos registrar a sessão.<br>Dica: Tente usar outro navegador.');
                        $('#alert_Danger').show();
                    }
                }
            }, btn);
        }
    });
</script>
<!-- END PAGE LEVEL JS-->
</body>
</html>