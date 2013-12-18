// Date format
var format = d3.time.format("%m/%d/%y");

// Dimensions of the graph
var margin = {top: 20, right: 30, bottom: 30, left: 40},
    width = 960 - margin.left - margin.right,
    height = 500 - margin.top - margin.bottom;

// Define the X and Y data points and axis
var x = d3.time.scale()
          .range([10, width]);

var y = d3.scale.linear()
          .range([height, 0]);

var xAxis = d3.svg.axis()
              .scale(x)
              .orient("bottom")
              .ticks(10);

var yAxis = d3.svg.axis()
              .tickFormat(d3.format("d"))
              .scale(y)
              .ticks(10)
              .orient("left");

// Loop through the data
data.forEach(function(d) {
  var date = new Date(d.date);
  var date = moment(d.date).format('MM/DD/YY');
  d.date = format.parse(date);
  d.duration = +d.duration;
  d.product = +d.product;
});

// Setup the X and Y domains
y.domain([0, d3.max(data, function(d) { return d.duration; })]);
x.domain(d3.extent(data, function(d) { return d.date; }));

// Add a SVG element to the graph div
var svg = d3.select("#graph").append("svg")
              .attr("width", width + margin.left + margin.right)
              .attr("height", height + margin.top + margin.bottom)
            .append("g")
              .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

// Add the circles to the graph
var circles = svg.selectAll("circle")
    .data(data)
    .enter()
    .append("circle")
    .attr("cx", function(d) {
        return x(d.date);
    })
    .attr("cy", function(d) {
        return y(d.duration);
    })
    .attr("r", function(d) {
        return ((d.coverage / 100) * 10)
    })
    .attr("fill", function(d) {
        var color;
        if (d.status == 'Stable') {
            color = "#A2C21D";
        }
        else if (d.status == 'Unstable') {
            color = "#FCE338";
        }
        else {
            color = "#EF3434";
        }
        return color;
    });

// Add the X and Y axis
svg.append("g")
    .attr("class", "x axis")
    .attr("transform", "translate(-10," + height + ")")
    .call(xAxis);

svg.append("g")
    .attr("class", "y axis")
    .call(yAxis);

// Display tool tip on mouse hover
circles
    .on("mousemove", function(d,i) {
      var mouse = d3.mouse(svg.node()).graph( function(d) { return parseInt(d); } );

      tooltip
        .classed("hidden", false)
        .attr("style", "left:" + (mouse[0]+670) + "px;top:" + (mouse[1]+60) + "px")
        .html(d.job_name)
    })
    .on("mouseout",  function(d,i) {
      tooltip.classed("hidden", true)
    });