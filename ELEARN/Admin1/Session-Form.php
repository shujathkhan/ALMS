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
function Add(){
$("#tblData tbody").append("");
$(".btnSave").bind("click", Save);	
$(".btnDelete").bind("click", Delete); 
}; 
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
$('#block21,#block22,#response,#block24,#block25,#block26').prop("disabled", true);
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
function Save(){ 
var par = $(this).parent().parent();
var tdName = par.children("td:nth-child(1)"); 
var tdPhone = par.children("td:nth-child(2)"); 
var tdEmail = par.children("td:nth-child(3)"); 
var tdButtons = par.children("td:nth-child(4)");
 tdName.html(tdName.children("input[type=text]").val()); 
 tdPhone.html(tdPhone.children("input[type=text]").val()); 
 tdEmail.html(tdEmail.children("input[type=text]").val()); 
 tdButtons.html("<img src='images/delete.png' class='btnDelete'/>
 <img src='images/pencil.png' class='btnEdit'/>"); 
 $(".btnEdit").bind("click", Edit); 
 $(".btnDelete").bind("click", Delete); }; 
</script>
<script>
function Edit(){
var par = $(this).parent().parent(); 
var tdName = par.children("td:nth-child(1)"); 
var tdPhone = par.children("td:nth-child(2)"); 
var tdEmail = par.children("td:nth-child(3)"); 
var tdButtons = par.children("td:nth-child(4)"); 
tdName.html("<input type='text' id='txtName' value='"+tdName.html()+"'/>"); 
tdPhone.html("<input type='text' id='txtPhone' value='"+tdPhone.html()+"'/>"); 
tdEmail.html("<input type='text' id='txtEmail' value='"+tdEmail.html()+"'/>"); 
tdButtons.html("<img src='images/disk.png' class='btnSave'/>");
 $(".btnSave").bind("click", Save);
 $(".btnEdit").bind("click", Edit); 
 $(".btnDelete").bind("click", Delete); 
 };
</script>
<script>
function Delete(){ 
var par = $(this).parent().parent();  
par.remove(); }; 
</script>
<script>
$(function(){ 
$(".btnEdit").bind("click", Edit); 
$(".btnDelete").bind("click", Delete); 
$("#btnAdd").bind("click", Add); });
</script>


 <SCRIPT language="javascript">
        function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
    </SCRIPT>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
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
              
              <span class="hidden-xs">Shujathullah Khan</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <!-- Menu Body -->
              <li class="user-body">
			  <center>
                <div class="row">
                Shujathullah Khan
				</div>
                <div class="row">
                RA1411008010103
				</div>
              </center>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
          <a href="index.html">
            <i class="fa fa-dashboard"></i> <span> Dashboard</span>
            </a>
        </li>
        <li class="treeview">
          <a href="Adduser.html">
            <i class="fa fa-user-plus"></i>
            <span> User Creation</span>
      
            
          </a>
       
        </li>
        <li>
          <a href="AddCourse.html">
            <i class="fa fa-upload"></i> <span> Course Creation</span>
    
          </a>
	
        </li>
                   <li class="acive treeview">
          <a href="#">  
            <i class="fa fa-tasks"></i>
          <span> My Courses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Courses.html"><i class="fa fa-tasks"></i> Courses</a></li>
            <li class="active treeview"><a href="courseupload.php"><i class="fa fa-upload"></i> Content Upload</a></li>
       
           </ul>
        </li>
        <li class="treeview">
          <a href="Report.html">
            <i class="fa fa-laptop"></i>
            <span> Report</span>
            
          </a>
         </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-exclamation-circle"></i> 
			<span> Notification</span>
		
          </a>
     
        </li>
       <li class="treeview">
          <a href="ChangePwd.html">
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
        Session Form     
      </h1>
	  </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> My Course</a></li>
		<li><a href="courseupload.php"><i class="fa fa-dashboard"></i> Content Upload</a></li>
		<li class="active">Session</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      	
		<form class="form-horizontal">
	
	<h2>Rationale/Purpose:</h2>
    <div class="form-group">
      
      <div class="col-sm-12">
        <textarea type="text" class="form-control" rows="6" cols="6"  id="rationale" placeholder="
The purpose of learning this Session on algorithm, is to understad what it should compute and what instructions you want it to perform in order to correctly compute these results. The 'what instructions' part is called an algorithm.
"></textarea>
      </div>
    </div>
	<center>
	<div class="btn-group " >
	  <button type="submit"  id="abutton" class="markHalfDone btn btn-success" onclick="markHalfDone();">Submit</button>

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
            window.alert("Something Went Wrong. Contact Admin");
          }
        });
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
            window.alert("Something Went Wrong. Contact Admin");
          }
        });
      } // end od -> markCompleteDone
