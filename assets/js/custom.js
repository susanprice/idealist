/**
 * utility UI functions
 * custom.js
 */


function showSearchInput() {
    document.getElementById("full-search").style.visibility = "visible";
    document.getElementById("full-search").style.display = "block";
    document.getElementById('search').focus();
}

// user hit the close/reset button
function hideSearchInput() {
    document.getElementById("full-search").style.display = "none";
    document.forms["full-search"].reset();
}