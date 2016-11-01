/**
 * Created by Thomas X on 11/1/2016.
 */
var toggle = 1;

function openorcloseNav() {
    if (toggle == 1) {

        document.getElementById("sideNav").style.width = "250px";
        toggle = 0;
    }
    else {

        document.getElementById("sideNav").style.width = "0";


        toggle = 1;
    }
}
