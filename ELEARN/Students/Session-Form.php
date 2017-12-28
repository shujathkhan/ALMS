<?php
session_start();
require_once 'dbconfig.php';
?>
<!DOCTYPE html>
<?php


  if(isset($_REQUEST['u'])) {
    //request is present
    $_SESSION['u'] = $_REQUEST['u'];
    $_SESSION['crefid'] = $_REQUEST['crefid'];
    $_SESSION['s'] = $_REQUEST['s'];
  }else {
    $_REQUEST['u'] = $_SESSION['u'];
    $_REQUEST['crefid'] = $_SESSION['crefid'];
    $_REQUEST['s'] = $_SESSION['s'];
  }
?>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css'>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<style>
		header, main, footer {
			padding-left: 240px;
		  }

		  @media only screen and (max-width : 992px) {
			header, main, footer {
			  padding-left: 0;
			}
		  }
		  
	</style>
	<style>
		.hidden{
			display:none;
		}
	</style>
	<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.js"></script>

<script>

  //My Code
      function markHalfDone() {
		  
      var sessionID = $("#sessionID").text();
		
        $.ajax({
          url: "dependencies/helper/mark.half.helper.php",
          data: {
            "id" : sessionID
          },
          method: "POST",
          success: function(codedata) {
              console.log(codedata);
          },
          error: function() {
            
          }
        });
		return false;
      } // end of -> markHalfDone


      function markCompleteDone() {
        var sessionID = $("#sessionID").text();

        $.ajax({
          url: "dependencies/helper/mark.full.helper.php",
          data: {
            "id" : sessionID
          },
          method: "POST",
          success: function(codedata) {
              console.log(codedata);
          },
          error: function() {
           
          }
        });
		return false;
      } // end od -> markCompleteDone
</script>
<script>
    $(document).ready(function() {
       $("#abutton").click(function(e){
		event.preventDefault();

          $("#toshow").css('display', 'block');
$("#rationale").prop("disabled", true);
		  
       });
    });
    </script>
<script>
    $(document).ready(function() {
       $("#abutton1").click(function(e){

          e.preventDefault();
          $("#toshow1").css('display', 'block');
$('#block21,#block22,#block23,#block24,#block25,#block26').prop("disabled", true);
       });
    });
    </script>

<script>
    $(document).ready(function() {
       $("#abutton2").click(function(e){
	   
          e.preventDefault();
          $("#toshow2").css('display', 'block');
		  $('#block31,#block32,#block33,#block34,#block35,#block36,#block37,#block38').prop("disabled", true);
       });
    });
    </script>
	
<script>
    $(document).ready(function() {
       $("#abutton3").click(function(e){
	   
          e.preventDefault();
          $("#toshow3").css('display', 'block');
		  $("#comment").prop("disabled", true);
       });
    });
    </script>

		
<script>
    $(document).ready(function() {
       $("#abutton5").click(function(e){
	   
          e.preventDefault();
          $("#toshow3").css('display', 'block');
		  $("#toq").prop("disabled", true);
       });
    });
    </script>
  <script>

  //My Code
      function markHalfDone() {
		  
      var sessionID = $("#sessionID").text();
		
        $.ajax({
          url: "dependencies/helper/mark.half.helper.php",
          data: {
            "id" : sessionID
          },
          method: "POST",
          success: function(codedata) {
              console.log(codedata);
          },
          error: function() {
            
          }
        });
		return false;
      } // end of -> markHalfDone


      function markCompleteDone() {
        var sessionID = $("#sessionID").text();

        $.ajax({
          url: "dependencies/helper/mark.full.helper.php",
          data: {
            "id" : sessionID
          },
          method: "POST",
          success: function(codedata) {
              console.log(codedata);
          },
          error: function() {
           
          }
        });
		return false;
      } // end od -> markCompleteDone
</script>
	  </head>
 
    <body>
<?php include('menustud.php'); ?>
	<br>
	<br>
	<div class="container">
	
			<center>
				<form>
				<button id="start" type="submit" class="waves-effect waves-light btn green light-2"  onclick="markHalfDone()">Start Session</button>
				<script type="text/javascript">
							$("#start").click(function(e) {
								e.preventDefault();
					  $("div").removeClass("hidden");
					  return false;
					});
				</script>
				</form>
			</center>
			<br>
