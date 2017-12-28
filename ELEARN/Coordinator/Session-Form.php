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
 <script type="text/javascript">
var mealsByCategory = {
    Create: ["Verb","Assemble","Act","Blend","Categorize","Combine","Compile","Compose","Construct","Create","Devise","Design","Develop","Explain","Forecast","Formulate","Generate","Integrate","Invent","Improve","Imagine","Modify","Make","Organize","Originate","Perform","Plan","Prepare","Produce","Propose","Predict","Rearrange","Reconstruct","Relate","Reorganize","Revise","Rewrite","Summarize","Set up","Tell","Write"],
    Evaluate: ["Verb","Appraise","Argue","Assess","Choose","Compare","Conclude","Contrast","Criticize","Critique","Debate","Decide","Deduce","Defend","Describe","Determine","Discriminate","Evaluate","Explain","Interpret","Infer","Justify","Judge","Measure","Predict","Prioritize","Prove","Probe","Rank","Rate","Relate","Revise","Recommend","Reject","Score","Summarize", "Support","Select","Validate","Value"],
    Analyze: ["Verb","Appraise","Analyze","Arrange","Break down","Characterize","Classify","Compare","Contrast","Calculate","Criticize","Debate","Deconstruct","Deduce","Detect","Diagram","Differentiate","Discriminate","Dissect","Distinguish","Draw","Examine","Experiment","Group","Identify","Illustrate","Infer","Inquire","Inspect","Investigate","Outline","Order","Probe","Question","Relate","Research","Select","Separate","Sequence","Survey","Test"],
    Apply: ["Verb","Apply","Adapt","Change","Collect","Choose","Compute","Calculate","Construct","Draw","Dramatize","Demonstrate","Exhibit","Interview","Illustrate","Interpret","Make","Manipulate","Operate","Prepare","Produce","Practice","Role-play","Select","Show","Solve","Sequence","Transfer","Translate","Use"],
    Understand: ["Verb","Account for","Annotate","Associate","Comprehend","Convert","Conclude","Define","Defend","Describe","Distinguish","Demonstrate","Discuss","Estimate","Explain","Extend","Generalize","Gives","examples","Infer","Interpret","Identify","Illustrate","Observe","Outline","Paraphrase","Predict","Rewrite","Report","Restate","Retell","Research","Review","Recognize","Reorganize","Summarize","Translate","Tell"],
    Remember: ["Verb","Choose","Count","Cite","Define","Describe","Distinguish","Draw","Find","Group","Identify","Know","Label","List","Listen","Locate","Match","Memorize","Name","Outline","Quote","Read","Recall","Relate","Recognize","Reproduce","Repeat","Recite","Review","Record","Select","State","Sequence","Show","Sort","Tell","Underline","Write"]
}
  function changecat(cat) {
  value=cat.value;
        id=cat.id;
            var catOptions = "";
            for (categoryId in mealsByCategory[value]) {
                catOptions += "<option>" + mealsByCategory[value][categoryId] + "</option>";
            }
            document.getElementById("category".concat(id)).innerHTML = catOptions;
        }
    
</script>
	  </head>
 
    <body>
