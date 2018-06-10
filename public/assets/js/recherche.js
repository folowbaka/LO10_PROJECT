$(document).ready(function(){

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