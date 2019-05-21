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
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}">
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
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
                        <h3 class="content-header-title mb-0 d-inline-block white">Home</h3>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="nav-link white" href="">
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
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">Novo</span>
                </a>
            </li>

            <li class="nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title">Cadastros</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('create.agent') }}" data-i18n="nav.project.project_summary">Cadastro de agentes</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('create.condominium') }}" data-i18n="nav.project.project_tasks">Cadastro de condomínios</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('create.dweller') }}" data-i18n="nav.project.project_bugs">Cadastro de moradores</a>
                    </li>
                    <!--<li><a class="menu-item" href="#" data-i18n="nav.project.project_bugs">Cadastro de grupos</a>
                    </li>-->
                </ul>
            </li>


            <li class="navigation-header">
                <span>Funções</span>
            </li>

            <li class="nav-item">
                <a href="{{ route('tickets') }}">
                    <i class="la la-users"></i>
                    <span class="menu-title">Últimos chamados</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('soon') }}">
                    <i class="la la-shopping-cart"></i>
                    <span class="menu-title" >Relatórios gerais</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('soon') }}">
                    <i class="la la-file-text-o"></i>
                    <span class="menu-title">Serviços agendados</span>
                </a>
            </li>

        </ul>
    </div>
</div>