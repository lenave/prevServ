@extends('layouts.app')

@section('title', 'Ticket #' . $ticket)

@push('scripts')
    <script src="{{ asset('assets/js/core/Ticket.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/ticket.page.js') }}" type="text/javascript"></script>

@endpush

@section('content')

    @modal(['id' => 'modal_Change_Status', 'title' => 'Alterar status', 'close' => 'Fechar', 'button' => 'Alterar status', 'button_id' => 'btn_Change_Status'])
        <select id="dpl_Status" class="form-control">
            <option value="2" selected>Em progresso</option>
            <option value="4">Finalizar</option>
        </select>
    @endmodal

    @modal(['id' => 'modal_Add_Comment', 'title' => 'Adicionar comentário', 'close' => 'Fechar', 'button' => 'Adicionar', 'button_id' => 'btn_Add_Comment'])
        <textarea class="form-control" id="textarea_Comment" cols="20" rows="10" placeholder="Escreve um comentário..." style="resize: none;"></textarea>
    @endmodal

    <div class="app-content content">
        <div class="content-wrapper content-dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert mb-2 alert-message" role="alert" style="display: none;">
                        <button type="button" class="close" data-dismiss="alertMessage" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="alert-text"></div>
                    </div>
                </div>
            </div>

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0 d-inline-block">Ticket #<span id="lbl_TicketID"></span></h3>
                </div>

                <div class="content-header-right col-md-6 col-12 mb-2">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-primary round dropdown-toggle dropdown-menu-right" id="btn_Actions" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Configurações</button>
                        <div class="dropdown-menu" aria-labelledby="btn_Actions" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="#!" data-open-modal="modal_Change_Status">Alterar status</a>
                            <a class="dropdown-item" href="#!" data-open-modal="modal_Add_Comment">Adicionar comentário</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <div class="row" style="margin-bottom: 15px;">
                    <div class="col-md-6">
                        @card(['title' => 'Ticket', 'classes' => 'h-100'])
                        <fieldset class="form-group">
                            <input type="hidden" id="txt_TicketID" value="{{ $ticket }}">
                            <p class="form-control-static" style="font-weight: 700;">Título</p>
                            <p id="lbl_Title"></p>
                        </fieldset>
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Status</p>
                            <p id="lbl_Status"></p>
                        </fieldset>
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Categoria</p>
                            <p id="lbl_Category"></p>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="form-control-static" style="font-weight: 700;">Criado em</p>
                                    <p id="lbl_Created"></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="form-control-static" style="font-weight: 700;">Atualizado em</p>
                                    <p id="lbl_Updated"></p>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Descrição</p>
                            <p id="lbl_Description"></p>
                        </fieldset>
                        @endcard
                    </div>

                    <div class="col-md-6">
                        @card(['title' => 'Morador e condomínio', 'classes' => 'h-100'])
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Nome do morador</p>
                            <p id="lbl_D_Name"></p>
                        </fieldset>
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Documento do morador</p>
                            <p id="lbl_D_Document"></p>
                        </fieldset>
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Contato</p>
                            <div id="list_D_Contacts"></div>
                        </fieldset>
                        <fieldset class="form-group">
                            <p class="form-control-static" style="font-weight: 700;">Endereço</p>
                            <p id="lbl_D_Address"></p>
                            <p id="lbl_D_Number"></p>
                        </fieldset>
                        @endcard
                    </div>
                </div>

                <div class="row" id="div_Map" style="display: none;">
                    <div class="col-md-12">
                        @card(['title' => 'Mapa'])
                        <div id="map" class="map"></div>
                        @endcard
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @card(['title' => 'Comentários'])
                        <div class="chat-application">
                            <div class="chats"></div>
                        </div>
                        @endcard
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

