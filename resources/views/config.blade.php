@extends('layouts.app')

@section('title', 'Configurações')



@section('content')
    <div class="app-content content">
        <div class="content-wrapper content-dashboard">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0 d-inline-block">Altere seus dados</h3>
                    <h6>Tem algo errado? É só alterar aqui embaixo</h6>
                </div>

                <div class="content-header-right col-md-6 col-12">
                    <div class="dropdown float-md-right">

                    </div>
                </div>
            </div>

            <div class="content-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                            <h1 class="display-4"><i class="icon-bulb font-large-2"></i> R$ 0,00</h1>
                                            <span>Disponível</span>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                            <h1 class="display-4"><i class="icon-bulb font-large-2"></i> R$ 0,00</h1>
                                            <span>Em transferência</span>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12 text-center">
                                            <h1 class="display-4"><i class="icon-bulb font-large-2"></i> R$ 133,39</h1>
                                            <span>Lançamentos Futuros</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Total Booking</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body pt-0">
                                    <div class="row mb-1">
                                        <div class="col-6 col-md-4">
                                            <h5>Current year</h5>
                                            <h2 class="info">$1,45,490</h2>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <h5>Previous year</h5>
                                            <h2 class="text-muted">$67,690</h2>
                                        </div>
                                    </div>
                                    <div class="chartjs">
                                        <canvas id="thisYearRevenue" width="400" style="position: absolute;"></canvas>
                                        <canvas id="lastYearRevenue" width="400"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

