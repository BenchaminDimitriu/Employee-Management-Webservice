
$(document).ready( function () {
    $('#myTable').DataTable();
} );

$('#myTable').DataTable( {
    scrollY: 400
} );

$('#myTable').DataTable( {
    data: data
} );