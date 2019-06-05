@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
@endpush

@push('scripts')
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
    <script src="{{ asset('assets/js/core/Ticket.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/home.page.js') }}?v=0.0.1"></script>

@endpush


@section('content')

<!-- Modal -->
<div class="modal fade text-left" id="modal_Open_Panic" role="dialog" aria-labelledby="modal_Open_Panic" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alerta de pânico</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="line-height: 1.30;">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Título</p>
                            <p id="lbl_Title"></p>
                        </fieldset>

                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Categoria</p>
                            <p id="lbl_Category"></p>
                        </fieldset>

                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Criado em</p>
                            <p id="lbl_Created"></p>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Status</p>
                            <p id="lbl_Status"></p>
                        </fieldset>
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Descrição</p>
                            <p id="lbl_Description"></p>
                        </fieldset>
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Atualizado em</p>
                            <p id="lbl_Updated"></p>
                        </fieldset>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Nome do morador</p>
                            <p id="lbl_D_Name"></p>
                        </fieldset>
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Contato</p>
                            <div id="list_D_Contacts"></div>
                        </fieldset>
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Condomínio</p>
                            <p id="lbl_C_Name"></p>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Documento do morador</p>
                            <p id="lbl_D_Document"></p>
                        </fieldset>
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Endereço</p>
                            <p id="lbl_D_Address"></p>
                            <p id="lbl_D_Number"></p>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-hover grey btn-outline-secondary" data-dismiss="modal">Fechar</button>
                <a class="btn btn-primary" href="#!" id="ancor_Open_Ticket">Abrir ticket</a>
            </div>
        </div>
    </div>
</div>

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
                    @card(['classesBody' => 'p-0'])
                    <div id="map" style="width: 100%; height: 530px;"></div>
                    @endcard

                </div>
            </div>

            <div class="card-inline-scroll" id="panic_Alert_List"></div>
            
            <div id="empty_Panic" class="text-center" style="display: none;">
                <img src="{{ asset('assets/images/shield.png') }}" alt="ProCreate tudo em orderm" style="max-width: 100px;display: block;margin:auto auto 15px auto;">
                <h2>Tudo em ordem</h2>
            </div>
        </div>
    </div>
</div>
@endsection

