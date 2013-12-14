<div class="container">
  <h4>Build Reports</h4>

  <div id="graph"></div>

  <script>

    var data = <?php echo json_encode($data); ?>;
   
    //console.log(JSON.stringify(data,undefined, 2));
 
    var format = d3.time.format("%m/%d/%y");

    var margin = {top: 20, right: 30, bottom: 30, left: 40},
        width = 960 - margin.left - margin.right,
        height = 500 - margin.top - margin.bottom;

    var x = d3.time.scale()
              .range([0, width]);

    var y = d3.scale.linear()
              .range([height, 0]);

    //var z = d3.scale.category20();
    var indicators = ["Stable","Unstable","Failed"];
    var z = d3.scale.ordinal().domain(indicators).range(["#1a9641","#fee08b","#d7191c"]);

    var xAxis = d3.svg.axis()
                  .scale(x)
                  .orient("bottom")
                  .ticks(d3.time.days);

    var yAxis = d3.svg.axis()
                  .tickFormat(d3.format("d"))
                  .scale(y)
                  .orient("left");

    var stack = d3.layout.stack()
                  .offset("zero")
                  .values(function(d) { return d.values; })
                  .x(function(d) { return d.date; })
                  .y(function(d) { return d.Count; });

    var nest = d3.nest()
                  .key(function(d) { return d.Name; });

    var area = d3.svg.area()
                  //.interpolate("cardinal")
                  .x(function(d) { return x(d.date); })
                  .y0(function(d) { return y(d.y0); })
                  .y1(function(d) { return y(d.y0 + d.y); });

    var svg = d3.select("#graph").append("svg")
                  .attr("width", width + margin.left + margin.right)
                  .attr("height", height + margin.top + margin.bottom)
                .append("g")
                  .attr("transform", "translate(" + margin.left + "," + margin.top + ")");


    data.forEach(function(d) {
      var date = new Date(d.date);
      var date = moment(d.date).format('MM/DD/YY');
      d.date = format.parse(date);
      d.Count = +d.Count;
    });


    var layers = stack(nest.entries(data));

    layers = stack(nest.entries(data));
    x.domain(d3.extent(data, function(d) { return d.date; }));
    y.domain([0, d3.max(data, function(d) { return d.y0 + d.y; })]);

    svg.selectAll(".layer")
      .data(layers)
    .enter().append("path")
      .attr("class", "layer")
      .attr("d", function(d) { return area(d.values); })
      .style("fill", function(d, i) { return z(i); });

      svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis);

    svg.append("g")
      .attr("class", "y axis")
      .call(yAxis);

  </script>
</div>
