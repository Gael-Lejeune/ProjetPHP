/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginRight = "250px";
    document.getElementById("Backtohome").style.marginRight = "250px";
    document.getElementById("body").style.boxShadow = "0.8";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginRight = "0";
    document.getElementById("Backtohome").style.marginRight = "0";
    document.getElementById("body").style.boxShadow = "0.0";
}