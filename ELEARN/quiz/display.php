<?php
echo'
<div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-line-height mui--appbar-min-height"></div>
		<div class="mui-container">
			<ul class="mui-tabs__bar mui-tabs__bar--justified">
			  <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-justified-1">Modify Quiz</a></li>
			
			</ul>
			<div class="mui-tabs__pane mui--is-active" id="pane-justified-1">
			
				<div class="mui-container">
				<form id="quesForm" class="mui-form" action="modify_form.php" method="POST">				
				<table class="mui-table mui-table--bordered" >
					  <thead>
						<tr>
						
						<th>Question ID</th>
						  <th>Question</th>
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody id="dataTable">';
					  
	  echo '<tr>
	  	<TD><INPUT type="checkbox" name="qid[]" value="$row[2]">.$row[2].</TD>
		
      <td class="mui-col-xs-12 mui-col-md-12">
		<div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block21" name="questions[]" >
								<label>Enter your Question</label>
							</div>
							</td>
							<td>
							  <div class="mui-textfield mui-textfield--float-label">
								<input type="text" id="block26"  name="answers[]"> 
								<label>Answer</label>
							  </div>
						  </td>
						  </tr>
	
	';
  
						echo'		  </tbody>
					<table>
						
							 <button type="submit" class="mui-btn mui-btn--raised mui-btn--accent" name="submit"><b>Submit</b></button>
							 <button type="button" class="mui-btn mui-btn--raised mui-btn--accent" name="delete" id="delete"><b>Delete</b></button>
						</table>
					</table>
					
							 </form>
						
				</div>
			</div>
			
			
		</div>
    </div>

';
	

?>