/**
* The code for this graph was based on the following example:
* Michael Bostock, "Stacked Area Via Nest", mbostock’s block #3020685, 
* Accessed December 5, 2013, June 29, 2012, http://bl.ocks.org/mbostock/3020685
*/

var origData = data;

// Date format
var format = d3.time.format("%m/%d/%y");

// Dimensions of the graph
var margin = {top: 20, right: 30, bottom: 30, left: 40},
    width = 960 - margin.left - margin.right,
    height = 500 - margin.top - margin.bottom;

var graphWidth = 860 - margin.left - margin.right;

// Set the X and Y scales and axis
var x = d3.time.scale()
          .range([0, graphWidth]);

var y = d3.scale.linear()
          .range([height, 0]);

var indicators = ["Stable","Unstable","Failed"];
//var z;
//var z = d3.scale.ordinal().domain(indicators).range(["#A2C21D","#FCE338","#EF3434"]);
var z = d3.scale.ordinal().domain(indicators).range(["red","orange","yellow","green", "blue", "purple"]);
//var z = d3.scale.ordinal().domain(indicators).range(["#FCE338","#EF3434","#EF3434","#A2C21D", "#A2C21D", "#FCE338"]);

//var test = ["Sales", "Service"];


var xAxis = d3.svg.axis()
              .scale(x)
              .orient("bottom")
              .ticks(8);

var yAxis = d3.svg.axis()
              .tickFormat(d3.format("d"))
              .scale(y)
              .orient("left");


// Define the SVG element to go in the graph div
var svg = d3.select("#graph").append("svg")
              .attr("width", width + margin.left + margin.right)
              .attr("height", height + margin.top + margin.bottom)
            .append("g")
              .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

// Loop through the data



// Update data
function update(data, selection) {

  data.forEach(function(d) {
    var date = new Date(d.date);
    var date = moment(d.date).format('MM/DD/YY');
    d.date = format.parse(date);
    d.Count = +d.Count;
    //console.log(d.date + " = " + d.Count);
  });

  console.log(data);

  /*
  if (selection == 'All') {
    z = d3.scale.ordinal().domain(indicators).range(["red","orange","yellow","green", "blue", "purple"]);
  }
  else if (selection == 'Sales') {
    z = d3.scale.ordinal().domain(indicators).range(["green", "blue", "pink"]);
  }
  else {
    z = d3.scale.ordinal().domain(indicators).range(["red","orange","yellow"]);
  }
  */

  // Create the area stack
  var stack = d3.layout.stack()
                .offset("zero")
                .values(function(d) { return d.values; })
                .x(function(d) { return d.date; })
                //.y(function(d) { return d.Count; });
                .y(function(d) {
                  return d.Count;
                });
  
  // Nest by name aka status
  var nest = d3.nest()
                .key(function(d) { return d.product_name + d.Name; });
  
  // Define the area
  var area = d3.svg.area()
                .interpolate("basis")
                .x(function(d) { return x(d.date); })
                .y0(function(d) { return y(d.y0); })
                .y1(function(d) { return y(d.y0 + d.y); });
  
//function update(data) {
  var layers = stack(nest.entries(data));
  x.domain(d3.extent(data, function(d) { return d.date; }));
  y.domain([0, d3.max(data, function(d) { return d.y0 + d.y; })]);

  // Add the line paths
  var layer = svg.selectAll(".layer").data(layers);

  layer
    .append("path")
    .attr("class", "layer")
    .attr("d", function(d) { return area(d.values); })
    .style("fill", function(d, i) { 
      console.log(i + " = " + z(i));
      return z(i); 
    });


  layer.enter()
    .append("path")
    .attr("class", "layer")
    .attr("d", function(d) { return area(d.values); })
    .style("fill", function(d, i) { 
      console.log(i + " = " + z(i));
      return z(i); 
    });

  // Enter and Update
  //layer.layer(function(d) { return d; });

  layer.exit().remove();
}

// Initial load of graph
update(data, "All");


/**
 * Filter the data based on selection
 */
function filterData(data, selection) {
  var dataset = data;

  if (selection == 'All') {
    return dataset;
  }
  else {
    dataset = data.filter(function(d) {
      return d.product_name == selection;
    });
    return dataset;
  }
}


// Product type pull down
d3.select("#product")
  .on("change", function() {
    var newData = filterData(origData, this.value);
    update(newData, this.value);
  });


/* Create the layers
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
*/

// Add the X and Y axis
svg.append("g")
  .attr("class", "x axis")
  .attr("transform", "translate(0," + height + ")")
  .call(xAxis);

svg.append("g")
  .attr("class", "y axis")
  .call(yAxis);

var legendStable = svg.append("g")
  .attr("width", 50)
  .attr("height", 30)
  .attr("class", "legend")
  .attr("transform", "translate(840,150)");

legendStable.append("svg:line")
  .attr("x2", 15)
  .attr("class", "stable");

legendStable.append("svg:text")
  .attr("x", 30)
  .attr("dy", ".21em")
  .text("Stable");

var legendUnstable = svg.append("g")
  .attr("width", 50)
  .attr("height", 30)
  .attr("class", "legend")
  .attr("transform", "translate(840,180)");

legendUnstable.append("svg:line")
  .attr("x2", 15)
  .attr("class", "unstable");

legendUnstable.append("svg:text")
  .attr("x", 30)
  .attr("dy", ".21em")
  .text("Unstable");

var legendFailed = svg.append("g")
  .attr("width", 50)
  .attr("height", 30)
  .attr("class", "legend")
  .attr("transform", "translate(840,210)");

legendFailed.append("svg:line")
  .attr("x2", 15)
  .attr("class", "failed");

legendFailed.append("svg:text")
  .attr("x", 30)
  .attr("dy", ".21em")
  .text("Failed");
