// let table = new DataTable('#table_id', {
//     // options
//     scrollY: 400

// });
$(document).ready( function () {
    $('#table_id').DataTable();
} );

$('#table_id').DataTable( {
    scrollY: 400
} );
/*
$('#table_id').DataTable( {
    data: data.js
} );*/