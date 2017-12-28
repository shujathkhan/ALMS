<!DOCTYPE html>
<?php
  session_start();
	    
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
<script src="../dist/js/jquery-1.3.2.min.js" type="text/javascript"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.php" class="logo">
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
     
        <li class="active treeview">
          <a href="MyCourse.php">
            <i class="fa fa-tasks"></i>
            <span> My Course</span>    </a>
         
        </li>
        <li class="treeview">
          <a href="Report.php">
            <i class="fa fa-clipboard"></i>
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
	&nbsp;&nbsp;<div class="page-header">
      <h1>
           
      </h1>
	  </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> My Course</a></li>
	
		<li class="active">Session Form</li>
        
      </ol>
    </section>
<form>
<center>
	<button type="submit" class="btn btn-success" id="start" onclick="markHalfDone()">Start Session</button>
	</center>
	<script type="text/javascript">
        $("#start").click(function(e) {
			//e.preventDefault();
  $(".session.hidden:first").removeClass("hidden");
  return false;
});
    </script>
	</form>
    <!-- Main content -->
	   <div class="session hidden" >
    <section class="content">
      	<?php 
		include('dbconfig.php');
		$sid=$_SESSION['sid'];
	    $tablename='student_'.$_SESSION['courseid'].'_'.$_SESSION['id'];
		$rationale=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT session_rationale FROM $tablename WHERE sid='$sid' ")));
		$plan=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT learningplan FROM $tablename WHERE sid='$sid' ")));
        $outcome=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT learningoutcome FROM $tablename WHERE sid='$sid' ")));
 		?>
	<form class="form-horizontal">
	
	<h2>Rationale/Purpose:</h2>
    <div class="form-group">
      
      <div class="col-sm-12">
        <textarea disabled type="text" value="<?php echo $rationale ?>"  class="form-control" rows="6" cols="6"  id="rationale" placeholder="<?php echo $rationale[0] ?>"></textarea>
      </div>
    </div>
	<center>
	<div class="btn-group " >
	  <button id="abutton" type="button" class="btn btn-success">Submit</button>
	  
	</div>
	</center>
	</form>
	<br>

<div class="row" id="toshow" style="display:none" name="suppliers">
	<h2>&nbsp;&nbsp;Learning Outcome:</h2>
	&nbsp;&nbsp;<TABLE class="table table-hover table-responsive" id="dataTable" >
	<tr>
		<th>Level</th>
		<th>Verb</th>
		<th>Outcome</th>
	</tr>
        <TR>
                       
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
	   $select.='<TR><TD class="col-sm-2">'.$eachrow[0].'</TD>';
	   $select.='<TD class="col-sm-2">'.$eachrow[1].'</TD>';
	   $select.='<TD class="col-sm-2">'.$eachrow[2].'</TD></TR>';
	   $j++;
	}
	$select.='</table>';
	echo $select;
		?>
           
        </TR><br>
    </TABLE><br>
	<center>
	<div class="btn-group">
	
	<button id="abutton1" type="button" class="btn btn-success">Submit</button>
	</center>
	</div>
	<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.js"></script>
<div class="row" id="toshow1" style="display:none"  name="suppliers">
	<h2>&nbsp;&nbsp;Learning Plan:</h2>
	<?php
	$select='&nbsp;&nbsp;<table class="table table-hover table-responsive">';
	$select.='<tr>';
	$select.='<th>Time</th>';
	
	$select.='<th>Activity</th>';
	$select.='<th>Topic</th>';
	$select.='<th>Level</th>';
	$select.='</tr>';
	//print_r($sid);
	
	$loarray=explode("~`",$plan[0]); 
	$eachrow =explode("|",$loarray[0]);
	$j=0;
	$countquiz=1;
	while($j<(sizeof($loarray)-1)){
		$eachrow =explode("|",$loarray[$j]);
       //print_r($eachrow);
	   //echo $eachrow[1];
	   $select.='<TR><TD class="col-sm-2">'.$eachrow[0].'</TD>';
	   if($eachrow[1] =='Material')
			$select.='<TD class="col-sm-2"><a href="localhost:8080" target="_blank"><input type="button" value="Material" target="#" class="form-control btn-default"></a></TD>';
		elseif($eachrow[1] =='Quiz'){
		    $select.='<TD class="col-sm-2"><a href="../quiz/quiz_stud.php" target="_blank"><input type="button" value="Quiz" target="#" class="form-control btn-default" id="quizmaterial"></a></TD>';
			$_SESSION['quizno']=$countquiz;
		    $countquiz++;
		}
		    
	   $select.='<TD class="col-sm-2">'.$eachrow[2].'</TD>';
	   $select.='<TD class="col-sm-2">'.$eachrow[3].'</TD></TR>';
	   $j++;
	}
	$select.='</table>';
	echo $select;
	?>
	<center>
	<button id="abutton2" type="button" class="btn btn-success">Submit</button>
	</center>
</div>	
	
	
	<div class="row" id="toshow2" style="display:none" name="suppliers">
	<form class="form-horizontal">
	
			<div class="form-group">
			<div class="col-sm-12"><h2>&nbsp;&nbsp;Learning Material:</h2>
			<form class="form-horizontal">
	
<i>&nbsp;&nbsp;(Descriptive/ Concept Map/ Mind-Map etc., to be prepared by faculty member)

Animated PPT / Video lecture
</i><br><center>
	&nbsp;&nbsp;<a href="google-drive.html"><button type="button" class="btn btn-success">View files</button></a></center>
			</div>
			</div><center>
	<div class="btn-group">
	
	
	</div>
	<button id="abutton3" type="submit" class="btn btn-success">Submit</button>
	</center>
			
			</div>
		
	
	<div class="row" id="toshow3" style="display:none" name="suppliers">
	<h2>&nbsp;&nbsp;Learning Verfication:</h2>
		<div class="form-group">
			<div class=" col-sm-12">
	
	
		<a href="#" target="_blank"><button type="button" class="btn btn-info">&nbsp;&nbsp;Quiz</button>
			
			</div>
			</div>
	
	<form class="form-horizontal"  onsubmit="return redirect()">
	<div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10"/>
    </div>
	<center>
	<div class="btn-group">
	  
	  <button type="submit" id="adbutton5" onclick="markCompleteDone()" class="btn btn-success">Submit</button>
	
	</div>
	</center>
  </form>

    </section>
	
    <!-- /.content -->
  </div>
  </div>
  <!-- /.content-wrapper -->
 

  <!--ADD THAT CONTROL SIDEBAR STUFF OVER HERE-->
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../dist/js/app.min.js"></script>

<?php
  echo "<p class=\"hidden\" id=\"sessionID\" >".$_REQUEST['crefid']."U".$_REQUEST['u']."S".$_REQUEST['s']."</p>";
?>


</body>
</html>
