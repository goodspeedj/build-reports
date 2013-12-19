<div class="container">
  <h4>Build Reports: Build Time by Date</h4>
    The following graph shows build duration (time) by date.  The color encoding indicates whether the build 
    was Stable (green), Unstable (yellow) or Failed (red).  The size of the dot indicates the percentage of 
    code coverage (the bigger the dot the higer percentage).  Hover over each dot to see additional information
    about that specific build.

    <p>&nbsp;</p>

  <div id="graph"></div>

  <script>

    // Get the data from the controller and convert to JSON
    var data = <?php echo json_encode($data); ?>; 
  </script>

  <script src="/js/reports_scatter.js"></script>

</div>
