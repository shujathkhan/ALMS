<!doctype html>
<?php
session_start();
require_once 'dbconfig.php';
//require_once 'timer.php';
	$sid = $_SESSION['sid'];
	$stutable = 'student_'.$_SESSION['courseid'].'_'.$_SESSION['id'];
	$query = sprintf("SELECT quizstatus FROM $stutable where sid='$sid'");
                $result = mysqli_query($conn,$query);
                $row = mysqli_fetch_row($result);
				echo'
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ELEARN | Quiz</title>
    <link href="//cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css" />
    <link href="static/style.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
		
    <script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
	<link href="static/style2.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="static/mui.min.css">
	
	
<link rel="stylesheet" href="prettify.css" />
<script src="prettify.js"></script>
<script>
window.onload = (function(){ prettyPrint(); });
</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.js"></script>
   <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  

  
    <link rel="stylesheet" type="text/css" href="/css/normalize.css">
  

  
    
      <script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    
    
      <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
    
  

 
    <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  

  

  <style type="text/css">
    


#drop
{
  background-color: red;
  
}
.over {
  border: solid 5px purple;
}
.draggable
{
  border: solid 2px gray;
}
  </style>

		
		<script type = "text/javascript" language = "javascript">
         $(document).ready(function() {
            $("#driver").click(function(event){
			var age = jQuery.map(jQuery(".map-test"),function(n,i){
                return jQuery(n).attr("id");
            });
               var name = $("#name").val();
               $.post("quiz_code_rearrange_eval.php",{ "age": age},
			   function(data)
			   {
				   alert(data);
				   //location.href="quiz_code_rearrange.php";
        });
            });

         });
      </script>
   
<script type="text/javascript">//<![CDATA[
$(window).load(function(){
$("#origin").sortable({connectWith: "#drop"});

$("#drop").sortable({connectWith: "#origin"});
});//]]> 

</script>

  
    <link href="//cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css" />
    <link href="static/style.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<style>
.card-example {
  position: relative;
  background-color: #fff;
}

.card-example .label {
  padding: 	0px 0px 0;
}
.mui-appbar{
	min-height:30px;
}
.mui--appbar-height{
	height:30px;
}


</style>


  </head>
  <body>
    <div class="mui-appbar mui--z1 mui--bg-danger">
      <div class="mui-container">
        <table width="100%">
          <tr class="mui--appbar-height">
            <td class="mui--text-title">ELEARN | Quiz</td>
      
          </tr>
        </table>
      </div>
    </div>';
echo'<br><br><br><br>';
				if($row[0]==0){
					$id = intval($_GET['q']);
  $quizrefid = $sid.'Q'.$id;
  $_SESSION['quizrefid'] = $quizrefid;
	$table = 'quiz_table_'.$_SESSION['courseid'];
    $_SESSION['quiztable'] = $table;
	$query1 = sprintf("SELECT DISTINCT quiztype FROM $table where quizrefid='$quizrefid'");				
                $result1 = mysqli_query($conn,$query1);
				
                while($row1 = mysqli_fetch_row($result1)){
	 $qtype = $row1[0];
$_SESSION['qtype']=$qtype;
if($qtype=='mcq')
	require_once('mcq.php');
else 
	switch($qtype){
	case 'fib':
	require_once('fib.php');
	break;
	case 'tf':
	require_once('tf.php');
	break;
	case 'cmcq':
	require_once('cmcq.php');
	break;
	case 'rear':
	require_once('rear.php');
	break;
	/*case 'short':
	require_once('short.php');
	break;
	case 'long':
	require_once('long.php');
	break;*/
	default:
	echo 'No Quiz';
	break;
}
		}
}
else{
	$message='Your Quiz Session Is Complete!!';
echo "<script>alert('$message'); location.href='../Students/report.php';</script>";
	
}
	?>
	
  
