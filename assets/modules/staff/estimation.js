var labels=new Array();
var data1=new Array();
var data2=new Array();
var labels2=[];
$(document).ready(function () {
    var chart = AmCharts.makeChart( "est_chart", {
  "type": "serial",
  "theme": "light",
  "dataProvider": [ {
    "country": "ข้อ 1",
    "visits": parseInt($('#a1').val()),
    "color": "#d41a69"
  }, {
    "country": "ข้อ 2",
    "visits": parseInt($('#a2').val()),
    "color": "#d41a69"
  }, {
    "country": "ข้อ 3",
    "visits": parseInt($('#a3').val()),
    "color": "#d41a69"
  }, {
    "country": "ข้อ 4",
    "visits": parseInt($('#a4').val()),
    "color": "#d41a69"
  }, {
    "country": "ข้อ 5",
    "visits": parseInt($('#a5').val()),
    "color": "#d41a69"
  }, {
    "country": "ข้อ 6",
    "visits": parseInt($('#a6').val()),
    "color": "#d41a69"
  }, {
    "country": "ข้อ 7",
    "visits": parseInt($('#a7').val()),
    "color": "#d41a69"
  } ],
  "valueAxes": [{
    // "axisAlpha": 0,
    "position": "left",
    "title": "คะแนน",
    "minimum": 0
  }],
  "gridAboveGraphs": false,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b> ",
    "fillColorsField": "color",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20
  },
  "export": {
    "enabled": true
  }

} );
});
