<!DOCTYPE html>
<?php
  session_start();

  if(isset($_REQUEST['u'])) {
    //request is present
    $_SESSION['u'] = $_REQUEST['u'];
    $_SESSION['sub'] = $_REQUEST['sub'];
    $_SESSION['s'] = $_REQUEST['s'];
  }else {
    $_REQUEST['u'] = $_SESSION['u'];
    $_REQUEST['sub'] = $_SESSION['sub'];
    $_REQUEST['s'] = $_SESSION['s'];
  }
?>
<html>
<head>
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
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  
               
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
         
              <span class="hidden-xs">Welcome <?php echo $_SESSION['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
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
	<button type="submit" class="btn btn-success" id="start" onclick="markHalfDone()">Start Session</button>
	<script type="text/javascript">
        $("#start").click(function(e) {
			e.preventDefault();
  $(".session.hidden:first").removeClass("hidden");
  return false;
});
    </script>
	</form>
    <!-- Main content -->
	
    <section class="content">
      	<?php 
		require_once('dbconfig.php');
		//echo $_SESSION['sid'];
		//echo $_SESSION['courseid'];
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
        <textarea disabled type="text" value="<?php echo $rationale."</br>" ?>"  class="form-control" rows="6" cols="6"  id="rationale" placeholder="<?php echo $rationale[0]."</br>" ?>"></textarea>
      </div>
    </div>
	<center>
	<div class="btn-group " >
	  <button id="abutton" type="button" class="btn btn-success">Submit</button>
	  
	</div>
	</center>
	</form>
	<br>
	<script type="text/javascript">
$(document).ready(function(){
    $("select.country").change(function(){
        var selectedCountry = $(".country option:selected").val();
        $.ajax({
            type: "POST",
            url: "process-request.php",
            data: { country : selectedCountry } 
        }).done(function(data){
            $("#response").html(data);
        });
    });
});
</script>
<div class="row" id="toshow" style="display:none" name="suppliers">
	<h2>Learning Outcome:</h2>
	<TABLE class="table table-hover table-responsive" id="dataTable" >
        <TR>
                       
			 <?php
             $tdx = "";
			 $loarray=explode("~`",$outcome[0]); 
			 $size=sizeof($loarray);
			 for($i=0;$i<$size;$i++)
			 {
				$tdx.= "<td>echo ".$loarray[$i].";</td>";
			 }
			echo $tdx;
		?>
           
        </TR><br>
    </TABLE><br>
	<center>
	<div class="btn-group">
	
	<button id="abutton1" type="button" class="btn btn-success">Submit</button>
	</center>
	</div>
	<div class="row" id="toshow1" style="display:none" name="suppliers">
	<h2>Learning Plan:</h2>
	
	
		<script>
		$(document).ready(function(){
		  $('.dropdown-submenu a.test').on("click", function(e){
			$(this).next('ul').toggle();
			e.stopPropagation();
			e.preventDefault();
		  });
		});
		</script>
			<script text="javscript">
			function myUploadFunction() {
    document.getElementById("uploadinsert").innerHTML = '<input id="block34"type="file" class="form-control " id="materialupload">';
}
function quizbutton(){
document.getElementById("uploadinsert").innerHTML = '<input type="button"  id="block35"value="Quiz" target="#" class="form-control" id="quizmaterial">';
}
function validateForm() {
  var valid = 1;
  var time = document.getElementById('time');
  var activity = document.getElementById("activity");
  var topic = document.getElementById('topic');
  var name_validation = document.getElementById("name_validation");
  var message_validation = document.getElementById("message_validation");
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  
  if (topic.value === "") {
    valid = 0;
    name_validation.innerHTML = '<span class="glyphicon glyphicon-remove">';
    name_validation.style.display = "block";
    name_validation.parentNode.style.backgroundColor = "#FFDFDF";
  } else {
    name_validation.style.display = "none";
    name_validation.parentNode.style.backgroundColor = "transparent";
  }
  
  if (time.value === "<option>Time</option>") {
    valid = 0;
    message_validation.innerHTML = '<span class="glyphicon glyphicon-remove">';
    message_validation.style.display = "block";
    message_validation.parentNode.style.backgroundColor = "#FFDFDF";
  } else {
    message_validation.style.display = "none";
    message_validation.parentNode.style.backgroundColor = "transparent";
  }
  
  if (activity.value === "") {
    valid = 0;
    email_validation.innerHTML = "Field Required";
    email_validation.style.display = "block";
    email_validation.parentNode.style.backgroundColor = "#FFDFDF";
  } else {
    email_validation.style.display = "none";
    email_validation.parentNode.style.backgroundColor = "transparent";
  }
  
 
  if (!valid)
    return false;
}
			</script>
	<TABLE  class="table table-hover table-responsive" id="dataTable1" >
        <TR>
            
			 <TD class="col-sm-2">
       		 <?php 
			 $tdy = "";
			 $loarray=explode("~`",$plan[0]); 
			 $size=sizeof($loarray);
			 for($i=0;$i<$size;$i++)
			 {
				$tdy.= "<td>echo ".$loarray[$i].";</td>";
			 }
			echo $tdy;
		?>
            </TD>
			
		
			<TD id="uploadinsert" >
			
			</TD>
			<td id="quizmaterial">
			</td>
        </TR><br>
    </TABLE>
	<br>
	<center>
	<div class="btn-group">
	
	
	</div>
	<button id="abutton2" type="button" class="btn btn-success">Submit</button>
	</center>
</div>	
	
	
	<div class="row" id="toshow2" style="display:none" name="suppliers">
	<form class="form-horizontal">
	
			<div class="form-group">
			<div class="col-sm-12"><h2>Learning Material:</h2>
			<form class="form-horizontal">
	
<i>(Descriptive/ Concept Map/ Mind-Map etc., to be prepared by faculty member)

Animated PPT / Video lecture
</i><br><center>
	<a href="google-drive.html"><button type="button" class="btn btn-success">View files</button></a></center>
			</div>
			</div><center>
	<div class="btn-group">
	
	
	</div>
	<button id="abutton3" type="submit" class="btn btn-success">Submit</button>
	</center>
			
			</div>
		
	
	<div class="row" id="toshow3" style="display:none" name="suppliers">
	<h2>Learning Verfication:</h2>
		<div class="form-group">
			<div class=" col-sm-12">
	
	
		<a href="#" target="_blank"><button type="button" class="btn btn-info">Quiz</button>
			
			</div>
			</div>
	
	<form class="form-horizontal"  onsubmit="return redirect()">
	<div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10"/>
    </div>
	<center>
	<div class="btn-group">
	  
	  <button type="submit" id="adbutton5"  class="btn btn-success">Submit</button>
	
	</div>
	</center>
  </form>

    </section>
	
    <!-- /.content -->
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
  echo "<p class=\"hidden\" id=\"sessionID\" >".$_REQUEST['sub']."U".$_REQUEST['u']."S".$_REQUEST['s']."</p>";
?>


</body>
</html>
