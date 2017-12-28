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
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>

	<!--|||||||||||||||||||||||||||||||||||||||||R-GRAPH JS|||||||||||||||||||||||||||||||||||||||||-->
	<script src="dependencies/RGraph.common.core.js" type="text/javascript" ></script>
	<script src="dependencies/RGraph.common.tooltips.js" type="text/javascript" ></script>
    <script src="dependencies/RGraph.common.dynamic.js" type="text/javascript" ></script>
    <script src="dependencies/RGraph.drawing.circle.js" type="text/javascript" ></script>
    <script src="dependencies/jquery-3.1.0.min.js" type="text/javascript" ></script>
    <script src="dependencies/RGraph.pie.js" type="text/javascript"></script>
	<!--////////////////////////////////////////////END\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
	
    <script src="script.js" type="text/javascript"></script>
	  
	  <script>
         $(document).ready(function() {
         $('select').material_select();
      });
      </script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	  </head>
 
    <body>
	<?php include('menufac.php');	?>
	<br>
	<br>
	
  <div class="container">
	<form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
<?php
$selct='';
$department=$_SESSION['department'];
require_once 'dbconfig.php';
$id = $_SESSION['id'];
$tablelist=array();
$row='';
//tablename of coordinator
$sql="SELECT CONCAT( GROUP_CONCAT(table_name) , ',' ) FROM information_schema.tables WHERE table_schema = '$department' AND table_name LIKE 'faculty___%' AND table_name LIKE '%$id' AND table_name NOT IN ('faculty_$id')";
$result= mysqli_query($conn,$sql);
$row = mysqli_fetch_row($result);
$tablename=$row[0];
$tablename=substr($tablename,0,-1);
$tablelist=explode(",",$tablename);
$courselist=array();
//print_r($tablelist);
for($i=0;$i<sizeof($tablelist);$i++)
{
$a=str_replace("faculty_",NULL,$tablelist[$i]);
$b=str_replace("_$id",NULL,$a);
$courselist[$i]=$b;
}
//echo "courselist=";
//print_r($courselist);

$asd=sprintf("SELECT courseid,coursename,coursetype from course WHERE courseid in ('".implode("','",$courselist)."') ")	;
$res=mysqli_query($conn,$asd);
//-----
if($res)
{
$select='<form>
	<div class="row">
		
		<div class="input-field col s4 offset-s4 center-align">
<select name="cid" id="cid">';
$count=0;
while($row=mysqli_fetch_row($res)){
$count+=1;
//echo $row[0];
$select.='<option value='.$row[0].'>'.$row[1].'-'.$row[0].'</option>';
	}
	$select.='</select><br>';
	$select.='<center><button type="submit" name="submit" class="waves-effect waves-light btn green submit">Submit</button></div></div>
	</form><br><br>';	
}

echo $select;
?>
	
<?php 

