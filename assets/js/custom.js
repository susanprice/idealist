/**
 * utility UI functions
 * custom.js
 */


function idealist_showSearchInput() {
    document.getElementById("full-search").style.display = "block";
    document.getElementById('search').focus();
}

// user hit the close/reset button
function idealist_hideSearchInput() {
    document.getElementById("full-search").style.display = "none";
    document.forms["full-search"].reset();
}