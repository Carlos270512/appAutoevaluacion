jQuery.noConflict();
jQuery(document).ready(function ($) {
    new DataTable('#example', {
        pageLength: 4,
        lengthMenu: [4, 10, 50, 100, 500]
    });
});