if($_POST)
{
$id = $_POST['cid'];  
$_SESSION['courseid'] = $id;
$select='<table  class="table table-hover">';
$select=' </br></br><table  id="myTable" class="table table-hover table-responsive">
    <thead>
      <tr>
        <th>Course ID</th>
        <th>Course name</th>
        <th>Course Type</th>
        <th>Enroll Students</th>
      </tr>
    </thead>
    <tbody> 
';

$query = sprintf("SELECT courseid,coursename,coursetype,department FROM course WHERE courseid ='$id'");
$result =mysqli_query($conn,$query); 
if($result){
$count=0;
while($row=mysqli_fetch_array($result)){
$count+=1;
$select.='<tr id="row'.$count.'" display="none">';
$select.='
<td id="country_row1">'.$row[0].'</td>
<td id="age_row1">'.$row[1].'</td>
<td id="sage_row1">'.$row[2].'</td>';
$select.='<td><button class="waves-effect waves-light btn red accent-4 modal-trigger" data-toggle="modal" data-target="efmodal'.$count.'"  >Enroll Student</button>
</form>
</td>';
$select.='</tr>';
$select.='<div class="container">
  
  <!-- Modal -->
  <div class="modal fade" id="efmodal'.$count.'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <form action="demofacultyenrollstudent.php" method="POST" >

          <h4 class="modal-title">Enroll Student</h4><br><br>';
		  $cid=$row[0];
//--------------
$query1 ="SELECT CONCAT( GROUP_CONCAT(table_name) , ',' ) FROM information_schema.tables WHERE table_schema = '$department' AND table_name LIKE 'student_".$cid."_%' ";
$res1 = mysqli_query($conn,$query1);
$rq=mysqli_fetch_row($res1);

$rqa='';
$rqa=substr($rq[0],0,-1);
$stutablelist=explode(",",$rqa);
$studentlist=array();
//print_r($stutablelist);
for($i=0;$i<sizeof($stutablelist);$i++)
{
$a=str_replace("student_".$cid."_",NULL,$stutablelist[$i]);
$studentlist[$i]=$a;
}

$asd=sprintf("SELECT studentid,firstname from overallstudent WHERE studentid not in ('".implode("','",$studentlist)."') ")	;
$result1=mysqli_query($conn,$asd);
$result2=mysqli_query($conn,$asd);
//--------------
$wesd=mysqli_fetch_row($result2);
if(!is_null($wesd)){
$select.='<div class="row"><div class="input-field col s5"><select  class="browser-default" id="studentid"  name="studentid">';
while($row=mysqli_fetch_array($result1))
{
$select.='<option value="'.$row[1].'-'.$row[0].'">'.$row[1].'-'.$row[0].'</option>';
}
$select.='</select></div></div><br>';
$select.='<br><div class="col-sm-5"><button type="submit" name="submit" class="waves-effect waves-light btn green" data-dismiss="efmodal">Enroll</button></div></div>';
}
else{

$select.='No Student Available to enroll !!</div></div><br>';
}

$select.='        </form>
		</div>
     
      </div>
      
    </div>
  </div>
  
</div>
</tbody>
  </table>	';
}
}


echo $select;
$query=sprintf("select u1,u2,u3,u4,u5 from course where courseid='$id'");
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$select1='<div class="container"><canvas id="rgraph_canvas" height="800" width="800"></canvas></div>
<div id="coursecircle" class="col s8" style="display:none;">
		<div class="form-group">
		 
		  		<label for="subject">Subject_ID: </label>
        <input type="text" id="subject" title="subject" value="1"><br>
		</div>
	
		<div class="input-field">
			<label for="unit_1">Unit 1 : </label>
            <input type="text" name="unit_1" id="unit_1" title="Unit_1" value="'.$row[0].'" /> <br>
			<label for="unit_2">Unit 2 : </label>        
			<input type="text" name="unit_2" id="unit_2" title="Unit_2" value="'.$row[1].'"/> <br>
            <label for="unit_3">Unit 3 : </label>
		    <input type="text" name="unit_3" id="unit_3" title="Unit_3" value="'.$row[2].'"/> <br>
            <label for="unit_4">Unit 4 : </label>
			<input type="text" name="unit_4" id="unit_4" title="Unit_4" value="'.$row[3].'"/> <br>
            <label for="unit_5">Unit 5 : </label>
			<input type="text" name="unit_5" id="unit_5" title="Unit_5" value="'.$row[4].'"/> <br>
        </div>
<button type="submit" id="SubmitButton" class="waves-effect waves-light btn green">Generate</button>
	</div>	
		';
echo $select1;
}
?>	
</div>

		<script>
$("#coursecircle").addClass('hidden');

</script>
	<script>
	function Enrollfaculty(){
	document.getElementById("enrollcourse").innerHTML = '<div class="input-field col s4"><label  for="selected"><input type="text" id="facultynum"></label><input type="button" id="selected" class="waves-effect waves-light btn green" value="Select Faculty" onclick="generate()"></span></div>'
	}
	</script>
	

    <script>
    function generate() {

        var a = parseInt(document.getElementById("facultynum").value);
        var selector = document.getElementById("selector");

        for (i = 0; i < a; i++) {
		
			toAppend = "<br><center><div class='row'><div class='input-field col s5'>. <select  col-sm-offset-9	 id='selectfaculty'><option>Select Faculty</option></select></div></center><br>"; 
		selector.innerHTML=selector.innerHTML+toAppend; 

            
        }
				return;
    }
    </script>
	

	</div>
		  
      <!--Import jQuery before materialize.js-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js'></script>
        
		  <script>   
				$('.button-collapse').sideNav({
					  menuWidth: 240, // Default is 240
					  edge: 'left', // Choose the horizontal origin
					  closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
						 draggable: true
					}
				  );
				// Show sideNav
				//$('.button-collapse').sideNav('show');
		  $(document).ready(function() {
    $('select').material_select();

    // for HTML5 "required" attribute
    $("select[required]").css({
      display: "inline",
      height: 0,
      padding: 0,
      width: 0
    });
  });
  $(document).ready(function() {
  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  $('.modal-trigger').leanModal();
});
		  </script> 

	</body>
  </html>