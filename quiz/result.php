
<!doctype html>
<?php
session_start();
require_once 'dbconfig.php';
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ELEARN | Quiz</title>
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

		
		
   
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$("#origin").sortable({connectWith: "#drop"});

$("#drop").sortable({connectWith: "#origin"});
});//]]> 
history.pushState(null, null, location.href);
window.onpopstate = function(event) {
    history.go(1);
};
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
    <header class="mui-appbar mui--z1 mui--bg-danger">
      <div class="mui-container">
        <table width="100%">
          <tr class="mui--appbar-height">
            <td class="mui--text-title">ELEARN | Quiz</td>
            
          </tr>
        </table>
      </div>
    </header>
	<br><br>
	<div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-height"></div>
		<div class="mui-container">
		<div class="mui-panel" style="height:200px">
		<hr>
		<center><h2>RESULT</h2></center>
		<hr>
		<br>
		<center><h3>Your Score is : <?php $sid=$_SESSION['sid'];
				$tablename='student_'.$_SESSION['courseid'].'_'.$_SESSION['id'];

		$query1 = sprintf("SELECT quizstatus FROM $tablename where sid='$sid' ");
		
 $result1=mysqli_query($conn,$query1);
 $row=mysqli_fetch_row($result1);
 echo $row[0];
		
		?></h3></center>
			
		</div>
			<center>
				
				 <a href="../Students/Report.php"><button class="mui-btn mui-btn--accent"  id="result" >SUBMIT</button></a>
				<form action="pdf_gen.php" method="POST">
				<button type="submit" class="mui-btn mui-btn--accent"  id="result" >DOWNLOAD PDF</button>
				</form>
			</center>		
			
		</div>
    </div>


  </body>
</html>
