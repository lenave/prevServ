$(function () {
    window.map = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            })
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([-47.335612, -22.745809]),
            zoom: 14
        })
    });

    var iconFeatures = [];
    window.vectorLayer = null;
    var cookie = new Cookies();
    cookie.get('app_id', function (c) {
        var panic = new Panic(c.token);

        panic.index(c.app_id, function (response) {
            console.log(response);
            if (response.data != undefined && response.data.length > 0) {
                $('#empty_Panic').hide();
                $.each(response.data, function (_, v) {
                    if (v.localization.longitude != undefined && v.localization.latitude != undefined) {
                        panic.build(v);

                        iconFeatures.push(
                            new ol.Feature({
                                geometry: new ol.geom.Point(ol.proj.transform([parseFloat(v.localization.longitude), parseFloat(v.localization.latitude)], 'EPSG:4326',
                                    'EPSG:3857')),
                                ticket: v.ticket_id,
                                name: '#' + v.ticket_id + ' - ' + v.name
                            })
                        );
                    }
                });

                $(document).trigger('addFeature', {iconFeatures: iconFeatures});
            } else {
                $('#empty_Panic').fadeIn();
            }
        });
    });


    window.map.on("click", function(e) {
        window.map.forEachFeatureAtPixel(e.pixel, function (feature, layer) {
            $(document).trigger('openPanicModal', {ticket_id: feature.values_.ticket});
        })
    });

    window.map.on('pointermove', function(e){
        var pixel = map.getEventPixel(e.originalEvent);
        var hit = map.hasFeatureAtPixel(pixel);
        map.getViewport().style.cursor = hit ? 'pointer' : '';
    });
});

$(document).on('addFeature', function (e,data) {
    window.vectorLayer = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: data.iconFeatures
        })
    });

    window.vectorLayer.getSource().forEachFeature(function(feature){
        style = new ol.style.Style({
            //I don't know how to get the color of your kml to fill each room
            //fill: new ol.style.Fill({ color: '#000' }),
            stroke: new ol.style.Stroke({ color: '#000' }),
            text: new ol.style.Text({
                text: feature.get('name'),
                font: '12px Calibri,sans-serif',
                fill: new ol.style.Fill({ color: '#000' }),
                stroke: new ol.style.Stroke({
                    color: '#fff', width: 2
                })
            }),
            image: new ol.style.Icon(({
                anchor: [0.5, 46],
                anchorXUnits: 'fraction',
                anchorYUnits: 'pixels',
                opacity: 1,
                src: '/assets/images/dweller-marker.png'
            }))
        });
        feature.setStyle(style);
    });

    window.map.addLayer(window.vectorLayer);
});

$(document).on('removeFeature', function (e, data) {
    var features = window.vectorLayer.getSource().getFeatures();
    features.forEach((feature) => {
        if (feature.values_.ticket == data.ticket_id) {
            window.vectorLayer.getSource().removeFeature(feature);

            if (data.refresh === true) {
                var iconFeatures = [];

                iconFeatures.push(
                    new ol.Feature({
                        geometry: new ol.geom.Point(ol.proj.transform([parseFloat(data.localization.longitude), parseFloat(data.localization.latitude)], 'EPSG:4326',
                            'EPSG:3857')),
                        ticket: data.ticket.ticket_id,
                        name: '#' + data.ticket.ticket_id + ' - ' + data.ticket.name
                    })
                );

                $(document).trigger('addFeature', {iconFeatures: iconFeatures});
            } else {
                $('[data-panic-id='+data.ticket_id+']').remove();

                if ($('[data-panic-id]').length <= 0)
                    $('#empty_Panic').fadeIn();
                else
                    $('#empty_Panic').hide();
            }
        }

    });
});

$(document).on('storeNewPanic', function (e, data) {
    var cookie = new Cookies();
    var iconFeatures = [];
    cookie.get('app_id', function (c) {
        var panic = new Panic(c.token);

        $('#empty_Panic').hide();
        panic.build(data.ticket);

        panic.show(data.ticket_id, function (response) {
            if (response.data.longitude != undefined && response.data.latitude != undefined) {
                iconFeatures.push(
                    new ol.Feature({
                        geometry: new ol.geom.Point(ol.proj.transform([parseFloat(response.data.longitude), parseFloat(response.data.latitude)], 'EPSG:4326',
                            'EPSG:3857')),
                        ticket: data.ticket.ticket_id,
                        name: '#' + data.ticket.ticket_id + ' - ' + data.ticket.name
                    })
                );

                $(document).trigger('addFeature', {iconFeatures: iconFeatures});
            }
        });
    });
});

$(document).on('click', '[data-panic-id]', function (e) {
    e.preventDefault();

    $(document).trigger('openPanicModal', {ticket_id: $(this).attr('data-panic-id')});
});

$(document).on('openPanicModal', function (e, data) {
    $('#modal_Open_Panic').modal();

    var cookie = new Cookies();
    cookie.get('user_id', function (c) {
        var ticket = new Ticket(c.token);

        ticket.show(data.ticket_id, function (response) {
            console.log(response);
            if (response.data != undefined) {
                $('#lbl_TicketID').text(response.data.ticket_id);
                $('#lbl_Title').text(response.data.name);
                $('#lbl_Description').text(response.data.description);
                $('#lbl_Status').text(response.data._status.description);
                $('#lbl_Category').text(response.data._category.description);

                created = '-';
                updated = '-';
                if (response.data.created_at != null) {
                    response.data.created_at = response.data.created_at.replace('T', ' ');
                    created = new Date(response.data.created_at);
                }
                if (response.data.updated_at != null) {
                    response.data.updated_at = response.data.updated_at.replace('T', ' ');
                    updated = new Date(response.data.updated_at);
                }

                created = created.setFullDate('full');
                updated = updated.setFullDate('full');

                $('#lbl_Created').text(created);
                $('#lbl_Updated').text(updated);

                $('#ancor_Open_Ticket').attr('href', '/tickets/' + response.data.ticket_id);
            }

            if (response.dweller != undefined) {
                $('#lbl_D_Name').text(response.dweller.name);
                $('#lbl_D_Document').text(response.dweller.document);

                if (response.dweller.addresses.length > 0)
                    $('#lbl_D_Address').text(response.dweller.addresses[0].street + ', ' + response.dweller.addresses[0].number);

                if (response.dweller.contacts.length > 0) {
                    $.each(response.dweller.contacts, function (_, v) {
                        $('#list_D_Contacts').append(
                            '<p>'+v.contact+'</p>'
                        );
                    });
                }
            }

            if (response.condominium != undefined) {
                $('#lbl_C_Name').text(response.condominium.fantasy_name);
            }
        });
    });
});