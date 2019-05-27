@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
@endpush

@push('scripts')
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
    <script>
        window.map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([-47.335612, -22.745809]),
                zoom: 15
            })
        });



        var iconFeatures=[];

        var iconFeature = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.transform([-47.335612, -22.745809], 'EPSG:4326',
                'EPSG:3857')),
            name: 'Null Island',
            population: 4000,
            rainfall: 500
        });

        iconFeatures.push(iconFeature);

        var vectorSource = new ol.source.Vector({
            features: iconFeatures //add an array of features
        });

        var iconStyle = new ol.style.Style({
            image: new ol.style.Icon(({
                anchor: [0.5, 46],
                anchorXUnits: 'fraction',
                anchorYUnits: 'pixels',
                opacity: 1,
                src: '{{ asset('assets/images/dweller-marker.png') }}'
            }))
        });


        var vectorLayer = new ol.layer.Vector({
            source: vectorSource,
            style: iconStyle
        });

        window.map.addLayer(vectorLayer);
    </script>

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
                <div class="col-md-8">
                    <div id="map" style="width: 100%; height: 530px;"></div>
                </div>

                <div class="col-md-4">
                    @card()
                    a
                    @endcard
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

