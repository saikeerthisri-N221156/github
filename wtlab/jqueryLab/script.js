// script.js - Shared jQuery utilities

$(document).ready(function() {

    // Highlight active nav link
    var page = window.location.pathname.split("/").pop();
    $("nav a").each(function() {
        if ($(this).attr("href") === page) {
            $(this).css("text-decoration", "underline");
        }
    });

});
