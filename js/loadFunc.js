/**
 * Created by Thomas on 11/3/2016.
 */

var timeOut;

function loadFunc() {
    timeOut = setTimeout(showPage, 300);

}

function showPage() {
    document.getElementById("loaderawesomeness").style.opacity = "0";
    document.getElementById("loaderawesomeness").style.display = "none";
    document.getElementById("page").style.display = "block";
}