<?php include('menucood.php'); ?>
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
<form method="POST" action="sessionform.php" id="formValidate">
		  <ul class="collapsible popout" data-collapsible="accordion">
			<li>
			      	<?php 
		
		$sid=$_SESSION['sid'];
		
	    $tablename='master_course_'.$_SESSION['courseid'];
		
		$sql=sprintf("SELECT session_rationale FROM $tablename WHERE sid='$sid' ");
		$rationale=mysqli_fetch_row(mysqli_query($conn,$sql));
		$sql1=sprintf("SELECT learningplan FROM $tablename WHERE sid='$sid' ");
		$plan=mysqli_fetch_row(mysqli_query($conn,$sql1));
		$sql2=sprintf("SELECT learningoutcome FROM $tablename WHERE sid='$sid'");
        $outcome=mysqli_fetch_row(mysqli_query($conn,$sql2));
 		?>
			  <div class="collapsible-header"><i class="material-icons">filter_drama</i>Rationale/Purpose</div>
			  <div class="collapsible-body"><span>
			  <div class="container">
			  <div class="row">
			  <div class="input-field">
			        <input length="300" id="rationale" type="text" name="rationale" value="<?php echo $rationale[0] ?>
					">
					      <label class="active" for="rationale">Rationale/Purpose</label>
			  </div>
			  </div>
			  </div>
			  </span></div>
			</li>

			<li>
			  <div class="collapsible-header"><i class="material-icons">place</i>Learning outcome</div>
			  <div class="collapsible-body"><span>
			  <div class="container">
			  <div class="row">
			  <div class="input-field col s4">
			  <input type="number" id="table-row-num" placeholder="Enter no. of outcomes">
			  <a class="waves-effect waves-teal btn blue" id="oc">Submit</button>
			  </a>
			  </div>
		      <div id="table-gen">
					
					<table class="highlight ">
						 <thead> <tr>  <th>Level</th>  <th>Verb</th><th>Outcome</th>          </tr>        </thead>
						 			 <?php
             $select = " <tbody>";
			 $loarray=explode("~`",$outcome[0]); 

	$eachrow =explode("|",$loarray[0]);
	$j=0;
	$countquiz=1;
	while($j<(sizeof($loarray)-1)){
		$eachrow =explode("|",$loarray[$j]);
       //print_r($eachrow);
	   //echo $eachrow[1];
	   $select.='<TR><TD class="input-field col-sm-2"><select class="browser-default" name="lolevel[]" onChange="changecat(this);"><option value="'.$eachrow[0].'" selected disabled>'.$eachrow[0].'</option><option value="Create">Create</option><option value="Evaluate">Evaluate</option><option value="Analyze">Analyze</option><option value="Apply">Apply</option><option value="Understand">Understand</option><option value="Remember">Remember</option></select></TD>';
	   $select.='<TD class="input-field col-sm-2"><select class="browser-default" name="verb[]" id="category"><option value="'.$eachrow[1].'" disabled selected>'.$eachrow[1].'</option></select></TD>';
	   $select.='<TD class="input-field col-sm-2"><input type="text" value="'.$eachrow[2].'" id="outcome[]" name="outcome[]"><label class="active" for="outcome[]"></label></TD></TR>';
	   $j++;
	}
	$select.='</tbody>';
	echo $select;
	
		?>
						
					<tbody id="octable">
						 </tbody>
					</table>
			   </div>
			   		<script>
    $('#oc').on('click', generate);

    function generate(e) {
      var rows = $('#table-row-num').val();
      var html = '';
      for (var i = 0; i < rows; i++) {
        html += '  <tr><td class="input-field"><select class="browser-default" name="lolevel[]" id="'+i+'" onChange="changecat(this);"><option value="" disabled selected>Level</option><option value="Create">Create</option><option value="Evaluate">Evaluate</option><option value="Analyze">Analyze</option><option value="Apply">Apply</option><option value="Understand">Understand</option><option value="Remember">Remember</option></select></td><td class="input-field "><select class="browser-default" name="verb[]" id="category'+i+'"><option value="" disabled selected>Verb</option></select></td><td class="input-field "><input name="outcome[]" type="text" placeholder="Outcome"/></td></tr>';
      }
      $('#octable').html(html);
    }     
    </script>
			  </div>
			  </div>
			  </span></div>
			</li>
			<li>
			  <div class="collapsible-header"><i class="material-icons">whatshot</i>Learning Plan</div>
			  <div class="collapsible-body"><span>
				  <div class="container">
				  <div class="row">
					  <div class="input-field col s4">
					  <input type="number" id="lp-row-num" placeholder="Enter no. of learning plans">
					  <a class="waves-effect waves-teal btn blue" id="lp">Submit</a>
					  </div>
				  </div>
				  	<table class="highlight">
						 <thead> <tr>  <th>Time</th>  <th>Activity</th><th>Topic</th><th>Level</th><th></th>          </tr>        </thead>
						 <?php

	$select.='<tbody>';
	//print_r($sid);
	
	$lparray=explode("~`",$plan[0]); 
	$eachrow =explode("|",$lparray[0]);
	$k=0;
	$countquiz=1;
	while($k<(sizeof($lparray)-1)){
		$eachrow =explode("|",$lparray[$k]);
       //print_r($eachrow);
	   //echo $eachrow[1];
	   if($eachrow[1]=="Quiz"){$atype="Quiz";}else{$atype="Material";}
	   $select.='<TR><TD class="col s2"><SELECT name="time[]" class="browser-default" id="time"><option selected disabled>'.$eachrow[0].'</option><option>5 min</option><option>10 min</option><option>15 min</option><option>20 min</option></SELECT></TD>';
	   $select.='<TD class="col s2"><select class="browser-default" name="activity[]" onchange="myfunction(this);"><option selected disabled>'.$atype.'</option><option click="quizbutton()">Quiz</option><option id="material" >Material</option></select></TD>';

		    
	   $select.='<TD class="col-sm-2"><INPUT id="topic" name="topic[]" value="'.$eachrow[2].'" type="text" /></TD>';
	   $select.='<TD class="col-sm-2"><SELECT class="browser-default" name ="planlevel[]" id ="level" ><option selected disabled>'.$eachrow[3].'</option><option>Level 1</option><option>Level 2</option><option>Level 3</option></SELECT></TD>
	   <TD id="uploadinsert"></TD>
	   </TR>';
	   $k++;
	}
	$select.='</tbody>';
	echo $select;
	?>	
					<tbody id="lptable">
					</tbody>
					</table>
					<script text="javascript">function myfunction(string){str=string.value;id=string.id; 
					if (str=="Quiz"){document.getElementById("uploadinsert".concat(id)).innerHTML = '<a href="../quiz/muifrontend.php?q='+(id*1+1)+'" target="_blank" class="waves-effect waves-light btn-flat red lighten-1" id="quizmaterial" style="color:white">Quiz</a>';}else{document.getElementById("uploadinsert".concat(id)).innerHTML = '<a href="http://localhost:8080" target="_blank" class="waves-effect waves-light btn-flat orange lighten-1" style="color:white" id="quizmaterial">Material</a>';}}</script>
					<script>
				 $('#lp').on('click', generate);

					function generate(e) {
					  var rows = $('#lp-row-num').val();
					  var html = '';
					  for (var i = 0; i < rows; i++) {
						html += '<TR>	 <TD class="input-field col s12"><SELECT name="time[]" class="browser-default" id="time"><option>Time</option><option>5 min</option><option>10 min</option><option>15 min</option><option>20 min</option></SELECT></TD><TD class="input-field col s12"><select class="browser-default" name="activity[]" id="'+i+'" onchange="myfunction(this);"><option>Activity</option><option click="quizbutton()">Quiz</option><option value="localhost:8080" id="material" >Material</option></select></TD><TD class="input-field col s12"><INPUT id="topic" name="topic[]" placeholder="Topic" type="text" /></TD><TD class="input-field col s12"><SELECT class="browser-default" name ="planlevel[]" id ="level" ><option>Level</option><option>Level 1</option><option>Level 2</option><option>Level 3</option></SELECT></TD><TD id="uploadinsert'+i+'" ></TD></TR>';

					  
					  }
					  $('#lptable').html(html);
					}     
					</script>
				</div>
			 </span></div>
			</li>
			<li>
			  <div class="collapsible-header"><i class="material-icons">whatshot</i>Learning Material</div>
			  <div class="collapsible-body"><span>
			  	
