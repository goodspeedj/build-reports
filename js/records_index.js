$(document).ready(function() {
    $('#records').dataTable( {
        "aaSorting": [[ 6, "desc" ]],
        "sDom": "<'row'<'col-xs-6'T><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
    } );
} );