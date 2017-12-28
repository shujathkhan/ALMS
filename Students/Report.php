<?php
session_start();
require_once 'dbconfig.php';

?>

<!DOCTYPE html>
<html>
    <head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {
        $('#pdf').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'pdf_gen.php',
          success: function (data) {
       	  window.open('report.pdf','_blank');
            }
          });

        });
      });
    </script>	
	
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css'>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
  
	  <script>
         $(document).ready(function() {
         $('select').material_select();
      });
      </script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	  </head>
 
    <body>
	<?php include('menustud.php');	?>
	<br>
	<br>
	
	<div class="container">
<form id="pdf">

  <div class="container">
 <script>
  $('#selectee').attr('disabled',false);
</script>
<?php
$select='<table class="highlight responsive-table">
    <thead>
      <tr>
        <th>Course ID</th>
        <th>Course name</th>
        <th>Unit-1</th>
        <th>Unit-2</th>
        <th>Unit-3</th>
        <th>Unit-4</th>
        <th>Unit-5</th>
        <th>Quiz</th>
        <th></th>
      </tr>
    </thead>
    <tbody>';

$dept=$_SESSION["department"];
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,$dept) or die(mysqli_connect_error());
$id=$_SESSION["id"];
$studenttable="student_".$id;
$courselist=sprintf("select courseid from $studenttable");
//echo $courselist;
$result123=mysqli_query($conn,$courselist);
if($result123){
while($row=mysqli_fetch_row($result123)){
$table="student_".$row[0]."_".$id;
//echo $table;
$course=$row[0];
$value=[];
$result1=[];
$result2=[];
for($i=1;$i<=5;$i++){
  $query="SELECT COUNT(*) FROM $table WHERE sid LIKE '%U$i%' AND status='1' ";
  //echo $query;
  $res=mysqli_query($conn,$query);
  if($res){
  $result1=mysqli_fetch_row($res);
  //print_r($result1);
  }
  else
  {$result1[0]=0;}  
 $querytot="SELECT u$i FROM course WHERE courseid = '$course' ";
  $res2=mysqli_query($conn,$querytot);
  if($res2)
  {$result2=mysqli_fetch_row($res2);
  // print_r($result2);
  }
  else
  {$result2[0]=0;}	  
  if($result2[0]!=0)
  {$value[$i]=($result1[0]/$result2[0])*100;}
  else
  {$value[$i]=0;} 
}
$query=sprintf("UPDATE $studenttable SET u1='$value[1]',u2='$value[2]',u3='$value[3]',u4='$value[4]',u5='$value[5]' WHERE courseid='$course'");
$result=mysqli_query($conn,$query);
}
}
$select1='';
$select2='';

//displaying now
$courselist=sprintf("select courseid,coursename,u1,u2,u3,u4,u5 from $studenttable");
$result=mysqli_query($conn,$courselist);
if($result)
{
while($row=mysqli_fetch_row($result)){
$row1=$row[2];
$row2=$row[3];
$row3=$row[4];
$row4=$row[5];
$row5=$row[6];
$row6=$row[6];
$select.= '<tr>
		<td>'.$row[0].'</td>
		<td>'.$row[1].'</td>
		<td>'.$row1.'%</td>
		<td>'.$row[3].'%</td>
		<td>'.$row[4].'%</td>
		<td>'.$row[5].'%</td>
		<td>'.$row[6].'%</td>
		<td>'.$row[6].'%</td>';
$select10.='<td><button class="waves-effect waves-light btn red accent-4 modal-trigger" data-toggle="modal" data-target="efmodal'.$row[0].'"  >Graphical View</button></td>
		</tr>';
		$s=$select+$select10;
$select1.=	'<tr>

    <div class="modal" id="efmodal'.$row[0].'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

<canvas id="myChart'.$row[0].'" width="400" height="250"></canvas>

		</div>
     
      </div>
      
    </div>
  </div>


<script>

var canvas = document.getElementById("myChart'.$row[0].'");
var data = {
    labels: ["Unit I", "Unit II", "Unit III", "Unit IV", "Unit V", "Quiz"],
    datasets: [
        {
            label: "Percentage",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: "butt",
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: "miter",
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 5,
            pointHitRadius: 10,
            data: ['.$row1.', '.$row2.', '.$row3.', '.$row4.', '.$row5.', '.$row6.'],
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
</tr>';
}
}

   $select2.= '</tbody>
  </table>';
echo $select;
echo $select2;
echo'<center>		
			<button class="waves-effect waves-light btn green" type="submit" name="submit">Generate PDF</button>
		</center>';
$_SESSION['my_html']=$select;
?>
	
	</div>
</form>
	</div>
		  
      <!--Import jQuery before materialize.js-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js'></script>
        
		  <script>   
				$('.button-collapse').sideNav({
					  menuWidth: 240, // Default is 240
					  edge: 'left', // Choose the horizontal origin
					  closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
						 draggable: true
					}
				  );
				// Show sideNav
				//$('.button-collapse').sideNav('show');
		  $(document).ready(function() {
    $('select').material_select();

    // for HTML5 "required" attribute
    $("select[required]").css({
      display: "inline",
      height: 0,
      padding: 0,
      width: 0
    });
  });
		  </script> 
<script>
$(document).ready(function() {
  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  $('.modal-trigger').leanModal();
});
</script>
<script language="javascript" type="text/javascript">
     $(window).load(function() {
     $('#loading').hide();
  });
</script>
<div id="loading">
  <img id="loading-image" src="http://fourfourtwo.com.tr/v1/wp-content/uploads/2017/06/loading.gif" alt="Loading..." />
</div>
<style>
#loading {
   width: 100%;
   height: 100%;
   top: 0;
   left: 0;
   position: fixed;
   display: block;
   opacity: 0.7;
   background-color: #fff;
   z-index: 99;
   text-align: center;
}

#loading-image {
  position: absolute;
  top: 100px;
  left: 240px;
  z-index: 100;
}
</style>
	</body>
  </html>