<?php
	echo '	
	
	 <link href="//cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css" />
    <link href="static/style.css" rel="stylesheet" type="text/css" />
	<link href="css/tooltip.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
	<link href="static/style2.css" rel="stylesheet" type="text/css" />	
	
	<div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-height"></div>
				<br><BR>
				<div class="mui-container">
  <form class="mui-form" method="POST" action="muifill_eval.php">
		<table class="mui-table mui-table--bordered">
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
	<div class="mui-text mui-col-xs-12 mui-col-md-12">
								
								'.$row[0].'
								
							</div>
						  </td>
						<td>
							<div class="mui-textfield mui-textfield--float-label">
								<input type="text" name="ans[]">
								<label>Answer</label>
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