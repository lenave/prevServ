@extends('layouts.app')

@section('title', 'Cadastrar agente')

@push('styles')

    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">

@endpush

@push('scripts')

    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>


    <script>
        $(".select2").select2({
            placeholder: "Select a state"
        });
    </script>
@endpush



@section('content')
    <div class="app-content content">
        <div class="content-wrapper content-dashboard">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0 d-inline-block">Cadastrar morador</h3>
                    <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                </div>

                <div class="content-header-right col-md-6 col-12">
                    <div class="dropdown float-md-right">

                    </div>
                </div>
            </div>

            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content show">
                                <div class="card-body">
                                    <div class="row mb-1">
                                        <div class="col 12">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> Informações pessoais</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="fullname">Nome completo</label>
                                                            <input type="text" id="fullname" class="form-control" placeholder="Digite o nome completo" name="fullname">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="cpf">CPF</label>
                                                            <input type="text" id="cpf" class="form-control" placeholder="Somente números" name="cpf">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col 12">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> Condomínio</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="fullname">Escolha o condomínio</label>
                                                            <select class="select2 form-control">
                                                                <option value="tp">Two Pines</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col 12">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> Contato</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mobile">Celular</label>
                                                            <input type="text" id="mobile" class="form-control" placeholder="Somente números" name="mobile">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">E-mail</label>
                                                            <input type="text" id="email" class="form-control" placeholder="Ex: agente@prevserv.com.br" name="email">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col 12">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button class="btn btn-info">Criar morador</button>
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
            </div>
        </div>
    </div>
@endsection

