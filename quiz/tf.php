<?php

	echo '	<div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-height"></div>
				<br><BR>
				<div class="mui-container">
  <form class="mui-form" method="POST" action="muiT_Feval.php">
		<table class="mui-table mui-table--bordered">
					  <thead>
						<tr>
						  <th>Question</th>
						
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody>';
				$query = sprintf("SELECT questions,answers FROM $table where quiztype='$qtype' ");
                $result = mysqli_query($conn,$query);
				while($row=mysqli_fetch_array($result)){
	$select='<tr>
						  <td>
	<div class="mui-text mui-col-xs-12 mui-col-md-12">
								
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
			<button type="submit" name="submit" class="mui-btn mui-btn--primary mui-btn--raised">Submit</button>
		</div>
</form>
				</div>
			</div>
';

?>