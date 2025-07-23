jQuery.noConflict();
jQuery(document).ready(function ($) {
    new DataTable('#example', {
        pageLength: 5,
        lengthMenu: [5, 10, 50, 100, 500],
        columnDefs: [
            { type: 'date', targets: 0 } // Primera columna (índice 0) como fecha
        ]
    });
});

  