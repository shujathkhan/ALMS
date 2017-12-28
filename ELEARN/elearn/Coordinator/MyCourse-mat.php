<?php
session_start();


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
	<?php include('menucood.php'); ?>
	<br>
	<br>
	<div class="container">
		<form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
<?php
$department=$_SESSION['department'];
require_once 'dbconfig.php';
$id = $_SESSION['id'];

//tablename of coordinator
$sql="SELECT CONCAT( GROUP_CONCAT(table_name) , '' ) FROM information_schema.tables WHERE table_schema = '$department' AND table_name LIKE 'coordinator___%' AND table_name LIKE '%$id'";
$result= mysqli_query($conn,$sql);
if($result){
while($row=mysqli_fetch_row($result)){
$tablename=$row[0];
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'"))>0)   //check if table exist
{$sql = sprintf("SELECT DISTINCT courseid,coursename from $tablename");
$res=mysqli_query($conn,$sql);	
if($res)
{
$select='<form>
		<div class="row">
		
		<div class="input-field col s4 offset-s4 center-align">
<select  name="cid" id="cid">';
$count=0;
while($row=mysqli_fetch_row($res)){                                  //  display as a drop down JEGGU SAN
$count+=1;
$select.='<option selected disabled>Choose Course</option>
<option value='.$row[0].' >'.$row[1].'-'.$row[0].'</option>';
	}
	$select.='</select><button class="waves-effect waves-light btn green" type="submit" name="submit">Submit</button></div></div><br>';
	$select.='
			
		
	</form><br><br>';
	echo $select;
}else
	echo 'no course registered to';
}else
	echo 'coordinator table doesnt exist ERROR';
}
}else
	echo 'no table found';
?>
	
<?php 

if($_POST)
{
$id = $_POST['cid'];  
$_SESSION['courseid'] = $id;
$select='<div class="container"><table  class="table table-hover">';
$select=' </br></br><table  id="myTable" class="highlight responsive-table">
    <thead>
      <tr>
        <th>Course ID</th>
        <th>Course name</th>
        <th>Course Type</th>
        <th>Enroll Faculty</th>
      </tr>
    </thead>
    <tbody> 
';
$query1 = sprintf("SELECT firstname, staffid FROM overallfaculty");
$result1 =mysqli_query($conn,$query1); 
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
$select.='<td><button data-target="efmodal'.$count.'" class="waves-effect waves-light btn orange darken-1  modal-trigger">Enroll Faculty</button> 
</form>
</td>';
$select.='</tr>';
$select.='<div class="container">
  
  <!-- Modal -->
  <div class="modal" id="efmodal'.$count.'">
    
      <!-- Modal content-->
      <div class="modal-content">

        <form action="democoordinatorenrollfaculty.php" method="post" >
	
          <h4 class="title">Enroll Staff</h4><br><br>';
		  $cid=$row[0];
$query1 = sprintf("SELECT firstname, staffid FROM overallfaculty WHERE staffid IN(SELECT staffid FROM $tablename where status='0') ");
$result1 =mysqli_query($conn,$query1);
$result2 =mysqli_query($conn,$query1); 
$saw=mysqli_fetch_row($result2);
if(is_null($saw) || empty($saw) ){
	
$select.='No Faculty Available to enroll !!<br>';
}else{
$select.='<div class="input-field col s5"><select id="choice"  name="staffid">';

while($row=mysqli_fetch_array($result1))
$select.='<option value="'.$row[1].'">'.$row[1].'-'.$row[0].'</option>';
$select.='</select></div><br>';
$select.='<br><div class="col s5"><button type="submit" name="submit" class="modal-action modal-close waves-effect waves-green btn-flat" data-dismiss="efmodal">Enroll</button></div>';
}

$select.='        </form>
	
     
      </div>
      
    </div>
  </div>
  

</tbody>
  </table>	</div>';
}
}


echo $select;
$query=sprintf("select u1,u2,u3,u4,u5 from course where courseid='$id'");
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$select1='<div class="container"><canvas id="rgraph_canvas" height="800" width="800"></canvas></div>
<div id="coursecircle" class="col s8" style="display:none;">
		<div class="form-group">
		 
		  		<label class="control-label" for="subject">Subject_ID: </label>
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
<button type="submit" id="SubmitButton" waves-effect waves-light btn green>Generate</button>
	</div>	
		';
echo $select1;
}
?>	



		<script>
$("#coursecircle").addClass('hidden');

</script>
	<script>
	function Enrollfaculty(){
	document.getElementById("enrollcourse").innerHTML = '<div class="input-field"><input type="text" id="facultynum"><span class="col s4"><input type="button" id="selected" class="waves-effect waves-light btn orange " value="Select Faculty" onclick="generate()"></span></div>'
	}
	</script>
	

    <script>
    function generate() {

        var a = parseInt(document.getElementById("facultynum").value);
        var selector = document.getElementById("selector");

        for (i = 0; i < a; i++) {
		
			toAppend = "<br><center><div class='row' ><div class='input-field'>. <select  id='selectfaculty'><option>Select Faculty</option></select></div></center><br>"; 
		selector.innerHTML=selector.innerHTML+toAppend; 

            
        }
				return;
    }
    </script>

</div>
		  
      <!--Import jQuery before materialize.js-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="../dist/js/js/index.js" type="texr/javascript"></script>
    <script src="../dist/js/js/jquery.min.js" type="texr/javascript"></script>
    <script src="../dist/js/js/materialize.min.js" type="texr/javascript"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js'></script>
        
		  <script>   
				$('.button-collapse').sideNav({
					  menuWidth: 300, // Default is 240
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
  
		  </script> 
<script>
$(document).ready(function() {
  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  $('.modal-trigger').leanModal();
});
</script>
	
	</body>
  </html>