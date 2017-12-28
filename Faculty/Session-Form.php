<?php
session_start();
require_once 'dbconfig.php';
?>
<!DOCTYPE html>

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
<?php include('menufac.php'); ?>
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
	    $tablename='master_course_'.$_SESSION['courseid'];
		
		$plan=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT learningplan FROM $tablename WHERE sid='$sid' ")));
      
 		?>
	
			
				  <div class="container" >
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
			  		

			<button class="btn waves-effect waves-light green" type="submit" onclick="markCompleteDone();" id="abutton5" name="action">Submit
			<i class="material-icons right">send</i>
		     </button>
			 </center>
				</div>

		
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
  echo "<p class=\"hidden\" id=\"sessionID\" >".$_SESSION['sid']."</p>";
?>
	</body>
  </html>