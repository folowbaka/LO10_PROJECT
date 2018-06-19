$(document).ready(function(){

    showPreview=false;
    edit=false;
    $("#editJeuBtn").click(function (event) {
        if(!edit) {
            $("#jeuDescription").hide();
            $("#markdownEditArea").show();
            edit=true;
        }
        else
        {
            $("#markdownEditArea").hide();
            $("#jeuDescription").show();
            edit=false;
        }

    });
    $("#previewMarkBtn").click(function (event) {


        if(!showPreview)
        {
            var description = $("#textareaMarkdown").val();
            var body = JSON.stringify({"text": description, "mode": "gfm"});
            xmlhttp.open('post', "https://api.github.com/markdown");
            xmlhttp.setRequestHeader("Accept", "text/html");
            xmlhttp.setRequestHeader("Content-Type", "application/json");
            xmlhttp.onload = function () {
                var response = xmlhttp.responseText;
                console.log(response);
                $("#previewMarkdown").html(response);
            };
            xmlhttp.send(body);
            $("#textareaMarkdown").hide();
            $("#validationEditJeuBtn").hide();
            $("#previewMarkdown").show();
            showPreview=true;
            $(this).text("Retourner");
        }
        else
        {
            showPreview=false;
            $(this).text("Preview")
            $("#previewMarkdown").hide();
            $("#textareaMarkdown").show();
            $("#validationEditJeuBtn").show();

        }
    });
    $("#validationEditJeuBtn").click(function (event) {

        var bout=document.getElementById('validationEditJeuBtn');
        var uri=bout.dataset.uriEdit;
        var description=$("#textareaMarkdown").val();
        console.log(description);
        xmlhttp.open('post',uri);
        xmlhttp.setRequestHeader("Accept","text/html");
        xmlhttp.onload = function () {
            var response = xmlhttp.responseText;
            console.log(response);
        };
        xmlhttp.send(description);
    });

});