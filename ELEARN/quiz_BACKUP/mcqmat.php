<?php

	$_SESSION['courseid']='it1010';
echo" 
<script src='http://code.jquery.com/jquery-1.9.1.js'></script>
<script>
      $(function () {
        $('#mcqform').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'muimcq_eval.php',
            data: $('#mcqform').serialize(),
            success: function (data) {
			console.log('MCQ Success');
            }
          });

        });
      });
    </script>	";
	echo '	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		  
			<script>
			 $(document).ready(function(){
				$(".collapsible").collapsible();
			  });
		</script>
		
		<script>
		
		$(document).ready(function(){
			
			$("#submit").click(function(){
				
				if (confirm("Are you sure you want to submit?")) {
				$("#modalmcq").closeModal();
				$("#mcq").attr("disabled", true);
				
			}
			else{
				return false;
			}
			});
			
		});
		</script>
			<form class="mui-form" id ="mcqform">
			<table>
   <tbody>';
$table = 'quiz_table_'.$_SESSION['courseid'];
   $type='mcq';
				$query = sprintf("SELECT questions,options,answers,questionrefid FROM $table where quiztype='$type'");
                $result = mysqli_query($conn,$query);
				$count='0';

				while($row=mysqli_fetch_array($result)){
$q=$row[0];
$a=$row[2];
$qrid=$row[3];
$sid = '100U1S1';//$_SESSION['sid'];
	$id = $_SESSION['id'];
$t="quiz_$id"."_$sid";
	$tab = sprintf("INSERT INTO $t (questionrefid, question, answer)
VALUES ('$qrid','$q','$a')");
                $res= mysqli_query($conn,$tab);
    
				++$count;
				$op=explode('~`',$row[1]);
				
	$select='<tr>
      <td>
	  
			<ul class="collapsible" data-collapsible="accordion">
					<li>
						<div class="collapsible-header">Question'.$count.'     ('.$row[3].')';
						
		 $select.='</div>
						<div class="collapsible-body">
							
		<h3>'.$row[0];
		$select.='</h3>
		    <input type="radio"
             name="op'.$count.'"
             id="'.$op[0].'" value="'.$op[0].'">   <label for="'.$op[0].'">'.$op[0].'</label>
      <br>
      <input type="radio"
             name="op'.$count.'"
             id="'.$op[1].'" value="'.$op[1].'">   <label for="'.$op[1].'">'.$op[1].'</label>
      <br> 
      <input type="radio"
             name="op'.$count.'"
             id="'.$op[2].'" value="'.$op[2].'">   <label for="'.$op[2].'">'.$op[2].'</label>
      <br>
      <input type="radio"
             name="op'.$count.'"
             id="'.$op[3].'" value="'.$op[3].'">   <label for="'.$op[3].'">'.$op[3].'</label>
      <br>
   
	</div>
		</li>
  	</ul>
	

						  
						</tr>';
						echo $select;
			}
			

					  echo '</tbody>
					</table>

	
		<center>
			 <button class="btn waves-effect waves-light" type="submit" id="submit" name="submit">Submit</button>
		</center>
</form>
		
';


?>