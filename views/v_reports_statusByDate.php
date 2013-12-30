<div class="container">
  <h4>Build Report: Builds by Status</h4>
    The following graph shows the number of builds by status, by date.  Green indicates a Stable build, yellow 
    indicates Unstable and red indicates a Failed build.

  <p>&nbsp;</p>

  <div class="col-md-4">
    <form>
      <select class="form-control" id="product" name="product">
        <option value="All">All</option>
        <option value="Sales">Sales</option>
        <option value="Service">Service</option>
      </select>
    </form>
  </div>

  <div class="row">
    <div id="graph"></div>
  </div>
  
  <script>
    // Get the data from the controller and convert to JSON
    var allData = <?php echo json_encode($allData); ?>;
    var salesData = <?php echo json_encode($salesData); ?>;
    var serviceData = <?php echo json_encode($serviceData); ?>;
  </script>
</div>
