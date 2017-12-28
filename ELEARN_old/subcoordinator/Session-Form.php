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

  <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<script type="text/javascript">
var mealsByCategory = {
    Create: ["Verb","Assemble","Act","Blend","Categorize","Combine","Compile","Compose","Construct","Create","Devise","Design","Develop","Explain","Forecast","Formulate","Generate","Integrate","Invent","Improve","Imagine","Modify","Make","Organize","Originate","Perform","Plan","Prepare","Produce","Propose","Predict","Rearrange","Reconstruct","Relate","Reorganize","Revise","Rewrite","Summarize","Set up","Tell","Write"],
    Evaluate: ["Verb","Appraise","Argue","Assess","Choose","Compare","Conclude","Contrast","Criticize","Critique","Debate","Decide","Deduce","Defend","Describe","Determine","Discriminate","Evaluate","Explain","Interpret","Infer","Justify","Judge","Measure","Predict","Prioritize","Prove","Probe","Rank","Rate","Relate","Revise","Recommend","Reject","Score","Summarize", "Support","Select","Validate","Value"],
    Analyze: ["Verb","Appraise","Analyze","Arrange","Break down","Characterize","Classify","Compare","Contrast","Calculate","Criticize","Debate","Deconstruct","Deduce","Detect","Diagram","Differentiate","Discriminate","Dissect","Distinguish","Draw","Examine","Experiment","Group","Identify","Illustrate","Infer","Inquire","Inspect","Investigate","Outline","Order","Probe","Question","Relate","Research","Select","Separate","Sequence","Survey","Test"],
    Apply: ["Verb","Apply","Adapt","Change","Collect","Choose","Compute","Calculate","Construct","Draw","Dramatize","Demonstrate","Exhibit","Interview","Illustrate","Interpret","Make","Manipulate","Operate","Prepare","Produce","Practice","Role-play","Select","Show","Solve","Sequence","Transfer","Translate","Use"],
    Understand: ["Verb","Account for","Annotate","Associate","Comprehend","Convert","Conclude","Define","Defend","Describe","Distinguish","Demonstrate","Discuss","Estimate","Explain","Extend","Generalize","Gives","examples","Infer","Interpret","Identify","Illustrate","Observe","Outline","Paraphrase","Predict","Rewrite","Report","Restate","Retell","Research","Review","Recognize","Reorganize","Summarize","Translate","Tell"],
    Remember: ["Verb","Choose","Count","Cite","Define","Describe","Distinguish","Draw","Find","Group","Identify","Know","Label","List","Listen","Locate","Match","Memorize","Name","Outline","Quote","Read","Recall","Relate","Recognize","Reproduce","Repeat","Recite","Review","Record","Select","State","Sequence","Show","Sort","Tell","Underline","Write"]
}
  function changecat(value) {
        if (value.length == 0) document.getElementById("p_scnt").innerHTML = "<option></option>";
        else {
            var catOptions = "";
            for (categoryId in mealsByCategory[value]) {
                catOptions += "<option>" + mealsByCategory[value][categoryId] + "</option>";
            }
            document.getElementById("s_scnt").innerHTML = catOptions;
        }
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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
        <li class="treeview">
          <a href="Adduser.php">
            <i class="fa fa-user-plus"></i>
            <span> User Creation</span>
      
            
          </a>
       
        </li>
     
        <li class="active treeview">
          <a href="#">  
            <i class="fa fa-tasks"></i>
          <span> My Course</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="MyCourse.php"><i class="fa fa-tasks"></i> My Course</a></li>
            <li class="active treeview"><a href="courseupload.php"><i class="fa fa-upload"></i> Content Upload</a></li>
       
           </ul>
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
	<form class="form-horizontal" action="sessionrationale.php" method="POST">   
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" onclick()="return markHalfDone();" data-parent="#accordion" href="#collapse1">Rationale/Purpose</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">

   <div class="form-group">
      
      <div class="col-sm-12">
        <textarea type="text" name="rationale" class="form-control" rows="6" cols="6"  id="rationale" placeholder="
The purpose of learning this Session on algorithm, is to understad what it should compute and what instructions you want it to perform in order to correctly compute these results. The 'what instructions' part is called an algorithm.
"></textarea>
      </div>
    </div>
	<center>
	<div class="btn-group " >
	  <button type="submit" name="submit" class="btn btn-success">Submit</button>
	</div>
	</center>

	<br>
	</div>
      </div>
    </div>
	</form>
	

	<br>
<form class="form-horizontal" action="outcomesession.php" method="POST">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Learning Outcome</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
 <table  id="p_scents">
 
<script language="JavaScript">
$(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents tr').size() + 1;
        
        $('#addScnt').live('click', function() {
                $('<TR>   <TD ><INPUT type="checkbox" name="lochk[]"  id="block21"></TD> <TD class="col-sm-4"><select name="meal" id="p_scnts'+id+'" onChange="changecat(this.value);"> <option value="" disabled selected>Select</option>  <option value="Create">Create</option>  <option value="Evaluate">Evaluate</option>   <option value="Analyze">Analyze</option>    <option value="Apply">Apply</option>  <option value="Understand">Understand</option>    <option value="Remember">Remember</option></select>  </TD>	<td class="col-sm-4"><select name="category" id="s_scnts'+id+'">    <option value="" disabled selected>Select</option></select></td> </TD><TD class="col-sm-4"><INPUT class="form-control" id="l_scnts'+id+'" placeholder="Outcome" type="text" name="outcome[]"/></TD> </TR>').appendTo(scntDiv);
                i++;
                return false;
        });
        
        $('#remScnt').live('click', function() { 
                if( i > 2 ) {
                        $(this).parents('tr').remove();
                        i--;
                }
                return false;
        });
});

 </script>
        <TR >
            <TD ><INPUT type="checkbox" name="lochk[]"  id="p_scnt"></TD>
            
			 <TD class="col-sm-4">
				
  <select name="meal" id="p_scnt" onChange="changecat(this.value);">
    <option value="" disabled selected>Select</option>
    <option value="Create">Create</option>
    <option value="Evaluate">Evaluate</option>
    <option value="Analyze">Analyze</option>
    <option value="Apply">Apply</option>
    <option value="Understand">Understand</option>
    <option value="Remember">Remember</option>
