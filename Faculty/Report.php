<?php
session_start();
require_once 'dbconfig.php';

?>

<!DOCTYPE html>
<html>
    <head>
	
  <script>
  $(function() {
    $( "#name" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {
        $('#idForm').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'facreport.php',
            data: $('#idForm').serialize(),
            success: function (data) {
              document.getElementById("txtHint").innerHTML = data;
            }
          });

        });
      });
    </script>	
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css'>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
  
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

  <div class="container">
 <script>
  $('#selectee').attr('disabled',false);
</script>
	<form id="idForm">
		<div class="row">
		<div class="input-field col s6">
		
		<select id="select" name="select" readonly>
								<?php if($_SESSION['department']=='it')
						echo '<option value="it" >Information Technology</option>';
					else if($_SESSION['department']=='cse')
						echo '<option value="cse" >Computer Science Engineering</option>';
					else 
						echo '<option value="software" >Software Engineering</option>';
				?>
				</select>
		</div>
		
		
		<div class="input-field col s6">
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
$select='
<select name="cid" id="cid">';
$count=0;
while($row=mysqli_fetch_row($res)){
$count+=1;
//echo $row[0];
$select.='<option value='.$row[0].'>'.$row[1].'-'.$row[0].'</option>';
	}
	$select.='</select>';
		
}

echo $select;
?>
		</div>
		</div>
		
		<div class="form-group">
	
		<div class="input-field col s4">
			<input type="text" value="<?php echo $_SESSION['username'];?>" class="col s4" readonly>
	<label for="select">Faculty</label>	
	</div>
		</div>
		
		
		

		<div class="form-group">
	
	
	<div class="col s2">
	<input type='search' id='name' name='search' placeholder='Student ID'>
	<center>		
			<button class="waves-effect waves-light btn green" type="submit" name="submit">Submit</button>
		</center>
		
	
	</div>
 </div> 
</form>

	<form id="pdf">
	 <div id="txtHint">
	 
</div>
</form>
<script>
	 function historyChanged() {
    var historySelectList = $('select#faculty');
    var selectedValue = $('option:selected', historySelectList).val();

    
    if (selectedValue == 'selectfaculty') {
        historySelectList.form.submit();
    }
	else{
	document.getElementById("uploadinsert").innerHTML = '<div class="form-group"><label class="control-label col-sm-4"  for="optradio">Report Type:</label><div class="col-sm-6 radiogroup" onchange="checker()"><label class="radio-inline col-sm-4" ><input type="radio" id="Individualradio"  name="optradio"  >Individual Student</label><label class="radio-inline col-sm-4"><input type="radio" id="Overallradio"  name="optradio" >Overall Students</label></div></div>';

	}
	}

</script>
	
	
	
	</div>

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
		  </script> 
	<script>
      $(function () {
        $('#pdf').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'pdf_gen.php',
          success: function (data) {
       	  window.open('report.pdf','_blank');
            }
          });

        });
      });
    </script>	
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	</body>
  </html>