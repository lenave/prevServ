@extends('layouts.app')

@section('title', 'Cadastrar condomínio')



@section('content')
    <div class="app-content content">
        <div class="content-wrapper content-dashboard">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0 d-inline-block">Chamado #5</h3>
                    <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                </div>

                <div class="content-header-right col-md-6 col-12">
                    <div class="dropdown float-md-right">

                    </div>
                </div>
            </div>

            <div class="content-body">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <div class="card activated">
                            <div class="card-header">
                                <h2 class="card-title">
                                    <i class="ft-lock"></i> Chamado #5
                                </h2>
                            </div>
                            <div class="card-body">
                                <h4>Categoria: Liberar acesso <a href="#" class="text-light"><i class="ft-star font-medium-3 text-light float-right"></i></a></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <button class="btn btn-success mr-1"><i class="la la-check ticket-options-icon align-middle"></i>
                                    Gerar Qrcode
                                </button>

                                <button class="btn btn-warning"><i class="la la-times ticket-options-icon align-middle"></i>
                                    Reprovar
                                </button>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media-list media-bordered">
                                            <div class="media">
                                                <div class="media-body">
                                                    <a href="#" class="text-light float-right ticket-options-icon">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                    <a href="#" class="text-light ticket-options-icon float-right">
                                                        <i class="ft-star"></i>
                                                    </a>
                                                    <a href="#" class="float-right ticket-options-icon text-light">
                                                        <i class="la la-pencil"></i>
                                                    </a>
                                                    <h2 class="mt-0">Nome do morador</h2>
                                                    <span class="text-light">25/01/2019</span>
                                                    <h4 class="mt-2">Liberar acesso para</h4>
                                                    <p>
                                                        José da Silva
                                                    </p>
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            CPF: xxx.xxx.xxx-xx
                                                        </li>
                                                        <li>
                                                            CNH:
                                                        </li>
                                                        <li>
                                                            <img style="max-width: 100%;" src="{{ asset('uploads/image.jpg') }}" alt="">
                                                        </li>
                                                    </ul>
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

