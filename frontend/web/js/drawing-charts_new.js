$(function () {

// Initialize Tooltips
  $('[data-toggle="tooltip"]').tooltip();
  // $('#tt01').tooltip('show');


// Drawing graphics

  // Donut Graphs data
  var donutGraph01Data = [
    {
      value: 20,
      color:"#878BB6"
    },
    {
      value : 80,
      color : "#4ACAB4"
    }
  ];

  var donutGraph02Data = [
    {
      value : 35,
      color : "#4ACAB4"
    },
    {
      value : 65,
      color : "#FF8153"
    }
  ];

  var donutGraph03Data = [
    {
      value: 20,
      color:"#878BB6"
    },
    {
      value : 40,
      color : "#4ACAB4"
    },
    {
      value : 10,
      color : "#FF8153"
    },
    {
      value : 30,
      color : "#FFEA88"
    }
  ];

  var donutGraph05Data = [
    {
      value: 20,
      color:"#878BB6"
    },
    {
      value : 40,
      color : "#4ACAB4"
    },
    {
      value : 10,
      color : "#FF8153"
    },
    {
      value : 30,
      color : "#FFEA88"
    }
  ];

  var donutGraph06Data = [
    {
      value: 30,
      color : "#FFEA88"
    },
    {
      value : 15,
      color : "#4ACAB4"
    },
    {
      value : 25,
      color:"#878BB6"
    },
    {
      value : 40,
      color : "#FF8153"
    }
  ];

  // Bar charts Data

  var images = [],
      nofollow = [],
      dofollow = [],
      images_date = [],
      nofollow_date = [],
      dofollow_date = [];

  $('.lost_and_new').find('ul').find('li').each(function(index, el) {
    // console.log($(this).attr('class'));
    if ($(this).hasClass('images')) images.push($(this).text());
    if ($(this).hasClass('nofollow')) nofollow.push($(this).text());
    if ($(this).hasClass('dofollow')) dofollow.push($(this).text());

    if ($(this).hasClass('images_date')) images_date.push($(this).text());
    if ($(this).hasClass('nofollow_date')) nofollow_date.push($(this).text());
    if ($(this).hasClass('dofollow_date')) dofollow_date.push($(this).text());
  });

  var barChart01Data = {
    labels: $.unique(images_date.concat(nofollow_date,dofollow_date)),
    datasets: [
      {
        label: "NoFollow",
        fillColor: "rgba(135, 139, 182, 0.75)",
        strokeColor: "rgba(59, 175, 218, 0)",
        highlightFill: "rgba(59, 175, 218, 1)",
        highlightStroke: "rgba(59, 175, 218, 0)",
        data: nofollow
      },
      {
        label: "DoFollow",
        fillColor: "rgba(0, 118, 163, 0.75)",
        strokeColor: "rgba(0, 118, 163, 0)",
        highlightFill: "rgba(0, 118, 163, 1)",
        highlightStroke: "rgba(0, 118, 163, 0)",
        data: dofollow
      },
      {
        label: "Images",
        fillColor: "rgba(74, 202, 180, 0.75)",
        strokeColor: "rgba(129, 212, 250, 0)",
        highlightFill: "rgba(129, 212, 250, 1)",
        highlightStroke: "rgba(129, 212, 250, 0)",
        data: images
      }
    ]
  };

  var barChart02Data = {
    labels: [".com", ".org", ".de", ".net", ".co.uk", "other"],
    datasets: [
      {
        label: "Domains dataset",
        fillColor: "rgba(74, 202, 180, 0.5)",
        strokeColor: "rgba(74, 202, 180, .8)",
        highlightFill: "rgba(74, 202, 180, 0.75)",
        highlightStroke: "rgba(74, 202, 180, 1)",
        data: [3, 1.7, 1.1, .8, .2, 2]
      }
    ]
  };

  // Line charts Data
  var lineChart01Data = {
    labels: $.unique(images_date.concat(nofollow_date,dofollow_date)),
    datasets: [
      {
        label: "My First dataset",
        fillColor: "rgba(15, 129, 199, 0.2)",
        strokeColor: "rgba(15, 129, 199, 1)",
        pointColor: "rgba(15, 129, 199, 1)",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(220,220,220,1)",
        data: dofollow
      }
    ]
  };


  // Donut Graphs options
  var donutGraph01Options,
      donutGraph02Options,
      donutGraph03Options,
      donutGraph05Options,
      donutGraph06Options = {
        // animation: false,
        // animateScale : false,
        //Boolean - Whether we animate the rotation of the Doughnut
        // animateRotate : false,

        //Boolean - Whether we animate scaling the Doughnut from the centre
        // animateScale : false,

        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke : true,

        //String - The colour of each segment stroke
        segmentStrokeColor : "#fff",

        //Number - The width of each segment stroke
        segmentStrokeWidth : 2,

        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout : 55, // This is 0 for Pie charts

        //String - A legend template
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

      }
  donutGraph01Options = {
    animateRotate : false,
    animateScale : false,
    responsive: true,
    maintainAspectRatio: true
  }
  donutGraph02Options = {
    animateRotate : false,
    animateScale : false,
    responsive: true,
    maintainAspectRatio: true
  }
  donutGraph03Options = {
    animateRotate : false,
    animateScale : false,
    responsive: true,
    maintainAspectRatio: true
  }
  donutGraph05Options = {
    animateRotate : false,
    animateScale : false,
    responsive: true,
    maintainAspectRatio: true
  }
  donutGraph06Options = {
    animateRotate : false,
    animateScale : false,
    responsive: true,
    maintainAspectRatio: true
  }

  // Bar charts options
  var barChart01Options = {
        // animation : false,
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero : true,

        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines : true,

        //String - Colour of the grid lines
        scaleGridLineColor : "rgba(0,0,0,.05)",

        //Number - Width of the grid lines
        scaleGridLineWidth : 1,

        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,

        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,

        //Boolean - If there is a stroke on each bar
        barShowStroke : true,

        //Number - Pixel width of the bar stroke
        barStrokeWidth : 0,

        //Number - Spacing between each of the X value sets
        barValueSpacing : 5,

        //Number - Spacing between data sets within X values
        barDatasetSpacing : 0,

        //String - A legend template
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
  }

  var barChart02Options = {
        animation : false,
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero : true,

        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines : true,

        //String - Colour of the grid lines
        scaleGridLineColor : "rgba(0,0,0,.05)",

        //Number - Width of the grid lines
        scaleGridLineWidth : 1,

        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,

        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,

        //Boolean - If there is a stroke on each bar
        barShowStroke : true,

        //Number - Pixel width of the bar stroke
        barStrokeWidth : 2,

        //Number - Spacing between each of the X value sets
        barValueSpacing : 5,

        //Number - Spacing between data sets within X values
        barDatasetSpacing : 1,

        //String - A legend template
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
  }

  // Line charts options
  var lineChart01Options = {
    animation : false,
    ///Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines : true,

    //String - Colour of the grid lines
    scaleGridLineColor : "rgba(0,0,0,.05)",

    //Number - Width of the grid lines
    scaleGridLineWidth : 1,

    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,

    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,

    //Boolean - Whether the line is curved between points
    bezierCurve : false,

    //Number - Tension of the bezier curve between points
    bezierCurveTension : 0.4,

    //Boolean - Whether to show a dot for each point
    pointDot : true,

    //Number - Radius of each point dot in pixels
    pointDotRadius : 4,

    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth : 1,

    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,

    //Boolean - Whether to show a stroke for datasets
    datasetStroke : true,

    //Number - Pixel width of dataset stroke
    datasetStrokeWidth : 2,

    //Boolean - Whether to fill the dataset with a colour
    datasetFill : true,

    // Boolean - whether or not the chart should be responsive and resize when the browser does.
    // responsive: true,

    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true
  }


  // get charts canvas
  var donut01 = document.getElementById("donutGraph01").getContext("2d");
  var donut02 = document.getElementById("donutGraph02").getContext("2d");
  var donut03 = document.getElementById("donutGraph03").getContext("2d");
  var donut05 = document.getElementById("donutGraph05").getContext("2d");
  var donut06 = document.getElementById("donutGraph06").getContext("2d");

  var barChart01 = document.getElementById("barChart01").getContext("2d");
  var barChart02 = document.getElementById("barChart02").getContext("2d");

  var lineChart01 = document.getElementById("lineChart01").getContext("2d");

  // draw charts
  new Chart(donut01).Doughnut(donutGraph01Data, donutGraph01Options);
  new Chart(donut02).Doughnut(donutGraph02Data, donutGraph02Options);
  new Chart(donut03).Doughnut(donutGraph03Data, donutGraph03Options);
  new Chart(donut05).Doughnut(donutGraph05Data, donutGraph05Options);
  new Chart(donut06).Doughnut(donutGraph06Data, donutGraph06Options);

  new Chart(barChart01).Bar(barChart01Data, barChart01Options);
  var barChart01Var = new Chart(barChart01).Bar(barChart01Data, barChart01Options);
  new Chart(barChart02).Bar(barChart02Data, barChart02Options);

  new Chart(lineChart01).Line(lineChart01Data, lineChart01Options);

  // generate legend

  var legend = barChart01Var.generateLegend();
  $('#lineChart01Legend').append(legend);



});