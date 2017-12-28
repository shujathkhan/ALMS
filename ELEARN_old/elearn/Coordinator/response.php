<?php 

require_once 'dbconfig.php';
$id = isset($_POST['field1value'])? $_POST['field1value'] : '';  
$query=sprintf("select s1,s2,s3,s4,s5 from course where courseid='$id'");
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$select='<canvas id="rgraph_canvas" height="800" width="800"></canvas>
<div id="coursecircle" class="col-sm-2">
		<div class="form-group">
		 
		  		<label class="control-label" for="subject">Subject_ID: </label>
        <input type="text" id="subject" title="subject" value="1"><br>
		</div>

   
		<label class="control-label" for="unit_1">Unit 1 : </label>
            <input type="text" class="form-control" name="unit_1" id="unit_1" title="Unit_1" value="5" /> <br>
			<label class="control-label" for="unit_2">Unit 2 : </label>        
			<input type="text" class="form-control" name="unit_2" id="unit_2" title="Unit_2" value="5"/> <br>
            <label class="control-label" for="unit_3">Unit 3 : </label>
		    <input type="text" class="form-control" name="unit_3" id="unit_3" title="Unit_3" value="5"/> <br>
            <label class="control-label" for="unit_4">Unit 4 : </label>
			<input type="text" class="form-control" name="unit_4" id="unit_4" title="Unit_4" value="5"/> <br>
            <label class="control-label" for="unit_5">Unit 5 : </label>
			<input type="text" class="form-control" name="unit_5" id="unit_5" title="Unit_5" value="5"/> <br>
        
<button type="submit" id="SubmitButton" >Generate</button>
	</div>	
		<script>
$("#coursecircle").addClass("hidden");

</script>';
echo $select;
?>