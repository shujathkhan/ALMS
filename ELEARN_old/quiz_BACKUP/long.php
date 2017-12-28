<?php
echo '<div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-line-height mui--appbar-min-height"></div>
		<div class="mui-container">
			<ul class="mui-tabs__bar mui-tabs__bar--justified">
			  <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-justified-1">Modify Quiz</a></li>
			
			</ul>
			<div class="mui-tabs__pane mui--is-active" id="pane-justified-1">
			
				<div class="mui-container">
				<form class="mui-form" action="modify_form.php" method="POST">				
				<table class="mui-table mui-table--bordered" >
					  <thead>
						<tr>
						
						<th>Question ID</th>
						  <th>Question</th>
						  <th>Keywords</th>
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody id="dataTable">';
					  $query = sprintf("SELECT questions,options,answers,questionrefid FROM $table where quiztype='$qtype'");
                $result = mysqli_query($conn,$query);
				$count='0';
				while($row=mysqli_fetch_array($result)){
				
				++$count;
				$op=$row[1];
	  echo '<tr>
	  	<TD><INPUT type="checkbox" name="qid[]" value="'.$row[3].'">'.$row[3].'</TD>
		
      <td>
		<div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block21" name="questions[]" value='.$row[0].'>
								<label>Enter your Question</label>
							</div>
							</td>
		  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								 <input type="text" name="keywords[]" value="';
								 echo $op;
								 echo '">
								<label>Keywords</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label">
								<input type="text" id="block26" value="'.$row[2].'" name="answers[]"> 
								<label>Answer</label>
							  </div>
						  </td>
						  </tr>
	
	';
  
				}			echo'		  </tbody>
					<table>
						
							 <button type="submit" class="mui-btn mui-btn--raised mui-btn--accent" name="submit"><b>Submit</b></button>
						</table>
					</table>
					
							 </form>
						
				</div>
			</div>
			
			
		</div>
    </div>';
?>