<?php
session_start();

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
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.js"></script>
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

	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-LEARN | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
          success: function(data) {
              console.log(data);
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../dist/img/srm_logo.png" style="width:90%" class="img-circle" alt="SRM Logo"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>E</b>LEARN</span>
			
    </a>
	

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

	<!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>

      </a>
      <div class="navbar-custom-menu">

	   <ul class="nav navbar-nav">

          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">       
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">Welcome <?php echo $_SESSION['username']; ?></span>
            </a>  
          </li>
          
          <li class="dropdown user user-menu">
			  <a href="logout.php" ><i>Sign out</i></a>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
  
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span> Dashboard</span>
            </a>
        </li>
        <li class="treeview">
          <a href="Adduser.php">
            <i class="fa fa-user-plus"></i>
            <span> User Creation</span>
      
            
          </a>
       
        </li>
     
        <li class="active treeview">
          <a href="MyCourse.php">  
            <i class="fa fa-tasks"></i>
          <span> My Course</span>
          
          </a>
        </li>
        <li class="treeview">
          <a href="Report.php">
            <i class="fa fa-laptop"></i>
            <span> Report</span>
            
          </a>
         </li>
        <li class="treeview">
          <a href="Notification.php">
            <i class="fa fa-exclamation-circle"></i> 
			<span> Notification</span>
		
          </a>
     
        </li>
       <li class="treeview">
          <a href="ChangePwd.php">
            <i class="fa fa-edit"></i>
            <span> Change Password</span>
            
          </a>
         </li>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<br>	
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> My Course</a></li>
		<li><a href="#"><i class="fa fa-dashboard"></i> Content Upload</a></li>
		<li class="active">Session</li>
        
      </ol>
    </section>
	<center>
	<form>
	<button type="submit" class="btn btn-success" id="start" onclick="markHalfDone()">Start Session</button>
	<script type="text/javascript">
        $("#start").click(function(e) {
			e.preventDefault();
  $(".session.hidden:first").removeClass("hidden");
  return false;
});
    </script>
	</form>
	</center>
	<!-- /.session div start -->
   <div class="session hidden" >
    <!-- Main content -->
    <section class="content">
	<div class="panel-group" id="accordion">
	
	<form class="form-horizontal" action="plansession.php" method="POST">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Learning Plan</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
	
	<center>	<div class=" col-sm-4">
	<input type="number" class="form-control" id="lp-row-num" placeholder="enter no. of learning plan">
    <input type="button" value="Submit" class="btn btn-default" id="lp"></input>
    </div>
	</center>
    <div>
        
        <table id="lptable" class="table table-hover table-responsive">
          
        </table>
    </div>
		<br>
	<center>
	<div class="btn-group">
	
	<button type="submit" name="submit" onclick()="markHalfDone() " class="btn btn-success">Submit</button>
	</div>
	</center>

	</div>
      </div>
    </div>
	</form>
	<script text="javascript">function myfunction(string){str=string.value;id=string.id; 
	if (str=="Quiz"){document.getElementById("uploadinsert".concat(id)).innerHTML = '<a href="../quiz/muifrontend.php?q='+(id*1+1)+'" target="_blank"><input type="button" value="Quiz" target="#" class="form-control btn-default" id="quizmaterial"></a>';}else{window.location = str;}}</script>
	<script>
    $('#lp').on('click', generate);

    function generate(e) {
      var rows = $('#lp-row-num').val();
      var html = '';
      for (var i = 0; i < rows; i++) {
        html += '<TR>	 <TD class="col-sm-2"><SELECT name="time[]" class="form-control" id="time"><option>Time</option><option>5 min</option><option>10 min</option><option>15 min</option><option>20 min</option></SELECT></TD><TD class="col-sm-2"><select  class="form-control" name="activity[]" id="'+i+'"onchange="myfunction(this);"><option>Activity</option><option click="quizbutton()">Quiz</option><option value="localhost:8080" id="material" >Material</option></select></TD><TD class="col-sm-2"><INPUT class="form-control" id="topic" name="topic[]" placeholder="Topic" type="text" /></TD><TD class="col-sm-2"><SELECT class="form-control" name ="planlevel[]" id ="level" ><option>Level</option><option>Level 1</option><option>Level 2</option><option>Level 3</option></SELECT></TD><TD id="uploadinsert'+i+'" ></TD></TR>';
      }
      $('#lptable').html(html);
    }     
    </script>
	

  
</div>
      </div>
    </div>
  </div> 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.session div end -->
	</div>
  <!-- /.content-wrapper -->
 

  <!--ADD THAT CONTROL SIDEBAR STUFF OVER HERE-->

</div>
<!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>


<?php
  echo "<p class=\"hidden\" id=\"sessionID\" >".$_REQUEST['crefid']."U".$_REQUEST['u']."S".$_REQUEST['s']."</p>";
?>
</body>
</html>
