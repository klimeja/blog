function switchpage(kategorie,celkem, od){
    var animate = $('#clanky').animate({opacity: 0}
        , 250, function () {
        });
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=setTimeout(function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("clanky").innerHTML=xmlhttp.responseText;
            $('article').readmore({
                speed: 800,
                collapsedHeight: 200,
                moreLink: '<a  href="#"><span class="more"> přečíst více </span></a>',
                lessLink: '<a  href="#"><span class="more"> zmenšit </span></a>'
                })
        }
    },250);
    xmlhttp.open("GET","articles.php?kategorie="+kategorie+"&celkem="+celkem+"&od="+od,true);
    $('#clanky').css({'visibility': 'visible'}).animate({opacity: 1});
    xmlhttp.send(null);
}