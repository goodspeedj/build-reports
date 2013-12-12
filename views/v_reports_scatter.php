<div class="container">
  <h4>Build Reports</h4>

  <div id="graph"></div>

  <script>

    var data = <?php echo json_encode($data); ?>;
    //var data = [
    //            [5, 20], [480, 90], [250, 50], [100, 33], [330, 95],
    //            [410, 12], [475, 44], [25, 67], [85, 21], [220, 88]
    //          ];    

    var format = d3.time.format("%m/%d/%y");

    var margin = {top: 20, right: 30, bottom: 30, left: 40},
        width = 960 - margin.left - margin.right,
        height = 500 - margin.top - margin.bottom;

    var svg = d3.select("body")
            .append("svg")
            .attr("width", width)
            .attr("height", height);

      svg.selectAll("circle")
         .data(data)
         .enter()
         .append("circle")
         .attr("cx", function(d) {
            return d.date;
         })
         .attr("cy", function(d) {
            return d.duration;
         })
         .attr("r", 5);

  </script>
</div>
