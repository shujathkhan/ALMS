<!doctype html>
<?php
session_start();
require_once 'dbconfig.php';
require_once 'timer.php';
	$sid = $_SESSION['sid'];
	$stutable = 'student_'.$_SESSION['courseid'].'_'.$_SESSION['id'];
	$query = sprintf("SELECT quizstatus FROM $stutable where sid='$sid'");
	//echo $query;
                $result = mysqli_query($conn,$query);
                $row = mysqli_fetch_row($result);
				if($row[0]==0){
	$qtype = $_POST['qtype'];
	$_SESSION['qtype']=$qtype;
	$quizrefid = $_SESSION['quizrefid'];
	$table = 'quiz_table_'.$_SESSION['courseid'];
    $_SESSION['quiztable'] = $table;
	switch($qtype){
	case 'mcq':
	{echo'
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ELEARN | Quiz</title>
    <link href="//cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css" />
    <link href="static/style.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
	<link rel="stylesheet" href="static/mui.min.css">
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
    </header>';
	echo '	<div id="content-wrapper"  class="mui--text-left">
      <div class="mui--appbar-height"></div>
		<div class="mui-container">
			<form class="mui-form" method="POST" action="muimcq_eval.php">
			<table class="mui-table">
  <thead>
    <tr>
	<br><br>
      <th class="mui-col-xs-6 mui-col-md-6">Answer</th>
      <th class="text-right mui-col-xs-6 mui-col-md-6"><span id="countdown" class="timer"></span></th>
    </tr>
  </thead>
   <tbody>';
				$query = sprintf("SELECT questions,options,answers,questionrefid FROM $table where quiztype='$qtype'");
                $result = mysqli_query($conn,$query);
				$count='0';
				while($row=mysqli_fetch_array($result)){
					++$count;
				$op=explode('~`',$row[1]);
	$select='<tr>
      <td class="mui-col-xs-12 mui-col-md-12">
	  	<div class="mui-card">
				<ul class="mui-table-view">
					<li class="mui-table-view-cell mui-collapse">
						<a class="mui-navigate-right" href="#">Question'.$count.'     ('.$row[3].')';
						
		 $select.='</a>
						<div class="mui-collapse-content">
							<div class="answer1">
		<h3>'.$row[0];
		$select.='</h3>
		    <input type="radio"
             name="op'.$count.'"
             value="'.$op[0].'">'.$op[0].'
      <br>
      <input type="radio"
             name="op'.$count.'"
             value="'.$op[1].'">'.$op[1].'
      <br> 
      <input type="radio"
             name="op'.$count.'"
             value="'.$op[2].'">'.$op[2].'
      <br>
      <input type="radio"
             name="op'.$count.'"
             value="'.$op[3].'">'.$op[3].'
      <br>
   </div>
	</div>
		</li>
  	</ul>
		</div>
		</div>
		
  </div>
						  
						</tr>';
						echo $select;
			}


					  echo '</tbody>
					</table>
					<div class="mui-container mui--text-center">
			<button type="submit" name="submit" class="mui-btn mui-btn--primary mui-btn--raised">Submit</button>
		</div>
</form>
				</div>
			</div>
';
echo'
<script src="static/mui.min.js"></script>
		<script>
			mui.init({
				swipeBack:true //启用右滑关闭功能
			});
		</script>
</body>
</html>';

	break;
	}
	case 'fib':
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
	<link href="static/style2.css" rel="stylesheet" type="text/css" />
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
    </header>';
	echo '	<div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-height"></div>
				<br><BR>
				<div class="mui-container">
  <form class="mui-form" method="POST" action="muifill_eval.php">
		<table class="mui-table mui-table--bordered">
					  <thead>
						<tr>
						  <th>Question</th>
						
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody>';
				$query = sprintf("SELECT questions,answers FROM $table where quiztype='$qtype' ");
                $result = mysqli_query($conn,$query);
				while($row=mysqli_fetch_array($result)){
	$select='<tr>
						  <td>
	<div class="mui-text mui-col-xs-12 mui-col-md-12">
								
								'.$row[0].'
								
							</div>
						  </td>
						<td>
							<div class="mui-textfield mui-textfield--float-label">
								<input type="text" name="ans[]">
								<label>Answer</label>
							  </div>
						  </td>
						  
						</tr>';
						echo $select;
			}


					  echo '</tbody>
					</table>
					<div class="mui-container mui--text-center">
			<button type="submit" name="submit" class="mui-btn mui-btn--primary mui-btn--raised">Submit</button>
		</div>
</form>
				</div>
			</div>
';
echo'</body>
</html>';
	break;
	case 'tf':
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
	<link href="static/style2.css" rel="stylesheet" type="text/css" />
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
    </header>';
	echo '	<div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-height"></div>
				<br><BR>
				<div class="mui-container">
  <form class="mui-form" method="POST" action="muiT_Feval.php">
		<table class="mui-table mui-table--bordered">
					  <thead>
						<tr>
						  <th>Question</th>
						
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody>';
				$query = sprintf("SELECT questions,answers FROM $table where quiztype='$qtype' ");
                $result = mysqli_query($conn,$query);
				while($row=mysqli_fetch_array($result)){
	$select='<tr>
						  <td>
	<div class="mui-text mui-col-xs-12 mui-col-md-12">
								
								'.$row[0].'
								
							</div>
						  </td>
						<td>
							<div class="mui-select">
						<select name="answer[]">
						<option value="True">True</option>
						<option value="False">False</option>
						</select>
						</div>
						  </td>
						  
						</tr>';
						echo $select;
			}


					  echo '</tbody>
					</table>
					<div class="mui-container mui--text-center">
			<button type="submit" name="submit" class="mui-btn mui-btn--primary mui-btn--raised">Submit</button>
		</div>
</form>
				</div>
			</div>
';
echo'</body>
</html>';
	break;
	case 'cmcq':
	echo '<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ELEARN | Quiz</title>
<link rel="stylesheet" href="prettify.css" />
<link rel="stylesheet" href="static/mui.min.css">
<script src="prettify.js"></script>

<script>
window.onload = (function(){ prettyPrint(); });
</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<script >//<![CDATA[
$(window).load(function(){
$("#origin").sortable({connectWith: "#drop"});

$("#drop").sortable({connectWith: "#origin"});
});//]]> 
</script>
<script src="http://w3schools.com/lib/w3.js"></script>
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
.mui-appbar{
	min-height:30px;
}
.mui--appbar-height{
	height:30px;
}

</style>
<script>
myShow = w3.slideshow(".nature", 0);
</script>
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
	 
	<div id="content-wrapper"  class="mui--text-left">
      <div class="mui--appbar-height"></div>
		<div class="mui-container">
			
			<table class="mui-table">
  <thead>
    <tr>
	<br><br>
      <th class="mui-col-xs-6 mui-col-md-6">Question</th>
      <th class="mui-col-xs-6 mui-col-md-6">Answer</th>
    </tr>
  </thead>
   <tbody>';
					 $query = sprintf("SELECT questions,options,answers FROM $table where quiztype='$qtype'");
                $result = mysqli_query($conn,$query);
				$query1 = sprintf("SELECT code FROM $table where quiztype='$qtype'");
                $result1 = mysqli_query($conn,$query1);
				$count='0';
				$rows=mysqli_fetch_array($result1);
				echo $rows[0];
				$code=str_replace("<","&lt;",$rows[0]);
				while($row=mysqli_fetch_array($result)){
					++$count;
					$op=str_replace("<","&lt;",$row[1]);
				$op=explode('~`',$op);
	  echo '<tr>
	
      <td class="mui-col-xs-6 mui-col-md-6">
		Rearrange the codes accordingly to compile the following code:

<pre class="prettyprint" >
	
	';
  echo $code;
  echo' </pre>	  

	  

	  </td>
	  <form class="mui-form" method="POST" action="quiz_MCQ_eval.php">';
	  $select='
      <td class="mui-col-xs-6 mui-col-md-6">
	  	<div class="mui-card">
				<ul class="mui-table-view">
					<li class="mui-table-view-cell mui-collapse">
						<a class="mui-navigate-right" href="#">Question'.$count;
						
		 $select.='</a>
						<div class="mui-collapse-content">
							<div class="answer1">
		<h3>'.$row[0];
		$select.='</h3>
		    <input type="radio"
             name="op'.$count.'"
             value="'.$op[0].'">'.$op[0].'
      <br>
      <input type="radio"
             name="op'.$count.'"
             value="'.$op[1].'">'.$op[1].'
      <br>
      <input type="radio"
             name="op'.$count.'"
             value="'.$op[2].'">'.$op[2].'
      <br>
      <input type="radio"
             name="op'.$count.'"
             value="'.$op[3].'">'.$op[3].'
      <br>
   </div>
	</div>
		</li>
  	</ul>
		</div>
		</div>
		
  </div>';
$_SESSION['count'] = $count;  
  echo $select;
				}			echo'		 <div class="mui-container mui--text-center">
			<button type="submit" name="submit" class="mui-btn mui-btn--primary mui-btn--raised">Submit</button>
		</div>
	</td>
	
	</form>
		</div>


    </tr>
  </tbody>
</table>


		</div>


	
<script src="static/mui.min.js"></script>
		<script>
			mui.init({
				swipeBack:true //启用右滑关闭功能
			});
		</script>
	</body>
</html>';
	break;
	case 'rear':
	echo '<html>
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
			
			<table class="mui-table">
  <thead>
    <tr>
      <th class="mui-col-xs-6 mui-col-md-6">Question</th>
      <th class="mui-col-xs-6 mui-col-md-6">Answer</th>
    </tr>
  </thead>
   <tbody>';
   $query = sprintf("SELECT questions,options,answers,questionrefid FROM $table where quiztype='$qtype'");
                $result = mysqli_query($conn,$query);
				while($row=mysqli_fetch_array($result)){
   echo'
    <tr>
      <td class="mui-col-xs-6 mui-col-md-6">
		Rearrange the codes accordingly to compile the following code:

<pre class="prettyprint" style="text-align:left;">';
				$questionrefid = $row[3];
				$query1 = sprintf("SELECT code FROM $table where questionrefid='$questionrefid'");
                $result1 = mysqli_query($conn,$query1);
				$count='0';
				$qcount='0';
				$rows=mysqli_fetch_array($result1);
				$code=str_replace("<","&lt;",$rows[0]);
				echo $code;
				
	
	echo'</pre>	  
 </td>
 
  <form class="mui-form">
  <td class="mui-col-xs-6 mui-col-md-6"> 
  <div id="origin" class="fbox">';
 for($i=0;$i<4;$i++){
					++$count;
				$op=explode('~`',$row[1]);
				$op=str_replace("<","&lt;",$op);
	  $select='
	  <div class="mui-container ">';
	  $select.='
  <div class="card-example mui--z1">
    <div class="label">
      <div class="mui--text-dark-secondary mui--text-caption">
    <pre class="prettyprint map-test" id="'.$count.'"name="op[]" style="text-align:left;">
	'.$op[$qcount].'
	
	</pre>
</div>
</div>
</div>
</div>';
echo $select;
$qcount++;

				}
				}
echo'
<button  type = "button" id = "driver"  class="mui-btn mui-btn--raised mui-btn--accent">Submit</button>

	</div>
	

</td>
</form>
</tr>
    
  </tbody>
</table>
			
		</div>
    </div>


  </body>
</html>
';
	break;
	case 'short':
		echo '<html>
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
			<ul class="mui-tabs__bar mui-tabs__bar--justified">
			  <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-justified-1">Add Quiz</a></li>
			</ul>
			<div class="mui-tabs__pane mui--is-active" id="pane-justified-1">
				<div class="container">
				<table class="mui-table mui-table--bordered">
				<thead>
				   <th class="mui--text-center">Question</th> 
				   <th class="mui--text-center">Answer</th> 
				   <th class="mui--text-center">Hint 1</th> 
				   <th class="mui--text-center">Hint 2</th> 
				</thead>
				<tbody>';
   
   
   echo'<td> 
		<div class="mui-textfield mui-textfield--float-label">
		<input type="text" name="txt">
		<label>Question</label>
		</div>
		</td> 
		<td>
		<div class="mui-textfield mui-textfield--float-label">
		<input type="text" name="txt">
		<label>Answer</label>
		</div></td>
		<td> <div class="mui-textfield mui-textfield--float-label">
		<input type="text" name="txt"><label>Hint 1</label></div></td>
		<td><div class="mui-textfield mui-textfield--float-label">
		<input type="text" name="txt"><label>Hint 2</label>
		</div></td></tr>';
   echo'
    
 	</tbody>
				</table>
					
				</div>
			</div>
			
		</div>
    </div>

  </body>
</html>
';
	break;
	case 'long':
	echo '<div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-line-height mui--appbar-min-height"></div>
		<div class="mui-container">
			<ul class="mui-tabs__bar mui-tabs__bar--justified">
			  <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-justified-1">Modify Quiz</a></li>
			
			</ul>
			<div class="mui-tabs__pane mui--is-active" id="pane-justified-1">
			
				<div class="mui-container">
				<form class="mui-form" action="modify_form.php" method="POST">				
				<table class="mui-table mui-table--bordered" >
					  <thead>
						<tr>
						
						<th>Question ID</th>
						  <th>Question</th>
						  <th>Keywords</th>
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody id="dataTable">';
					  $query = sprintf("SELECT questions,options,answers,questionrefid FROM $table where quiztype='$qtype'");
                $result = mysqli_query($conn,$query);
				$count='0';
				while($row=mysqli_fetch_array($result)){
				
				++$count;
				$op=$row[1];
	  echo '<tr>
	  	<TD><INPUT type="checkbox" name="qid[]" value="'.$row[3].'">'.$row[3].'</TD>
		
      <td>
		<div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block21" name="questions[]" value='.$row[0].'>
								<label>Enter your Question</label>
							</div>
							</td>
		  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								 <input type="text" name="keywords[]" value="';
								 echo $op;
								 echo '">
								<label>Keywords</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label">
								<input type="text" id="block26" value="'.$row[2].'" name="answers[]"> 
								<label>Answer</label>
							  </div>
						  </td>
						  </tr>
	
	';
  
				}			echo'		  </tbody>
					<table>
						
							 <button type="submit" class="mui-btn mui-btn--raised mui-btn--accent" name="submit"><b>Submit</b></button>
						</table>
					</table>
					
							 </form>
						
				</div>
			</div>
			
			
		</div>
    </div>';
	break;
}
}
else{
	$message='Your Quiz Session Is Complete!!';
echo "<script>alert('$message'); location.href='../Students/report.php';</script>";
	
}
	?>
	
  