<!--||||||||||||||||||||||||||||||||||||||||||||||||||SESSION START||||||||||||||||||||||||||||||||||||||||||||||||||-->
<div class="hidden" >
<form>
      	<?php 
		
		$sid=$_SESSION['sid'];
	    $tablename='student_'.$_SESSION['courseid'].'_'.$_SESSION['id'];
		$rationale=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT session_rationale FROM $tablename WHERE sid='$sid' ")));
		$plan=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT learningplan FROM $tablename WHERE sid='$sid' ")));
        $outcome=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT learningoutcome FROM $tablename WHERE sid='$sid' ")));
 		?>
	<div id="rationale" class="container">
		<h5>Session Rationale/Purpose</h5>
			  
			  <div class="input-field">
			        <textarea class="materialize-textarea" length="300" name="rationale" placeholder="<?php echo $rationale[0] ?>
					 " disabled></textarea>
					
			  </div>
			  	<center>
			<button class="btn waves-effect waves-light green" type="button" id="abutton">Submit
	
		     </button>
		</center>
			  </div>
			<br>
			<br>			
	
		  <br>
		  <br>
			
		
			  <div class="container" style="display:none" id="toshow">
			<h5>Learning Outcome</h5>
			  <div class="row" name="suppliers">
			 
	&nbsp;&nbsp;<TABLE class="highlight responsive-table" id="dataTable" >
	<thead><tr>
		<th>Level</th>
		<th>Verb</th>
		<th>Outcome</th>
	</tr></thead>
       <tbody>
                       
			 <?php
             $select = "";
			 $loarray=explode("~`",$outcome[0]); 

	$eachrow =explode("|",$loarray[0]);
	$j=0;
	$countquiz=1;
	while($j<(sizeof($loarray)-1)){
		$eachrow =explode("|",$loarray[$j]);
       //print_r($eachrow);
	   //echo $eachrow[1];
	   $select.='<TR><TD >'.$eachrow[0].'</TD>';
	   $select.='<TD >'.$eachrow[1].'</TD>';
	   $select.='<TD >'.$eachrow[2].'</TD></TR>';
	   $j++;
	}
	$select.='</tbody></table>';
	echo $select;
		?>
           
      
    <br>
			  </div>
			  <center>
			  		<button class="btn waves-effect waves-light green" type="button" id="abutton1">Submit</button>
		</center>
			  </div>
			
				  <div class="container" id="toshow1" style="display:none">
		<h5>Learning Plan</h5>
		
				<div class="row" name="suppliers">
	
	<?php
	$select='&nbsp;&nbsp;<table class="highlight responsive-table">';
	$select.='<thead><tr>';
	$select.='<th>Time</th>';
	
	$select.='<th>Activity</th>';
	$select.='<th>Topic</th>';
	$select.='<th>Level</th>';
	$select.='</tr></thead><tbody>';
	//print_r($sid);
	
	$loarray=explode("~`",$plan[0]); 
	$eachrow =explode("|",$loarray[0]);
	$j=0;
	$countquiz=1;
	while($j<(sizeof($loarray)-1)){
		$eachrow =explode("|",$loarray[$j]);
       //print_r($eachrow);
	   //echo $eachrow[1];
	   $select.='<TR><TD>'.$eachrow[0].'</TD>';
	   if($eachrow[1] =='Material')
			$select.='<TD><a href="localhost:8080" target="_blank" class="btn waves-effect waves-light green">Material</a></TD>';
		elseif($eachrow[1] =='Quiz'){
		    $select.='<TD><a href="../quiz/quiz_stud.php" target="_blank" class="btn waves-effect waves-light green" id="quizmaterial">Quiz</a></TD>';
			$_SESSION['quizno']=$countquiz;
		    $countquiz++;
		}
		    
	   $select.='<TD>'.$eachrow[2].'</TD>';
	   $select.='<TD>'.$eachrow[3].'</TD></TR>';
	   $j++;
	}
	$select.='</tbody></table>';
	echo $select;
	?>
				</div>
					  <center>
			  		<button class="btn waves-effect waves-light green" type="button" id="abutton2">Submit
		     </button>
			 </center>
				</div>

	<div class="container" style="display:none" id="toshow2">
			<h5>Learning Material</h5>
		
<i>&nbsp;&nbsp;(Descriptive/ Concept Map/ Mind-Map etc., to be prepared by faculty member)

Animated PPT / Video lecture
</i><br><br><center>
	&nbsp;&nbsp;<a href="google-drive.html" class="btn waves-effect waves-light yellow" id="quizmaterial">View files</a></center>
				 <br>
			 <br>
  		  <center>
			  		<button class="btn waves-effect waves-light green" type="button" id="abutton3">Submit
		     </button>

			 </center>
			 <br>
			 <br>
			 </div>
	  <div class="container" style="display:none" id="toshow3">
			<h5>Learning Verification</h5>
		
			  <br>
			  <br>
			  <center>
			  	<a href="../quiz/quiz_stud.php" target="_blank" class="waves-effect waves-teal btn orange">Quiz</a>
				</center>
				  <center>
				  <br>
				  <br>
			<button class="btn waves-effect waves-light green" type="submit" onclick="markCompleteDone();" id="abutton5" name="action">Submit
			<i class="material-icons right">send</i>
		     </button>
		  </center>
			  </div>
			  <br>
			  
		
		  </form>
	</div>
</div>
		  
      <!--Import jQuery before materialize.js-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js'></script>
        
		  <script>   
				$('.button-collapse').sideNav({
					  menuWidth: 300, // Default is 240
					  edge: 'left', // Choose the horizontal origin
					  closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
					}
				  );
				// Show sideNav
				//$('.button-collapse').sideNav('show');
			/*		   $("#formValidate").validate({
        rules: {
			time:"required",           
		   activity:"required",     
            topic:
				required: true,
            },
           
            planlevel:"required",
            
            
        },
        //For custom messages
        messages: {
            time:"Enter a username",
            activity:"Enter a username",
            topic:"Enter a username",
            planlevel: "Enter your website",
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
     */
		  </script> 
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		  <?php
  echo "<p class=\"hidden\" id=\"sessionID\" >".$_REQUEST['crefid']."U".$_REQUEST['u']."S".$_REQUEST['s']."</p>";
?>
	</body>
  </html>