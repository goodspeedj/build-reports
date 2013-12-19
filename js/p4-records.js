$(document).ready(function() {
    $('#records').dataTable( {
        "aaSorting": [[ 6, "desc" ]],
        "sDom": "<'row'<'col-xs-6'T><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
    } );
} );

// Form validation for Add Build form
$( "#record-add" ).validate({
  rules: {
    build_num: {
      required: true,
      number: true
    },
    job_name: {
      required: true
    },
    duration: {
      required: true,
      number: true
    },
    coverage: {
      required: true,
      number: true
    }
  }
});