<div class="container">
  <h4>Build Reports</h4>

  <div id="graph"></div>

  <script>

    var data = <?php echo json_encode($data); ?>;
    //console.log(JSON.stringify(data, undefined, 2));
    //var data = [
    //            [5, 20], [480, 90], [250, 50], [100, 33], [330, 95],
    //            [410, 12], [475, 44], [25, 67], [85, 21], [220, 88]
    //          ];    

    var format = d3.time.format("%m/%d/%y");

    var margin = {top: 20, right: 30, bottom: 30, left: 40},
        width = 960 - margin.left - margin.right,
        height = 500 - margin.top - margin.bottom;

    var minDate = d3.max(data, function(d) { return d.date });
    var maxDate = d3.min(data, function(d) { return d.date });

    var x = d3.time.scale()
              .range([5, width]);

    var y = d3.scale.linear()
              .range([height, 0]);

    var xAxis = d3.svg.axis()
                  .scale(x)
                  .orient("bottom")
                  .ticks(d3.time.days);

    var yAxis = d3.svg.axis()
                  .tickFormat(d3.format("d"))
                  .scale(y)
                  .ticks(10)
                  .orient("left");

    data.forEach(function(d) {
      var date = new Date(d.date);
      var date = moment(d.date).format('MM/DD/YY');
      d.date = format.parse(date);
      d.duration = +d.duration;
    });

    y.domain([0, d3.max(data, function(d) { return d.duration; })]);
    x.domain(d3.extent(data, function(d) { return d.date; }));


    var svg = d3.select("#graph").append("svg")
                  .attr("width", width + margin.left + margin.right)
                  .attr("height", height + margin.top + margin.bottom)
                .append("g")
                  .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

      svg.selectAll("circle")
         .data(data)
         .enter()
         .append("circle")
         .attr("cx", function(d) {
            return x(d.date);
         })
         .attr("cy", function(d) {
            return y(d.duration);
         })
         .attr("r", 5)
         .attr("fill", function(d) {
            var color;
            if (d.status == 'Stable') {
                color = "#1a9641";
            }
            else if (d.status == 'Unstable') {
                color = "#fee08b";
            }
            else {
                color = "#d7191c";
            }
            return color;
         });

    svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(-5," + height + ")")
      .call(xAxis);

    svg.append("g")
      .attr("class", "y axis")
      .call(yAxis);



  </script>
</div>
