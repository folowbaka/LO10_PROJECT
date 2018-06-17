$(document).ready(function(){

    $(".divScore").on("click","a",function (event) {
        event.preventDefault();
        var idParent=$(this).parent().parent().attr("id");
        var uri=$(this).attr("href");
        uri=uri.split("/");
        var vote=uri.pop();
        var id_vote=$(this).attr("href");
        sndReq(vote,idParent,id_vote);
    });
});
xmlhttp=new XMLHttpRequest();
function sndReq(vote,id_num,id_vote) {
	var theUL = document.getElementById(id_num); // the UL
	
	// switch UL with a loading div
	theUL.innerHTML = '<div class="loading"></div>';
	
	// Should put a system to retrieve the relative path for the AJAX request
    xmlhttp.open('post', 'http://scorelo10'+id_vote,true);
    xmlhttp.setRequestHeader("Accept","text/html");
    xmlhttp.onload = function () {
        var response = xmlhttp.responseText;
        changeText(id_num, response); // readyState will be 4
    };
    xmlhttp.send(null);
}


function changeText( div2show, text ) {
    // Detect Browser
    var IE = (document.all) ? 1 : 0;
    var DOM = 0; 
    if (parseInt(navigator.appVersion) >=5) {DOM=1};

    // Grab the content from the requested "div" and show it in the "container"
    if (DOM=1) {
        var viewer = document.getElementById(div2show).parentNode;
        viewer.innerHTML = text;
    }  else if(IE) {
        document.all[div2show].innerHTML = text;
    }
}

