<?php
echo" <script>
      $(function () {
        $('#shortform').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'muishort_eval.php',
            data: $('#shortform').serialize(),
            success: function (data) {
			alert('Short Success');
            }
          });

        });
      });
    </script>	";

	echo '	
	<script>
		
		$(document).ready(function(){
			
			$("#submitshort").click(function(){
				if (confirm("Are you sure you want to submit?")) {
								$("#modalshort").closeModal();
				$("#short").attr("disabled", true);
			}
			else{
				return false;
			}
			});
			
		});
		</script>
	<form id="shortform">
		<table>
					  <thead>
						<tr>
						  <th>Question</th>
						
						  <th>Hint 1</th>
						  
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody>';
					  $table = 'quiz_table_'.$_SESSION['courseid'];
					$qtype='short';
				$query = sprintf("SELECT questions,options FROM $table where quiztype='$qtype' ");
                $result = mysqli_query($conn,$query);
				$count='0';
				while($row=mysqli_fetch_array($result)){
					++$count;
				$op=explode('~`',$row[1]);
	$select='<tr>
						  <td>
				<div class="col s12">
								
								'.$row[0].'
								
							</div>
						  </td>
				
						  			  <td>
				<div class="col s12">
								
								'.$op[0].'
								
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
			 <button class="btn waves-effect waves-light" type="submit" id="submitshort" name="submit">Submit</button>
		</center>
</form>

';
?>