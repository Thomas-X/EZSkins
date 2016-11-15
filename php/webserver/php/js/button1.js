/**
 * Created by user on 9-11-2016.
 */
var toggle = true;
function redButton() {
    var uberbox = document.getElementById("uberbox");
    document.getElementById("makeinvis").style.display = "none";
    if (toggle) {
        uberbox.style.transition = "3s";
        uberbox.style.display = "flex";
    } else {
        uberbox.style.transition = "3s";
        uberbox.style.display = "none";
    }
    toggle = !toggle;
}