<i>(Descriptive/ Concept Map/ Mind-Map etc., to be prepared by faculty member)

Animated PPT / Video lecture
</i>
	<html>
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <style>
    #drop_zone {
      border: 2px dashed #bbb;
      -moz-border-radius: 5px;
      -webkit-border-radius: 5px;
      border-radius: 5px;
      padding: 25px;
      text-align: center;
      font: 20pt bold 'Helvetica';
      color: #bbb;
    }
    </style>
  </head>
  <body>
      <span id="signin">
        <span
          class="g-signin"
          data-callback="signinCallback"
          data-clientid="295348454364-4usnq8dv3lru8s48qm7ha05sssup6jps.apps.googleusercontent.com"
          data-cookiepolicy="single_host_origin"
          data-scope="https://www.googleapis.com/auth/drive.file" ,"https://spreadsheets.google.com/feeds","https://docs.google.com/feeds">
        </span>
      </span>

      <div id="drop_zone" style="display:none;">Drop files here</div>
     
     
     <script src="upload.js"></script>
     <script type="text/javascript">
     
       var accessToken = null;
       
       /**
        * Callback for G+ Sign-in. Swaps views if login successful.
        */
       function signinCallback(result) {
           if(result.access_token) {
               accessToken = result.access_token;
               document.getElementById('signin').style.display = 'none';
               document.getElementById('drop_zone').style.display = null;
           }
       }
 
       /**
        * Called when files are dropped on to the drop target. For each file,
        * uploads the content to Drive & displays the results when complete.
        */
       function handleFileSelect(evt) {
         evt.stopPropagation();
         evt.preventDefault();

         var files = evt.dataTransfer.files; // FileList object.
         
         var output = [];
         for (var i = 0, f; f = files[i]; i++) {
             var uploader = new MediaUploader({
                 file: f,
                 token: accessToken,
                 onComplete: function(data) {
                     var element = document.createElement("pre");
                     element.appendChild(document.createTextNode(data));
                     document.getElementById('results').appendChild(element);
                 }
             });
             uploader.upload();
         }
       }

       /**
        * Dragover handler to set the drop effect.
        */
       function handleDragOver(evt) {
         evt.stopPropagation();
         evt.preventDefault();
         evt.dataTransfer.dropEffect = 'copy'; 
       }

       /**
        * Wire up drag & drop listeners once page loads
        */
       document.addEventListener('DOMContentLoaded', function () {
           var dropZone = document.getElementById('drop_zone');
           dropZone.addEventListener('dragover', handleDragOver, false);
           dropZone.addEventListener('drop', handleFileSelect, false);
       });

     </script>
     <script src="https://apis.google.com/js/client:plusone.js"></script>
  </body>
</html>
			  </span></div>
			</li><li>
			  <div class="collapsible-header"><i class="material-icons">whatshot</i>Learning Verification</div>
			  <div class="collapsible-body"><span>
			  <div class="container">
			  <br>
			  <center>
			  	<a href="#" onclick="alert('Learning Verification is on a Hold!')" class="waves-effect waves-teal btn orange">Quiz</a>
				</center>
			  </div>
			  <br>
			  </span></div>
			</li>
		  </ul>
		  <center>
			<button class="btn waves-effect waves-light green" type="submit" name="submit" onclick="markCompleteDone()">Submit
			<i class="material-icons right">send</i>
		     </button>
		  </center>
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
				    $(document).ready(function() {
    $('input#input_text, textarea#textarea1').characterCounter();
  });
				   $(document).ready(function() {
    Materialize.updateTextFields();
  });
        
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