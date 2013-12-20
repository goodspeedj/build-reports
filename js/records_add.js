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