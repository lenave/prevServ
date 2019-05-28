@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
@endpush

@push('scripts')
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
    <script src="{{ asset('assets/js/core/Ticket.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/home.page.js') }}"></script>

@endpush


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
                    @card(['classesBody' => 'p-0'])
                    <div id="map" style="width: 100%; height: 530px;"></div>
                    @endcard

                </div>
            </div>

            <div class="card-inline-scroll" id="panic_Alert_List"></div>
        </div>
    </div>
</div>
@endsection

