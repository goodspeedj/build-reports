<div class="container">
  <h4>Build Reports: Build Time by Date</h4>
    The following graph shows build duration (time) by date.  The color encoding indicates whether the build 
    was Stable (green), Unstable (yellow) or Failed (red).  The size of the dot indicates the percentage of 
    code coverage (the bigger the dot the higher percentage).  Hover over each dot to see additional information
    about that specific build.

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

  <div id="graph"></div>

  <script>
    // Get the data from the controller and convert to JSON
    var data = <?php echo json_encode($data); ?>; 
  </script>

</div>
