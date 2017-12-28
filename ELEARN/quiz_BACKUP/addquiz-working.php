<?php
session_start();
require_once 'dbconfig.php';
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ELEARN | Quiz</title>
    <link href="//cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css" />
	<link href="css/tooltip.css" rel="stylesheet" type="text/css" />
	<!-- load icon font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="static/style.css" rel="stylesheet" type="text/css" />
	<link href="static/style2.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
	<script src="add&delrow.js"></script>
	
  </head>
  <body>
    <header class="mui-appbar mui--z1 mui--bg-danger">
      <div class="mui-container">
        <table width="100%">
          <tr class="mui--appbar-height">
            <td class="mui--text-title">ELEARN | Quiz</td>
           
          </tr>
        </table>
      </div>
    </header>
	<?php
	$noq = $_POST['noq'];
	$qtype = $_POST['qtype'];
	$quizrefid = $_SESSION['quizrefid'];
	$table = 'quiz_table_'.$_SESSION['courseid'];
    $_SESSION['quiztable'] = $table;
for($i=1;$i<=$noq;$i++){	
        
		$sql=sprintf("select max(questionrefid) from $table");
        $sql2=sprintf("select COUNT(questions) from $table");
	    $res = mysqli_query($conn,$sql);
	    $res2= mysqli_query($conn,$sql2);	
		$row = mysqli_fetch_row($res);	
		$row2 = mysqli_fetch_row($res2);
	if($row[0] == ''){
		$N = str_pad($i, 4, "0", STR_PAD_LEFT);
		$questionrefid = $quizrefid.'N'.$N;
		$sql=sprintf("insert into $table (quizrefid,questionrefid,quiztype) values ('$quizrefid','$questionrefid','$qtype') ");
		$res = mysqli_query($conn,$sql);
		//echo $questionrefid."<br>";
		}
		else{
		$questionrefid = $row[0];
		preg_match('/(.*?)(\d+)$/', $questionrefid, $match);
		$base = $match[1];
		$num = $match[2]+1;
		$N = str_pad($num, 4, "0", STR_PAD_LEFT);
		$questionrefid = $base.$N;
		$sql=sprintf("insert into $table (quizrefid,questionrefid,quiztype) values ('$quizrefid','$questionrefid','$qtype') ");
		$res = mysqli_query($conn,$sql);
		}
		
	}
	switch($qtype){
	case 'mcq':
	{
	echo '	<div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-line-height mui--appbar-min-height"></div>
		<div class="mui-container">
			<ul class="mui-tabs__bar mui-tabs__bar--justified">
			  <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-justified-1">Add Quiz</a></li>
			
			</ul>
			<div class="mui-tabs__pane mui--is-active" id="pane-justified-1">
			
				<div class="mui-container">
				<form class="mui-form" action="muimcq_form.php" method="POST">				
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
					  $sql1=sprintf("select questionrefid,questions from $table where quizrefid = '$quizrefid' AND quiztype = '$qtype' AND questions IS NULL");
					  $res1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
					
					  for($i=1;$i<=$noq;$i++){	
$row = mysqli_fetch_row($res1);					
					echo '<tr>
						<TD><input type="hidden" name="quesid[]" value="'.$row[0].'">'.$row[0].'</TD>
						  <td>
							<div class="mui-textfield mui-textfield--float-label" >
								<textarea style="min-height: 30px;" id="block21" name="questions[]"></textarea>
								<label>Enter your Question</label>
							</div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block22" name="op1[]">
								<label>Option 1</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block23" name="op2[]">
								<label>Option 2</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block24" name="op3[]">
								<label>Option 3</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block25" name="op4[]">
								<label>Option 4</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label">
								<input type="text" id="block26" name="answers[]"> 
								<label>Answer</label>
							  </div>
						  </td>
						  
						</tr>';
					  }
					  
					  
			echo'		  </tbody>
					<table>
						
							 <button type="submit" class="mui-btn mui-btn--raised mui-btn--accent" name="submit"><b>Submit</b></button>
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
	echo '<div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-height"></div>
		<div class="mui-container">
			<ul class="mui-tabs__bar mui-tabs__bar--justified">
			  <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-justified-1">Add Quiz</a></li>
			  
			
			</ul>
			<div class="mui-tabs__pane mui--is-active" id="pane-justified-1">
				
				<div class="container">
					<form class="mui-form" action="muifill_form.php" method="POST">
					<table class="mui-table mui-table--bordered">

					  <thead>
						<tr>
						
						  <th class="mui--text-center">Question ID</th>
						  <th class="mui--text-center">Question</th>
						 
						  <th class="mui--text-center">Answer</th>
						</tr>
					  </thead>
					  <table class="mui-table mui-table--bordered" >
					  
					  <tbody id="dataTable">';
					  $sql1=sprintf("select questionrefid,questions from $table where quizrefid = '$quizrefid' AND quiztype = '$qtype' AND questions IS NULL");
					  $res1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
					
					  for($i=1;$i<=$noq;$i++){	
$row = mysqli_fetch_row($res1);					
					echo '<tr>
						<TD><input type="hidden" name="quesid[]" value="'.$row[0].'">'.$row[0].'</TD>
						  <td>
							<div class="mui-textfield mui-textfield--float-label" >
								<textarea style="min-height: 30px;" id="block21" name="questions[]"></textarea>
								<label>Enter your Question</label>
							</div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label">
								<input type="text" id="block26" name="answers[]"> 
								<label>Answer</label>
							  </div>
						  </td>
						  
					  </tr>';}
					echo '
					  </tbody>
					  <table>
					   <button type="submit" class="mui-btn mui-btn--raised mui-btn--accent" name="submit"><b>Submit</b></button>
					   <div class="tooltip"><i class="fa fa-question-circle-o fa-5" aria-hidden="true"></i>
  <span class="tooltiptext">Only one word for the answer!</span>
</div>
					  </table>
					</table>
					</form>
					
						
				</div>
			</div>
			
			
		</div>
    </div>';
	break;
	case 'tf':
	echo '<div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-height"></div>
		<div class="mui-container">
			<ul class="mui-tabs__bar mui-tabs__bar--justified">
			  <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-justified-1">Add Quiz</a></li>
			  
			
			</ul>
			<div class="mui-tabs__pane mui--is-active" id="pane-justified-1">
				
				<div class="container">
				<form class="mui-form" action="muitf_form.php" method="POST">
					<table class="mui-table mui-table--bordered">

					  <thead>
						<tr>
						 
						  <th class="mui--text-center">Question ID</th>
						  <th class="mui--text-center">Question</th>
						  <th class="mui--text-center">Answer</th>
		
						</tr>
					  </thead>
					 <tbody id="dataTable">';
					  $sql1=sprintf("select questionrefid,questions from $table where quizrefid = '$quizrefid' AND quiztype = '$qtype' AND questions IS NULL");
					  $res1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
					
					  for($i=1;$i<=$noq;$i++){	
$row = mysqli_fetch_row($res1);					
					echo '<tr>
						<TD><input type="hidden" name="quesid[]" value="'.$row[0].'">'.$row[0].'</TD>
						  <td>
							<div class="mui-textfield mui-textfield--float-label">
								<textarea style="min-height: 30px;"id="block21" name="questions[]"></textarea>
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
						  
						  
					  </tr>';}
					  echo'
					  </tbody>
					   <table>
					   <button type="submit" class="mui-btn mui-btn--raised mui-btn--accent" name="submit"><b>Submit</b></button>
					  </table>
					</table>
					</form>
					
				</div>
			</div>
			
			
		</div>
    </div>';
	break;
	case 'rear':
	echo '<div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-line-height mui--appbar-min-height"></div>
		<div class="mui-container">
			<ul class="mui-tabs__bar mui-tabs__bar--justified">
			  <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-justified-1">Add Quiz</a></li>
			  
			
			</ul>
			<div class="mui-tabs__pane mui--is-active" id="pane-justified-1">
			
				<div class="container">
				<form class="mui-form" action="quiz_code_rearrange_form.php" method="POST">				
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
					  $sql1=sprintf("select questionrefid,questions from $table where quizrefid = '$quizrefid' AND quiztype = '$qtype' AND questions IS NULL");
					  $res1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
					
					  for($i=1;$i<=$noq;$i++){	
$row = mysqli_fetch_row($res1);					
					echo '<tr>
						<TD><input type="hidden" name="quesid[]" value="'.$row[0].'">'.$row[0].'</TD>
						  <td>
						  
							<div class="mui-textfield mui-textfield--float-label" >
								<textarea style="min-height: 30px;" id="block26" name="code[]" ></textarea>
								<label>Enter your Code</label>
							</div>
						  </td>
						  <td>
							<div class="mui-textfield mui-textfield--float-label" >
								<textarea style="min-height: 30px;" id="block21" name="questions[]"></textarea>
								<label>Enter your Question</label>
							</div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block22" name="op1[]">
								<label>Option 1</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block23" name="op2[]">
								<label>Option 2</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block24" name="op3[]">
								<label>Option 3</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block25" name="op4[]">
								<label>Option 4</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label">
								<input type="text" id="block26" name="answers[]"> 
								<label>Answer</label>
							  </div>
						  </td>
						  
						</tr>';
						}
					echo'
					  </tbody>
					<table>
						
							 <button type="submit" class="mui-btn mui-btn--raised mui-btn--accent" name="submit"><b>Submit</b></button>
						</table>
					</table>
					
							 </form>
						
						
						
						</div>
				</div>
			</div>
			
			
		</div>
    </div>';
	break;
	case 'cmcq':
	echo '	<div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-line-height mui--appbar-min-height"></div>
		<div class="mui-container">
			<ul class="mui-tabs__bar mui-tabs__bar--justified">
			  <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-justified-1">Add Quiz</a></li>
			  
			
			</ul>
			<div class="mui-tabs__pane mui--is-active" id="pane-justified-1">
			
				<div class="mui-container">
				<form class="mui-form" action="quiz_MCQ_form.php" method="POST">				
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
					  $sql1=sprintf("select questionrefid,questions from $table where quizrefid = '$quizrefid' AND quiztype = '$qtype' AND questions IS NULL");
					  $res1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
					
					  for($i=1;$i<=$noq;$i++){	
$row = mysqli_fetch_row($res1);					
					echo '<tr>
						<TD><input type="hidden" name="quesid[]" value="'.$row[0].'">'.$row[0].'</TD>
						  <td>
						  
							<div class="mui-textfield mui-textfield--float-label" >
								<textarea style="min-height: 30px;" id="block26" name="code[]" ></textarea>
								<label>Enter your Code</label>
							</div>
						  </td>
						  <td>
							<div class="mui-textfield mui-textfield--float-label" >
								<textarea style="min-height: 30px;" id="block21" name="questions[]"></textarea>
								<label>Enter your Question</label>
							</div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block22" name="op1[]">
								<label>Option 1</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block23" name="op2[]">
								<label>Option 2</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block24" name="op3[]">
								<label>Option 3</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block25" name="op4[]">
								<label>Option 4</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label">
								<input type="text" id="block26" name="answers[]"> 
								<label>Answer</label>
							  </div>
						  </td>
						  
					  </tr>';}
					  echo'
					
					  </tbody>
					<table>
						
							 <button type="submit" class="mui-btn mui-btn--raised mui-btn--accent" name="submit"><b>Submit</b></button>
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
      <div class="mui--appbar-height"></div>
		<div class="mui-container">
			<ul class="mui-tabs__bar mui-tabs__bar--justified">
			  <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-justified-1">Add Quiz</a></li>
			  
			
			</ul>
			<div class="mui-tabs__pane mui--is-active" id="pane-justified-1">
				
				<div class="container">
					<form class="mui-form" action="muishort_form.php" method="POST">
					<table class="mui-table mui-table--bordered">

					  <thead>
						<tr>
						
						  <th class="mui--text-center">Question ID</th>
						  <th class="mui--text-center">Question</th>
						 <th class="mui--text-center">Answer</th>
						 <th class="mui--text-center">Keywords</th>
						</tr>
					  </thead>
					  <table class="mui-table mui-table--bordered" >
					  
					  <tbody id="dataTable">';
					  $sql1=sprintf("select questionrefid,questions from $table where quizrefid = '$quizrefid' AND quiztype = '$qtype' AND questions IS NULL");
					  $res1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
					
					  for($i=1;$i<=$noq;$i++){	
$row = mysqli_fetch_row($res1);					
					echo '<tr>
						<TD><input type="hidden" name="quesid[]" value="'.$row[0].'">'.$row[0].'</TD>
						  <td>
							<div class="mui-textfield mui-textfield--float-label" >
								<textarea style="min-height: 30px;" id="block21" name="questions[]"></textarea>
								<label>Enter your Question</label>
							</div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label">
								<input type="text" id="block26" name="answers[]"> 
								<label>Answer</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label">
								<input type="text" id="block26" name="keyword[]"> 
								<label>Keyword</label>
							  </div>
						  </td>
						  
					  </tr>';}
					echo '
					  </tbody>
					  <table>
					   <button type="submit" class="mui-btn mui-btn--raised mui-btn--accent" name="submit"><b>Submit</b></button>
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
      <div class="mui--appbar-height"></div>
		<div class="mui-container">
			<ul class="mui-tabs__bar mui-tabs__bar--justified">
			  <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-justified-1">Add Quiz</a></li>
			  
			
			</ul>
			<div class="mui-tabs__pane mui--is-active" id="pane-justified-1">
				
				<div class="container">
					<form class="mui-form" action="muilong_form.php" method="POST">
					<table class="mui-table mui-table--bordered">

					  <thead>
						<tr>
						
						  <th class="mui--text-center">Question ID</th>
						  <th class="mui--text-center">Question</th>
						 <th class="mui--text-center">Answer</th>
						 <th class="mui--text-center">Keywords</th>
						</tr>
					  </thead>
					  <table class="mui-table mui-table--bordered" >
					  
					  <tbody id="dataTable">';
					  $sql1=sprintf("select questionrefid,questions from $table where quizrefid = '$quizrefid' AND quiztype = '$qtype' AND questions IS NULL");
					  $res1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
					
					  for($i=1;$i<=$noq;$i++){	
$row = mysqli_fetch_row($res1);					
					echo '<tr>
						<TD><input type="hidden" name="quesid[]" value="'.$row[0].'">'.$row[0].'</TD>
						  <td>
							<div class="mui-textfield mui-textfield--float-label" >
								<textarea style="min-height: 30px;" id="block21" name="questions[]"></textarea>
								<label>Enter your Question</label>
							</div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label">
								<input type="text" id="block26" name="answers[]"> 
								<label>Answer</label>
							  </div>
						  </td>
						  <td>
							  <div class="mui-textfield mui-textfield--float-label">
								<input type="text" id="block26" name="keyword[]"> 
								<label>Keyword</label>
							  </div>
						  </td>
						  
					  </tr>';}
					echo '
					  </tbody>
					  <table>
					   <button type="submit" class="mui-btn mui-btn--raised mui-btn--accent" name="submit"><b>Submit</b></button>
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
	  </body>
</html>