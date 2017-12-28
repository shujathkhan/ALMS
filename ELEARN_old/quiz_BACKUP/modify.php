<?php
session_start();
require_once 'dbconfig.php';
	//$noq = $_POST['noq'];
	$qtype = $_GET['q'];
	$_SESSION['qtype']=$qtype;
	$quizrefid = $_SESSION['quizrefid'];
	$table = 'quiz_table_'.$_SESSION['courseid'];
    $_SESSION['quiztable'] = $table;
	switch($qtype){
	case 'mcq':
	{
		
	echo '	<div id="content-wrapper" class="mui--text-center">
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
						  <th>Option 1</th>
						  <th>Option 2</th>
						  <th>Option 3</th>
						  <th>Option 4</th>
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody id="dataTable">';
					  $query = sprintf("SELECT questions,options,answers,questionrefid FROM $table where quiztype='mcq'");
                $result = mysqli_query($conn,$query);
				$count='0';
				while($row=mysqli_fetch_array($result)){
				
				++$count;
				$op=explode('~`',$row[1]);
	  echo '<tr>
	  	<TD><INPUT type="checkbox" name="qid[]" value="'.$row[3].'">'.$row[3].'</TD>
		
      <td class="mui-col-xs-12 mui-col-md-12">
		<div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block21" name="questions[]" value='.$row[0].'>
								<label>Enter your Question</label>
							</div>
							</td>
		  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								 <input type="text" name="op1[]" value="';
								 echo $op[0];
								 echo '">
								<label>Option 1</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" name="op2[]" value="'.$op[1].'">
								<label>Option 2</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" name="op3[]" value="'.$op[2].'">
									<label>Option 3</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" name="op4[]" value="'.$op[3].'">
								<label>Option 4</label>
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
							 <button type="button" class="mui-btn mui-btn--raised mui-btn--accent" name="delete" id="delete" ><b>Delete</b></button>
						</table>
					</table>
					
							 </form>
						
				</div>
			</div>
			
			
		</div>
    </div>

';

	break;
	}
	case 'fib':
	echo '	<div id="content-wrapper" class="mui--text-center">
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
					  $query = sprintf("SELECT questions,answers,questionrefid FROM $table where quiztype='fib'");
                $result = mysqli_query($conn,$query);
				$count='0';
				while($row=mysqli_fetch_array($result)){
				++$count;
	  echo '<tr>
	  	<TD><INPUT type="checkbox" name="qid[]" value="'.$row[2].'">'.$row[2].'</TD>
		
      <td class="mui-col-xs-12 mui-col-md-12">
		<div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block21" name="questions[]" value='.$row[0].'>
								<label>Enter your Question</label>
							</div>
							</td>
							<td>
							  <div class="mui-textfield mui-textfield--float-label">
								<input type="text" id="block26" value="'.$row[1].'" name="answers[]"> 
								<label>Answer</label>
							  </div>
						  </td>
						  </tr>
	
	';
  
				}			echo'		  </tbody>
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
	break;
	case 'tf':
	echo '	<div id="content-wrapper" class="mui--text-center">
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
					  $query = sprintf("SELECT questions,answers,questionrefid FROM $table where quiztype='tf'");
                $result = mysqli_query($conn,$query);
				$count='0';
				while($row=mysqli_fetch_array($result)){
				++$count;
	  echo '<tr>
	  	<TD><INPUT type="checkbox" name="qid[]" value="'.$row[2].'">'.$row[2].'</TD>
		
      <td class="mui-col-xs-12 mui-col-md-12">
		<div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block21" name="questions[]" value='.$row[0].'>
								<label>Enter your Question</label>
							</div>
							</td>
							<td>
							  <div class="mui-select">
						<select name="answers[]">
						<option value="True">True</option>
						<option value="False">False</option>
						</select>
						</div>
						  </td>
						  </tr>
	
	';
  
				}			echo'		  </tbody>
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
	break;
	case 'rear':
	echo '<div id="content-wrapper" class="mui--text-center">
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
						<th>Code</th>
						  <th>Question</th>
						  <th>Option 1</th>
						  <th>Option 2</th>
						  <th>Option 3</th>
						  <th>Option 4</th>
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody id="dataTable">';
					  $query = sprintf("SELECT questions,options,answers,questionrefid,code FROM $table where quiztype='rear'");
                $result = mysqli_query($conn,$query);
				$count='0';
				while($row=mysqli_fetch_array($result)){
				
				++$count;
				$op=explode('~`',$row[1]);
	  echo '<tr>
	  	<TD><INPUT type="checkbox" name="qid[]" value="'.$row[3].'">'.$row[3].'</TD>
		
      <td>
		<div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block21" name="questions[]" value='.$row[0].'>
								<label>Enter your Question</label>
							</div>
							</td>
							<td class="mui-col-xs-12 mui-col-md-12">
		<div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block21" name="code[]" value='.$row[4].'>
								<label>Enter your Code</label>
							</div>
							</td>
		  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								 <input type="text" name="op1[]" value="';
								 echo $op[0];
								 echo '">
								<label>Option 1</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" name="op2[]" value="'.$op[1].'">
								<label>Option 2</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" name="op3[]" value="'.$op[2].'">
									<label>Option 3</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" name="op4[]" value="'.$op[3].'">
								<label>Option 4</label>
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
							 <button type="button" class="mui-btn mui-btn--raised mui-btn--accent" name="delete" id="delete"><b>Delete</b></button>
						</table>
					</table>
					
							 </form>
						
				</div>
			</div>
			
			
		</div>
    </div>';
	break;
	case 'cmcq':
	echo '<div id="content-wrapper" class="mui--text-center">
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
						<th>Code</th>
						  <th>Question</th>
						  <th>Option 1</th>
						  <th>Option 2</th>
						  <th>Option 3</th>
						  <th>Option 4</th>
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody id="dataTable">';
					  $query = sprintf("SELECT questions,options,answers,questionrefid,code FROM $table where quiztype='cmcq'");
                $result = mysqli_query($conn,$query);
				$count='0';
				while($row=mysqli_fetch_array($result)){
				
				++$count;
				$op=explode('~`',$row[1]);
	  echo '<tr>
	  	<TD><INPUT type="checkbox" name="qid[]" value="'.$row[3].'">'.$row[3].'</TD>
		
      <td>
		<div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block21" name="questions[]" value='.$row[0].'>
								<label>Enter your Question</label>
							</div>
							</td>
							<td class="mui-col-xs-12 mui-col-md-12">
		<div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block21" name="code[]" value='.$row[4].'>
								<label>Enter your Code</label>
							</div>
							</td>
		  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								 <input type="text" name="op1[]" value="';
								 echo $op[0];
								 echo '">
								<label>Option 1</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" name="op2[]" value="'.$op[1].'">
								<label>Option 2</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" name="op3[]" value="'.$op[2].'">
									<label>Option 3</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" name="op4[]" value="'.$op[3].'">
								<label>Option 4</label>
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
							 <button type="button" class="mui-btn mui-btn--raised mui-btn--accent" name="delete" id="delete"><b>Delete</b></button>
						</table>
					</table>
					
							 </form>
						
				</div>
			</div>
			
			
		</div>
    </div>
';
	break;
	case 'short':
	echo '<div id="content-wrapper" class="mui--text-center">
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
						  <th>Keywords</th>
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody id="dataTable">';
					  $query = sprintf("SELECT questions,options,answers,questionrefid FROM $table where quiztype='short'");
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
							 <button type="button" class="mui-btn mui-btn--raised mui-btn--accent" name="delete" id="delete"><b>Delete</b></button>
						</table>
					</table>
					
							 </form>
						
				</div>
			</div>
			
			
		</div>
    </div>';
	break;
	case 'long':
	echo '<div id="content-wrapper" class="mui--text-center">
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
						  <th>Keywords</th>
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody id="dataTable">';
					  $query = sprintf("SELECT questions,options,answers,questionrefid FROM $table where quiztype='long'");
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
							 <button type="button" class="mui-btn mui-btn--raised mui-btn--accent" name="delete" id="delete"><b>Delete</b></button>
						</table>
					</table>
					
							 </form>
						
				</div>
			</div>
			
			
		</div>
    </div>';
	break;
}
	 ?>