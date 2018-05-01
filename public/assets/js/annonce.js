$(document).ready(function(){

    var indexRegion=$("#listeRegion a").index($(this));
    var $region=$($(".regionSvg")[indexRegion]).children("path");
    $("#listeRegion a").hover(
        function() {
            var indexRegion=$("#listeRegion a").index($(this));
            var $region=$($(".regionSvg")[indexRegion]).children("path");
            $region.attr("fill","#343a40");
        }, function() {
            var indexRegion=$("#listeRegion a").index($(this));
            var $region=$($(".regionSvg")[indexRegion]).children("path");
            $region.attr( "fill","#8052be" );
        }
    );
    $(".regionSvg path").hover(
        function() {
            var indexRegion=$(".regionSvg path").index($(this));
            var $region=$($("#listeRegion a")[indexRegion]);
            $region.css("color","#343a40");
            $region.css("text-decoration","underline")

        }, function() {
            var indexRegion=$(".regionSvg path").index($(this));
            var $region=$($("#listeRegion a")[indexRegion]);
            $region.css( "color","#8052be" );
            $region.css("text-decoration","none")
        }
    );


});