</script>

	<h2>Learning Outcome:</h2>
	<TABLE class="table table-hover table-responsive" id="dataTable" >
        <TR>
            <TD ><INPUT type="checkbox" name="chk"  id="block21"></TD>
            
			 <TD class="col-sm-4">
                <SELECT  class="country form-control"  id="block22" >
                   <option>Level</option>
			<option value="create">Create</option>
			<option value="evaluate">Evaluate</option>
			<option value="analyze">Analyze</option>
			<option value="apply">Apply</option>
			<option value="understand">Understand</option>
			<option value="remember">Remember</option>
                </SELECT>
				
            </TD>
			<td class="col-sm-4">
			<SELECT class="form-control"  id="response">
			<option>Verb</option>
			</Select>
			</td>
			
            </TD><TD class="col-sm-4"><INPUT class="form-control" id="block26" placeholder="Outcome" type="text" name="txt"/></TD>
           
        </TR><br>
    </TABLE><br>
	<center>
	<div class="btn-group">
	<INPUT type="button" class="btn markHalfDone btn-success" id="abutton1"  value="Add Row" onclick="markHalfDone(); addRow('dataTable')" />
	
	</center>
		<div class="row" id="toshow1" style="display:none" name="suppliers">
	<h2>Learning Plan:</h2>
	
	
	<TABLE class="table table-hover table-responsive" id="dataTable1" >
        <TR>
            <TD ><INPUT type="checkbox" id="block31" name="chk"/></TD>
            
			 <TD class="col-sm-2">
                <SELECT class="form-control" id="block32" id="time">
                  <option>Time</option>
			<option>5 min</option>
			<option>10 min</option>
			<option>15 min</option>
			<option>20 min</option>
                </SELECT>
				
            </TD>
			 <TD class="col-sm-2">
                
        <div class="dropdown col-sm-4">
		<button class=" btn btn-default dropdown-toggle" id="block33" type="button" id="activity" data-toggle="dropdown">Activity
		<span class="caret"></span>
		</button>
		<script>
		$(document).ready(function(){
		  $('.dropdown-submenu a.test').on("click", function(e){
			$(this).next('ul').toggle();
			e.stopPropagation();
			e.preventDefault();
		  });
		});
		</script>
		<ul class="dropdown-menu" name="LP_activity" id="block33">
      
      <li class="dropdown-submenu">
        <a class="test selected" tabindex="-1" href="#" id="recap">Recap <span class="caret"></span></a>
        <ul class="dropdown-menu">
		  	  <li><a tabindex="-1" href="#">Choose the option</a></li>
		  <li><a tabindex="-1" onclick="quizbutton()">Quiz</a></li>
          
	
		  </ul>
		  <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#" id="Introtonewtopic">Intro to new topic<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="#" id="mindmap">Mindmap</a></li>
          <li><a tabindex="-1" id="material" onclick="myUploadFunction()">Material</a></li>        
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </div>

            </TD>
			
			<TD class="col-sm-2"><INPUT  id="block34" class="form-control" id="topic" placeholder="Topic" type="text" /></TD>
			<script text="javscript">
			function myUploadFunction() {
    document.getElementById("uploadinsert").innerHTML = '<input type="file" class="form-control " id="materialupload">';
}
function quizbutton(){
document.getElementById("uploadinsert").innerHTML = '<a href="../online-quiz-portal-master/online-quiz-portal-master/home.php" target="_blank"><input type="button" value="Quiz" target="#" class="form-control" id="quizmaterial"></a>';
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
			<TD class="col-sm-2">
                <SELECT class="form-control" id="block36" name ="Level" id ="level" >
                 <option>Level</option>
				 <option>Leve 1</option>
				 <option>Level 2</option>
				 <option>Level 3</option>
                </SELECT>
            </TD>
			<TD id="uploadinsert" >
			
			</TD>
			<td id="quizmaterial">
			</td>
			<td>
			</td>
			<td>
			</td>
        </TR><br>
    </TABLE>
	<br>
	<center>
	<div class="btn-group">
	<button id="abutton2" type="submit" class="btn btn-success">Submit</button>
	</div>
	</center>
	
	
	
	<div class="row" id="toshow2" style="display:none" name="suppliers">
	<form class="form-horizontal">
	<h2>Learning Material:</h2>
<i>(Descriptive/ Concept Map/ Mind-Map etc., to be prepared by faculty member)

Animated PPT / Video lecture
</i>
	<iframe src="https://drive.google.com/embeddedfolderview?id=0B4ojjO5sVzx8VGx3MGRFUnkySFk#grid" style="width:100%; margin-top:-60px; margin-bottom:-10px; height:300px; border:0;"></iframe>
			
		
	
	</div>
		<div class="row" id="toshow3" style="display:none" name="suppliers">	
	<h2>Learning Verfication:</h2>
		<div class="form-group">
			<div class=" col-sm-12">
	
	<h4>Type Of Question</h4>
			<select class="form-control" onchange="location = this.value;" style="width:100%" >
			<option>Select Type Of Question</option>
		    
			<option value="2mark.html">2 mark</option>
			<option value="Lmark.html">Long answer Questions</option>
			</select>
			</div>
			</div>
	
	<form class="form-horizontal">
	<div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10"/>
    </div>
	<center>
	<div class="btn-group">
	  <button type="submit" class="btn btn-success" onclick="markCompleteDone()">Submit</button>
	  <button type="button" class="btn btn-warning">Edit</button>
	</div>
	</center>
  </form>
</div>
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

<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

<?php
  echo "<p class=\"hidden\" id=\"sessionID\" >S".$_REQUEST['sub']."U".$_REQUEST['u']."S".$_REQUEST['s']."</p>";
?>


</body>
</html>
