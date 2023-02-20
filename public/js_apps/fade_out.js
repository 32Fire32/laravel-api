$(document).ready(function () {
    $('[data-bs-toggle="popover"]').popover();
});
setTimeout(function () {
    $("#alert-message").fadeOut();
}, 3000);
setTimeout(function () {
    $("#toast-message").fadeOut();
}, 3000);