</select>
				
            </TD>
			<td class="col-sm-4">
			
			<select name="category" id="s_scnt">
    <option value="" disabled selected>Select</option>
</select>
			</td>
			
            <TD class="col-sm-4"><INPUT class="form-control" id="l_scnt" placeholder="Outcome" type="text" name="outcome[]"/></TD>
           
        </TR><br>
		
    </TABLE><br>
	<center>
	<div class="btn-group">
	<INPUT type="button" class="btn markHalfDone btn-success" value="Add Row" onclick="addRow()" />
	<INPUT type="button" class="btn btn-danger" value="Delete Row" onclick="deleteRow('dataTable')" />
	<button type="submit" name="submit" onclick()="markHalfDone() " class="btn btn-success">Submit</button>

	</center>
	</div>
	
      </div>
    </div>
    </div>
	</form>
	<form class="form-horizontal" action="plansession.php" method="POST">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Learning Plan</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
	
	<script language="JavaScript">
  function AddRow()
  {
	$('#tbl tr:last').append('<TR><TD ><INPUT type="checkbox" name="lpchk[]"/></TD>  <TD class="col-sm-2">  <SELECT name="time[]" class="form-control" id="time">   <option>Time</option><option>5 min</option><option>10 min</option><option>15 min</option>	<option>20 min</option>  </SELECT> </TD> <TD class="col-sm-2">  <select  class="form-control" name="activity[]" onchange="myfunction(this.value);">	<option>Activity</option><option click="quizbutton()">Quiz</option>	<option id="material" onclick="myUploadFunction()">Material</option></select></TD><TD class="col-sm-2"><INPUT class="form-control" id="topic" name="topic[]" placeholder="Topic" type="text" /></TD><TD class="col-sm-2"><SELECT class="form-control" name ="planlevel[]" id ="level" > <option>Level</option> <option>Leve 1</option><option>Level 2</option> <option>Level 3</option>   </SELECT>  </TD>	<TD id="uploadinsert" >	</TD><td></td><td></td>    </TR>');}</script>
	<TABLE class="table table-hover table-responsive" id="tbl" >
        <TR>
            <TD ><INPUT type="checkbox" name="lpchk[]"/></TD>
            
			 <TD class="col-sm-2">
                <SELECT name="time[]" class="form-control" id="time">
                  <option>Time</option>
			<option>5 min</option>
			<option>10 min</option>
			<option>15 min</option>
			<option>20 min</option>
                </SELECT>
				
            </TD>
			 <TD class="col-sm-2">
                
        
		
		<select  class="form-control" name="activity[]" onchange="myfunction(this.value);">
		<option>Activity</option>
		<option click="quizbutton()">Quiz</option>
		<option id="material" onclick="myUploadFunction()">Material</option>
	</select>
 
		<script text="javscript">
			function myfunction(str) {
				if (str=="Quiz"){
			document.getElementById("uploadinsert").innerHTML = '<a href="../online-quiz-portal-master/online-quiz-portal-master/home.php" target="_blank"><input type="button" value="Quiz" target="#" class="form-control btn-default" id="quizmaterial"></a>';
	}
	else{
		document.getElementById("uploadinsert").innerHTML = '<input type="file" class="form-control " id="materialupload">';
	}
}
</script>	
 

            </TD>
			
			<TD class="col-sm-2"><INPUT class="form-control" id="topic" name="topic[]" placeholder="Topic" type="text" /></TD>
			
			<TD class="col-sm-2">
                <SELECT class="form-control" name ="planlevel[]" id ="level" >
                 <option>Level</option>
				 <option>Leve 1</option>
				 <option>Level 2</option>
				 <option>Level 3</option>
                </SELECT>
            </TD>
			<TD id="uploadinsert" >
			
			</TD>
			
			<td>
			</td>
			<td>
			</td>
        </TR><br>
    </TABLE>
	<br>
	<center>
	<div class="btn-group">
	<INPUT type="button" class="btn markHalfDone btn-success" id="btnAdd" value="Add Row" onclick="addRow();" >
	<INPUT type="button" class="btn btn-danger" value="Delete Row" onclick="deleteRow('dataTable1')" >
	<button type="submit" class="btn btn-success" name="submit" onclick="markHalfDone()">Submit</button>
	  
	</div>
	</center>

	
	
	</div>
      </div>
    </div>
	</form>
	<form>
		<button type="submit" id="createSID" class="hidden" onclick="markHalfDone()">Submit</button>
	</form>
	 <div class="panel panel-warning">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Learning Material</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
	
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
      </div>
    </div>
    </div>
	 <div class="panel panel-warning">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Learning Verfication</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">	
	
		<div class="form-group">
			<div class=" col-sm-12">
			
		<a href="" target="_blank"><button type="button" class="btn btn-info">Quiz</button>
			
	
	</div>
			</div>

	<form class="form-horizontal">
	<div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10"/>
    </div>
	<center>
	<div class="btn-group">
	  <button type="submit" class="btn btn-success" onclick="markCompleteDone()">Submit</button>
	  
	</div>
	</center>
  </form>
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
  echo "<p class=\"hidden\" id=\"sessionID\" >".$_REQUEST['crefid']."U".$_REQUEST['u']."S".$_REQUEST['s']."</p>";
?>
</body>
</html>
