@extends('layouts.app')

@section('title', 'Cadastrar condomínio')



@section('content')
    <div class="app-content content">
        <div class="content-wrapper content-dashboard">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0 d-inline-block">Cadastrar condomínio</h3>
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
                                                <h4 class="form-section"><i class="ft-user"></i> Informações principais</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Nome do condomínio</label>
                                                            <input type="text" id="name" class="form-control" placeholder="Ex: Two Pine" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="cnpj">CNPJ</label>
                                                            <input type="text" id="cnpj" class="form-control" placeholder="Somente números" name="cnpj">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col 12">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> Endereço</h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="autocomplete">Digite o endereço</label>
                                                            <input type="text" id="autocomplete" class="form-control" placeholder="Comece a digitar o endereço..." name="autocomplete">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="address">Logradouro</label>
                                                            <input type="text" id="address" class="form-control" placeholder="" name="address" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="number">Número</label>
                                                            <input type="text" id="number" class="form-control" placeholder="" name="number" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="neighborhood">Bairro</label>
                                                            <input type="text" id="neighborhood" class="form-control" placeholder="" name="neighborhood" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="city">Cidade</label>
                                                            <input type="text" id="city" class="form-control" placeholder="" name="city" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="state">Estado</label>
                                                            <input type="text" id="state" class="form-control" placeholder="" name="state" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="zipcode">CEP</label>
                                                            <input type="text" id="zipcode" class="form-control" placeholder="" name="zipcode" readonly>
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
                                                        <button class="btn btn-info">Criar condomínio</button>
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

