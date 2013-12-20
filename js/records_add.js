// Form validation for Add Build form
$( "#record-add" ).validate({
  rules: {
    build_num: {
      required: true,
      number: true,
      range: [1, 500]
    },
    job_name: {
      required: true
    },
    duration: {
      required: true,
      number: true,
      range: [1, 1000]
    },
    coverage: {
      required: true,
      number: true,
      range: [1, 100]
    }
  }
});