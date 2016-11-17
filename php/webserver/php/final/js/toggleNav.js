/**
 * Created by Thomas X on 11/3/2016.
 */
var toggle = true
function togglefunction() {
    if (toggle) {
        document.getElementById("nav-toggle").className = "nav-toggle is-active";
        document.getElementById("nav-menu").className = "nav-right nav-menu is-active";
        document.querySelectorAll(".nav-menu a").forEach(function(element) {
            element.className = "nav-item is-yesactive";
        });
    }
    else {
        document.getElementById("nav-toggle").className = "nav-toggle";
        document.getElementById("nav-menu").className = "nav-right nav-menu";

        document.querySelectorAll(".nav-menu a").forEach(function(element) {
            element.className = "nav-item is-noactive";
        });
    }
    toggle = !toggle;
}