
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js"></script>
    
  

  <style type="text/css">
    
  </style>

  <title>chart.js line 2.0 by red_stapler</title>

  
</head>

<body>
  <canvas id="myChart" width="400" height="250"></canvas>

  




<script type='text/javascript'>//<![CDATA[

var canvas = document.getElementById('myChart');
var data = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "My First dataset",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 5,
            pointHitRadius: 10,
            data: [65, 59, 80, 0, 56, 55, 40],
        }
    ]
};

var option = {
	showLines: true
};
var myLineChart = Chart.Line(canvas,{
	data:data,
  options:option
});

function adddata(){
	myLineChart.data.datasets[0].data[7] = 50;
  myLineChart.data.labels[7] = "test add";
  myLineChart.update();
}




//]]> 

</script>


</body>

</html>

