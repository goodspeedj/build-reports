<div class="container">
  <h4>Build Reports</h4>

  <div id="graph"></div>

  <script>

    var data = <?php echo json_encode($data); ?>;
    
    var format = d3.time.format("%m/%d/%y");

    var margin = {top: 20, right: 30, bottom: 30, left: 40},
        width = 960 - margin.left - margin.right,
        height = 500 - margin.top - margin.bottom;

    var svg = d3.select("#graph")
    			.append("svg")
    			.attr("width", width)
    			.attr("height", height);

   	d3.selectAll("circle")
   		.data(data)
   		.enter()
   		.append("circle")
   		.attr("cx", function(d) {
        	return d[0];
   		})
   		.attr("cy", function(d) {
        	return d[1];
   		})
   		.attr("r", 5);

  </script>
</div>
