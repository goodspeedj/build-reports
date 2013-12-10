<div class="container">
  <h4>Build Reports</h4>

  <div id="report"></div>

  <script>
    var margin = {top: 20, right: 20, bottom: 30, left: 50},
        width = 960 - margin.left - margin.right,
        height = 500 - margin.top - margin.bottom;
  
    var parseDate = d3.time.format("%y-%b-%d").parse;

    var x = d3.time.scale()
              .range([0, width]);

    var y = d3.scale.linear()
              .range([height, 0]);

    var color = d3.scale.category20();

    var xAxis = d3.svg.axis()
                  .scale(x)
                  .orient("bottom");

    var yAxis = d3.svg.axis()
                  .scale(y)
                  .orient("left")
  
    var area = d3.svg.area()
                  .x(function(d) { return x(d.date); })
                  .y0(function(d) { return y(d.y0); })
                  .y1(function(d) { return y(d.y0 + d.y); });

    var stack = d3.layout.stack()
                  .values(function(d) { return d.values; });

    var svg = d3.select("body").append("svg")
                  .attr("width", width + margin.left + margin.right)
                  .attr("height", height + margin.top + margin.bottom)
                .append("g")
                  .attr("transform", "translate(" + margin.left + "," + margin.top + ")");


    var data = <?php echo json_encode($data); ?>;
    console.log(data); 
  </script>
</div>
