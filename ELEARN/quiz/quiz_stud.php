<!doctype html>
<?php
session_start();
require_once 'dbconfig.php';
//require_once 'timer.php';
	$sid = $_SESSION['sid'];
	$id = $_SESSION['id'];
	$t="quiz_$id"."_$sid";
	
	$table = sprintf("CREATE TABLE $t
(
questionrefid varchar(20),
question varchar(300),
answer varchar(300),
PRIMARY KEY(`questionrefid`)
)");
                $result = mysqli_query($conn,$table);
    
	$stutable = 'student_'.$_SESSION['courseid'].'_'.$_SESSION['id'];
	$query = sprintf("SELECT quizstatus FROM $stutable where sid='$sid'");
                $result = mysqli_query($conn,$query);
                $row = mysqli_fetch_row($result);
				$tablename='student_'.$_SESSION['courseid'].'_'.$_SESSION['id'];
				$querys = sprintf("UPDATE $tablename SET quizstatus='0' WHERE sid='$sid'");
$results=mysqli_query($conn,$querys);
?>
	
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ELEARN | Quiz</title>
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'>
	

</head>
<body>

 <nav>
    <div class="nav-wrapper red lighten-1">
      <a href="#" class="brand-logo center">ELEARN | Quiz</a>
    
    </div>
  </nav>
        
  <br>
  <br>
  		<div class="container">  
		<div class="row">
		<?php
$id = '1';//$_SESSION['quizno'];
  $quizrefid = $sid.'Q'.$id;
  $_SESSION['quizrefid'] = $quizrefid;
	$table = 'quiz_table_'.$_SESSION['courseid'];
    $_SESSION['quiztable'] = $table;
	$query1 = sprintf("SELECT DISTINCT quiztype FROM $table where quizrefid='$quizrefid'");				
                $result1 = mysqli_query($conn,$query1);
				
                while($row1 = mysqli_fetch_row($result1)){
	 $qtype = $row1[0];
$_SESSION['qtype']=$qtype;

if($qtype=='mcq'){
	echo'
	
			<div class="col s12 m4">
			  <div class="card hoverable light-blue lighten-1">
				<div class="card-content white-text">
				  <span class="card-title">MCQ</span>
				</div>
				<div class="card-action disabled" >
				   <button class="waves-effect waves-light btn red accent-3 modal-trigger" id="mcq" href="#modal'.$qtype.'" >START</button>
				   
				</div>
			  </div>
				<div id="modal'.$qtype.'" class="modal">
				  <div class="modal-content">';
include('mcqmat.php');
		echo '</div>
				  <div class="modal-footer">
					<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">END Quiz</a>
				  </div>
				</div>
			</div>
		  
	
';
				}
else 
	switch($qtype){
	case 'fib':
	{
	echo'
	
			<div class="col s12 m4">
			  <div class="card hoverable light-blue lighten-1">
				<div class="card-content white-text">
				  <span class="card-title">FILL IN THE BLANKS</span>
				</div>
				<div class="card-action disabled" >
				   <button class="waves-effect waves-light btn red accent-3 modal-trigger" id="fib" href="#modal'.$qtype.'" >START</button>
				   
				</div>
			  </div>
				<div id="modal'.$qtype.'" class="modal">
				  <div class="modal-content">';
		include('fillmat.php');
	
		echo '</div>
				  <div class="modal-footer">
					<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">END Quiz</a>
				  </div>
				</div>
			</div>
		  
	
';
		break;		}
	case 'tf':
	{
	echo'
	
			<div class="col s12 m4">
			  <div class="card hoverable light-blue lighten-1">
				<div class="card-content white-text">
				  <span class="card-title">TRUE OR FALSE</span>
				</div>
				<div class="card-action disabled" >
				   <button class="waves-effect waves-light btn red accent-3 modal-trigger" id="tf" href="#modal'.$qtype.'" >START</button>
				   
				</div>
			  </div>
				<div id="modal'.$qtype.'" class="modal">
				  <div class="modal-content">';
		include('tfmat.php');
		echo '</div>
				  <div class="modal-footer">
					<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">END Quiz</a>
				  </div>
				</div>
			</div>
		  
	
';
		break;		}
			case 'short':
	{
	echo'
	
			<div class="col s12 m4">
			  <div class="card hoverable light-blue lighten-1">
				<div class="card-content white-text">
				  <span class="card-title">SHORT ANSWERS</span>
				</div>
				<div class="card-action disabled" >
				   <button class="waves-effect waves-light btn red accent-3 modal-trigger" id="short" href="#modal'.$qtype.'" >START</button>
				   
				</div>
			  </div>
				<div id="modal'.$qtype.'" class="modal">
				  <div class="modal-content">';
		include('shortmat.php');
		echo '</div>
				  <div class="modal-footer">
					<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">END Quiz</a>
				  </div>
				</div>
			</div>
		  
	
';
		break;		}
		case 'long':
	{
	echo'
	
			<div class="col s12 m4">
			  <div class="card hoverable light-blue lighten-1">
				<div class="card-content white-text">
				  <span class="card-title">LONG ANSWERS</span>
				</div>
				<div class="card-action disabled" >
				   <button class="waves-effect waves-light btn red accent-3 modal-trigger" id="long" href="#modal'.$qtype.'" >START</button>
				   
				</div>
			  </div>
				<div id="modal'.$qtype.'" class="modal">
				  <div class="modal-content">';
		include('longmat.php');
		echo '</div>
				  <div class="modal-footer">
					<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">END Quiz</a>
				  </div>
				</div>
			</div>
		  
	
';
		break;		}
	case 'cmcq':
	{
	echo'
	
			<div class="col s12 m4">
			  <div class="card hoverable light-blue lighten-1">
				<div class="card-content white-text">
				  <span class="card-title">CODE BASED MCQ</span>
				</div>
				<div class="card-action disabled" >
				   <button class="waves-effect waves-light btn red accent-3 modal-trigger" id="lol" href="#modal'.$qtype.'" >START</button>
				   
				</div>
			  </div>
				<div id="modal'.$qtype.'" class="modal">
				  <div class="modal-content">';
		include('cmcqmat.php');
		echo '</div>
				  <div class="modal-footer">
					<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">END Quiz</a>
				  </div>
				</div>
			</div>
		  
	
';
		break;		}


	
	default:
	
	{
	echo'
	
			<div class="col s12 m4">
			  <div class="card hoverable light-blue lighten-1">
				<div class="card-content white-text">
				  <span class="card-title">NO QUIZ</span>
				</div>
				<div class="card-action disabled" >
				   <button class="waves-effect waves-light btn red accent-3" disabled>START</button>
				   
				</div>
			  </div>
				
			</div>
		  
	
';
		break;		}
}
		}
		
		?>		
			
</div>
</div>
<script>
		
		$(document).ready(function(){
			
			$("#result").click(function(){
				
				if (confirm("Are you sure you want to finish the quiz? Disclaimer:You wont be able to retrieve these score again!!!!")) {
				location.href="result.php";
			}
			else{
				return false;
			}
			});
			
		});
		</script>
<center>
<div id="result">
 <button class="waves-effect waves-light btn light-green accent-4" id="result" >SUBMIT</button>
</div>
</center>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js'></script>

    <script src="js/js/index.js"></script>

</body>
</html>