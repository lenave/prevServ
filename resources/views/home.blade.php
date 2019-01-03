@extends('layouts.app')

@section('title', 'Home')

@section('pagescript')

    <script>
        L.mapquest.key = 'Hf335C31jFhZCfl3fcYghVvZqYG3mZEd';

        // 'map' refers to a <div> element with the ID map
        L.mapquest.map('map', {
            center: [-22.750033, -47.317465],
            layers: L.mapquest.tileLayer('map'),
            zoom: 15
        });
    </script>

@endsection


@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <!--<div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0 d-inline-block">Bem-vindo, humano</h3>
                <h6>Escolha uma das funções abaixo e seja feliz</h6>
            </div>
        </div>-->

        <div class="content-body">
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-md-12">
                    <div id="map" style="width: 100%; height: 530px;"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">Chamados ativos</h4>


                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="font-weight-bold">Morador</label>
                                        <p>Ricardo Alcântara</p>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="font-weight-bold">Status</label>
                                        <br>
                                        <div class="badge badge-danger">
                                            Vermelho
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="font-weight-bold">Áudio</label>
                                        <p>
                                            <a href=""><i class="la la-play-circle la-3x"></i></a>
                                        </p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="font-weight-bold">Telefone</label>
                                        <p>19 99694-1420</p>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="font-weight-bold">Incidente</label>
                                        <p>R. da Blenda, 206</p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="font-weight-bold">Condomínio</label>
                                        <p>Montes Claros</p>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="font-weight-bold">Cidade</label>
                                        <p>Ribeirão Preto</p>
                                    </div>
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

