<?php
echo" 
<script>
      $(function () {
        $('#fibform').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'muifill_eval.php',
            data: $('#fibform').serialize(),
            success: function (data) {
			console.log('Fill Success');
            }
          });

        });
      });
    </script>	";
	echo '	
	<script>
		
		$(document).ready(function(){
			
			$("#submitfib").click(function(){
				if (confirm("Are you sure you want to submit?")) {
					$("#modalfib").closeModal();
				$("#fib").attr("disabled", true);
			}
			else{
				return false;
			}
			});
			
		});
		</script>
	<form id="fibform">
		<table>
					  <thead>
						<tr>
						  <th>Question</th>
						
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody>';
					  $table = 'quiz_table_'.$_SESSION['courseid'];
					$qtype='fib';
				$query = sprintf("SELECT questions,answers FROM $table where quiztype='$qtype' ");
                $result = mysqli_query($conn,$query);
				while($row=mysqli_fetch_array($result)){
	$select='<tr>
						  <td>
	<div class="input-field col s12">
								
								'.$row[0].'
								
							</div>
						  </td>
						<td>
							<div class="input-field col s12">
								<input type="text" name="ans[]">
								<label>Answer</label>
							  </div>
						  </td>
						  
						</tr>';
						echo $select;
			}


					  echo '</tbody>
					</table>
		<center>
			 <button class="btn waves-effect waves-light" type="submit" id="submitfib" name="submit">Submit</button>
		</center>
</form>

';
?>