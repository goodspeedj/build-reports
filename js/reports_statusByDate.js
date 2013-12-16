/**
* The code for this graph was based on the following example:
* Michael Bostock, "Stacked Area Via Nest", mbostock’s block #3020685, 
* Accessed December 5, 2013, June 29, 2012, http://bl.ocks.org/mbostock/3020685
*/

// Date format
var format = d3.time.format("%m/%d/%y");

// Dimensions of the graph
var margin = {top: 20, right: 30, bottom: 30, left: 40},
    width = 960 - margin.left - margin.right,
    height = 500 - margin.top - margin.bottom;

// Set the X and Y scales and axis
var x = d3.time.scale()
          .range([0, width]);

var y = d3.scale.linear()
          .range([height, 0]);

var indicators = ["Stable","Unstable","Failed"];
var z = d3.scale.ordinal().domain(indicators).range(["#157F1B ","#FFE633","#7F1412"]);

var xAxis = d3.svg.axis()
              .scale(x)
              .orient("bottom")
              .ticks(d3.time.days);

var yAxis = d3.svg.axis()
              .tickFormat(d3.format("d"))
              .scale(y)
              .orient("left");

// Create the area stack
var stack = d3.layout.stack()
              .offset("zero")
              .values(function(d) { return d.values; })
              .x(function(d) { return d.date; })
              .y(function(d) { return d.Count; });

// Nest by name aka status
var nest = d3.nest()
              .key(function(d) { return d.Name; });

// Define the area
var area = d3.svg.area()
              .interpolate("basis")
              .x(function(d) { return x(d.date); })
              .y0(function(d) { return y(d.y0); })
              .y1(function(d) { return y(d.y0 + d.y); });

// Define the SVG element to go in the graph div
var svg = d3.select("#graph").append("svg")
              .attr("width", width + margin.left + margin.right)
              .attr("height", height + margin.top + margin.bottom)
            .append("g")
              .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

// Loop through the data
data.forEach(function(d) {
  var date = new Date(d.date);
  var date = moment(d.date).format('MM/DD/YY');
  d.date = format.parse(date);
  d.Count = +d.Count;
});


// Create the layers
var layers = stack(nest.entries(data));

layers = stack(nest.entries(data));
x.domain(d3.extent(data, function(d) { return d.date; }));
y.domain([0, d3.max(data, function(d) { return d.y0 + d.y; })]);

// Add the line paths
svg.selectAll(".layer")
  .data(layers)
.enter().append("path")
  .attr("class", "layer")
  .attr("d", function(d) { return area(d.values); })
  .style("fill", function(d, i) { return z(i); });

// Add the X and Y axis
svg.append("g")
  .attr("class", "x axis")
  .attr("transform", "translate(0," + height + ")")
  .call(xAxis);

svg.append("g")
  .attr("class", "y axis")
  .call(yAxis);