/**
 * Created by klimic on 25.4.15.
 */
function getVote(int) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest()
    }
    else {
        xmlhttp = new ActiveXObject("MICROSOFT.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("poll").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","poll.php?vote="+int,true);
    xmlhttp.send();
}