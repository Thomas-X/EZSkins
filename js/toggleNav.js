/**
 * Created by Thomas X on 11/3/2016.
 */
var toggle = 1
function togglefunction() {
    if (toggle == 1) {
        document.getElementById("nav-toggle").className = "nav-toggle is-active";
        document.getElementById("nav-menu").className = "nav-right nav-menu is-active";
        document.getElementById("navitemcolor1").className = "nav-item is-yesactive";
        document.getElementById("navitemcolor2").className = "nav-item is-yesactive";
        document.getElementById("navitemcolor3").className = "nav-item is-yesactive";
        document.getElementById("navitemcolor4").className = "nav-item is-yesactive";
        document.getElementById("navitemcolor5").className = "nav-item is-yesactive";
        toggle = 0;
    }
    else {
        document.getElementById("nav-toggle").className = "nav-toggle";
        document.getElementById("nav-menu").className = "nav-right nav-menu";
        document.getElementById("navitemcolor1").className = "nav-item is-noactive";
        document.getElementById("navitemcolor2").className = "nav-item is-noactive";
        document.getElementById("navitemcolor3").className = "nav-item is-noactive";
        document.getElementById("navitemcolor4").className = "nav-item is-noactive";
        document.getElementById("navitemcolor5").className = "nav-item is-noactive";
        toggle = 1;
    }
}