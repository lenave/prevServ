<!DOCTYPE html>
<html class="loading" lang="{{ app()->getLocale() }}" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Vegas Card do Brasil">
    <title>PrevServ - @yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon-32.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.4.93/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('app-assets/fonts/line-awesome/css/line-awesome.css') }}">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/daterange/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/pickers/daterange/daterange.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.css') }}">

    @stack('styles')

    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-primary navbar-shadow">
    <div id="alert_Sound"></div>
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mr-auto">

                    <a class="navbar-brand" href="">
                        <img class="brand-logo" alt="modern admin logo" src="{{ asset('app-assets/images/logo/logo.png') }}">
                        <h3 class="brand-text">PrevServ</h3>
                    </a>
                </li>

                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                                class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li>
                        <h3 class="content-header-title mb-0 d-inline-block white">@yield('title')</h3>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <!--<li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                            <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">Notificações</span>
                                </h6>
                                <span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span>
                            </li>
                            <li class="scrollable-container media-list w-100 ps-container ps-theme-dark">
                                <a href="#!">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="media-heading">You have new order!</h6>
                                            <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <small>
                                                <time class="media-meta text-muted">30 minutes ago</time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>-->
                    <li class="dropdown dropdown-user nav-item">
                        <a class="nav-link white" href="" id="btn_Logout">
                            <i class="ft-power"></i> Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header">
                <span>Principais</span>
            </li>


            <li class="nav-item">
                <a href="{{ route('home') }}">
                    <i class="mdi mdi-map-marker-multiple"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="badge badge badge-primary badge-pill float-right mr-2">Novo</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#">
                    <i class="mdi mdi-briefcase-plus"></i>
                    <span class="menu-title">Cadastros</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('create.agent') }}">Agentes</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('create.condominium') }}">Condomínios</a>
                    </li>
                </ul>
            </li>

            <li class="navigation-header">
                <span>Funções</span>
            </li>

            <li class="nav-item">
                <a href="{{ route('tickets') }}">
                    <i class="mdi mdi-ticket-outline"></i>
                    <span class="menu-title">Tickets</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('soon') }}">
                    <i class="mdi mdi-ticket"></i>
                    <span class="menu-title">Liberações</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('soon') }}">
                    <i class="mdi mdi-chart-line"></i>
                    <span class="menu-title" >Relatórios</span>
                </a>
            </li>

        </ul>
    </div>
</div>