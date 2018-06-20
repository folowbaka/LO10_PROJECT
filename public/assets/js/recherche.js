var map;
$(document).ready(function(){
    /*
     * Display a map
     */
    // Layers
    var bgLayer = new ol.layer.Tile({
        source: new ol.source.OSM()
    });
    var fgLayer = new ol.layer.Vector({
        source: new ol.source.Vector({}),
        updateWhileInteracting: true,
        updateWhileAnimating: true,
        zIndex: 100,
    });

    // Map center
    var regions = {
        'alsace': [3, 46.5],
        'aquitaine': [3, 46.5],
        'auvergne': [3, 46.5],
        'basse-normandie': [3, 46.5],
        'bourgogne': [3, 46.5],
        'bretagne': [3, 46.5],
        'centre': [3, 46.5],
        'champagne-ardenne': [3, 46.5],
        'corse': [3, 46.5],
        'franche-comte': [3, 46.5],
        'haute-normandie': [3, 46.5],
        'ile-de-france': [3, 46.5],
        'languedoc-rousillon': [3, 46.5],
        'limousin': [3, 46.5],
        'lorraine': [3, 46.5],
        'midi-pyrenees': [3, 46.5],
        'nord-pas-de-calais': [3, 46.5],
        'pays-de-la-loire': [3, 46.5],
        'picardie': [3, 46.5],
        'poitou-charentes': [3, 46.5],
        'provence-alpes-cote-dazur': [3, 46.5],
        'rhone-alpes': [3, 46.5]
    };
    var center = regions[$("#zoneSelect").val()];
    var zoom = center ? 8 : 6;
    center = center || [3, 46.5];

    var style = new ol.style.Style({
        fill: new ol.style.Fill({
            color: 'rgba(' +  [102, 51, 153].join(', ') + ', 0.2)',
        }),
        stroke: new ol.style.Stroke({
            color: 'rebeccapurple',
            width: 2,
        }),
        image: new ol.style.Circle({
            radius: 6,
            fill: new ol.style.Fill({
                color: 'rebeccapurple',
            }),
            stroke: new ol.style.Stroke({
                color: 'white',
                width: 1,
            }),
        }),
    });

    map = new ol.Map({
        target: 'map',
        controls: [],
        layers: [bgLayer, fgLayer],
        view: new ol.View({
            projection: ol.proj.get('EPSG:3857'),
            // Center to Metropolitan France
            center: ol.proj.fromLonLat(center),
            zoom: 6,
            // Limit zoom levels
            minZoom: 3,
            maxZoom: 17,
        }),
    });

    var listTable = document.querySelector('#listTable');
    listTable = JSON.parse(listTable.dataset.tablesResearched);
    listTable.forEach(function (t) {
        var id = t[0], name = t[1], zip = t[2], uri = t[3];
        fetch('https://geo.api.gouv.fr/communes?fields=nom,centre&format=json&geometry=centre&codePostal=' + zip)
        .then(function (res) { return res.json(); })
        .then(function (commune) {
            var city = commune[0].nom;
            var feat = commune[0].centre;
            var olFeat = new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.transform(feat.coordinates, 'EPSG:4326','EPSG:3857')),
                name: name
            });
            olFeat.setStyle(style);
            fgLayer.getSource().addFeature(olFeat);
        });
    });


    $("#rechercheTableForm").submit(function(event){

        var urlForm=$(this).attr("action");
        var urlSplit=urlForm.split("/");
        var tailleUrl=urlSplit.length;
        console.log($("#zoneSelect").val());
        if(urlSplit[tailleUrl-1]!=$("#zoneSelect").val())
        {
            if($("#zoneSelect").val()=="france" || $("#zoneSelect").val()=="near")
            {
                if(tailleUrl==5)
                {
                    urlForm = urlForm.replace(urlSplit[tailleUrl - 2], $("#zoneSelect").val());
                    urlForm = urlForm.replace("/"+urlSplit[tailleUrl - 1],"");
                }
                else
                {
                    urlForm = urlForm.replace(urlSplit[tailleUrl - 1], $("#zoneSelect").val());
                }
            }
            else
            {
                if(tailleUrl==4)
                    urlForm+="/"+$("#zoneSelect").val();
                else if(tailleUrl==5 && urlSplit[tailleUrl-2]==$("#zoneSelect").val())
                    urlForm=urlForm.replace("/"+urlSplit[tailleUrl-1],"");
                else
                    urlForm=urlForm.replace(urlSplit[tailleUrl-1],$("#zoneSelect").val())
            }

            $(this).attr("action",urlForm);
        }
    });
    autocompleteCity(document.getElementById("inputSearchVilleCp"));
});
