@extends('layouts.app')

@section('title', 'Tickets')

@push('scripts')
    <script type="text/javascript" src="{{ asset('app-assets/vendors/js/pagination/jquery.bootpag.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app-assets/vendors/js/pagination/jquery.twbsPagination.min.js') }}"></script>

    <script src="{{ asset('assets/js/core/Ticket.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/tickets.page.js') }}" type="text/javascript"></script>

@endpush

@section('content')
<div class="app-content content">
    <div class="content-wrapper content-dashboard">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0 d-inline-block">@yield('title')</h3>
                <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
            </div>

            <div class="content-header-right col-md-6 col-12">
                <div class="dropdown float-md-right">

                </div>
            </div>
        </div>

        <div class="content-body">
            <section class="row">
                <div class="col-sm-12">
                    <div class="alert mb-2 alert-message" role="alert" style="display: none;">
                        <button type="button" class="close" data-dismiss="alertMessage">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="alert-text"></div>
                    </div>

                    @card(['classesBody' => 'p-1', 'style' => 'display:none;'])
                    <div class="row">
                        <div class="col-md-3">
                            <fieldset class="form-group mb-md-0">
                                <input type="text" class="form-control" placeholder="Pesquise por nome ou CPF..." id="txt_Query">
                            </fieldset>
                        </div>

                        <div class="col-md-2">
                            <fieldset class="form-group mb-md-0">
                                <select class="form-control" id="dpl_Type">
                                    <option value="1">CPF</option>
                                    <option value="2">Nome</option>
                                </select>
                            </fieldset>
                        </div>

                    </div>
                    @endcard

                </div>
            </section>

            <section class="row">
                <div class="col-sm-12">
                    @card(['classesBody' => 'p-0', 'classes' => 'card-list'])
                    <div class="table-responsive">
                        <table class="table" id="table_Tickets">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Título</th>
                                <th>Status</th>
                                <th>Categoria</th>
                                <th>Criado</th>
                                <th>Atualizado</th>
                            </tr>
                            </thead>
                            <tbody></tbody>

                        </table>

                        <div class="table-footer">
                            <input type="hidden" id="txt_Current_Page" value="1">
                            <ul class="pagination pagination-flat pagination-round tickets-pagination"></ul>
                        </div>
                    </div>
                    @endcard

                    <div class="text-center" id="empty_Tickets" style="display: none;">
                        <i class="mdi mdi-cloud-question" style="font-size: 62px;"></i>
                        <p style="font-size: 24px;">Nenhum dado encontrado</p>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
@endsection

