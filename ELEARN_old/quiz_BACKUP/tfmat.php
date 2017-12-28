<?php
echo" 

<script src='http://code.jquery.com/jquery-1.9.1.js'></script><script>
      $(function () {
        $('#tfform').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'muiT_Feval.php',
            data: $('#tfform').serialize(),
            success: function (data) {
			console.log('TF Success');
            }
          });

        });
      });
    </script>	";
	echo '    <script>
		
		$(document).ready(function(){
			
			$("#submittf").click(function(){
				if (confirm("Are you sure you want to submit?")) {
				$("#modaltf").closeModal();
				$("#tf").attr("disabled", true);
			}
			else{
				return false;
			}
			});
			
		});
		</script>
	<link href="//cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css" />
	<script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
				<div class="mui-container">
  <form class="mui-form" id="tfform">
		<table>
					  <thead>
						<tr>
						  <th>Question</th>
						
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody>';
				$query = sprintf("SELECT questions,answers,questionrefid FROM $table where quiztype='$qtype' ");
                $result = mysqli_query($conn,$query);
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
	$select='<tr>
						  <td>
	<div>
								
								'.$row[0].'
								
							</div>
						  </td>
						<td>
							<div class="mui-select">
						<select name="answer[]">
						<option value="True">True</option>
						<option value="False">False</option>
						</select>
						</div>
						  </td>
						  
						</tr>';
						echo $select;
			}


					  echo '</tbody>
					</table>
					<div class="mui-container mui--text-center">
			<button type="submit" id="submittf" name="submit" class="mui-btn mui-btn--primary mui-btn--raised">Submit</button>
		</div>
</form>
				</div>
			
';

?>