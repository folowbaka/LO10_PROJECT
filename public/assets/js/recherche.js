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
        'alsace': [0, 0],
        'aquitaine': [0, 0],
        'auvergne': [0, 0],
        'basse-normandie': [0, 0],
        'bourgogne': [0, 0],
        'bretagne': [0, 0],
        'centre': [0, 0],
        'champagne-ardenne': [0, 0],
        'corse': [0, 0],
        'franche-comte': [0, 0],
        'haute-normandie': [0, 0],
        'ile-de-france': [0, 0],
        'languedoc-rousillon': [0, 0],
        'limousin': [0, 0],
        'lorraine': [0, 0],
        'midi-pyrenees': [0, 0],
        'nord-pas-de-calais': [0, 0],
        'pays-de-la-loire': [0, 0],
        'picardie': [0, 0],
        'poitou-charentes': [0, 0],
        'provence-alpes-cote-dazur': [0, 0],
        'rhone-alpes': [0, 0]
    };
    var center = regions[$("#zoneSelect").val()];
    var zoom = center ? 8 : 6;
    center = center || [3, 46.5];

    var map = new ol.Map({
        target: 'map',
        controls: [],
        layers: [bgLayer, fgLayer],
        view: new ol.View({
            projection: ol.proj.get('EPSG:3857'),
            // Center to Metropolitan France
            center: ol.proj.fromLonLat(center),
            zoom: zoom,
            // Limit zoom levels
            minZoom: 3,
            maxZoom: 17,
        }),
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