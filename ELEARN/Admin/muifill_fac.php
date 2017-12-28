<!doctype html>
<?php
session_start();
require_once 'dbconfig.php';
?>
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
	<div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-height"></div>
		<div class="mui-container">
			<ul class="mui-tabs__bar mui-tabs__bar--justified">
			  <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-justified-1">Add Quiz</a></li>
			  <li><a data-mui-toggle="tab" data-mui-controls="pane-justified-2">Modify Quiz</a></li>
			
			</ul>
			<div class="mui-tabs__pane mui--is-active" id="pane-justified-1">
				
				<div class="container">
					<form class="mui-form" action="muifill_form.php" method="POST">
					<table class="mui-table mui-table--bordered">

					  <thead>
						<tr>
						
						  <th class="mui--text-center">Question</th>
						 
						  <th class="mui--text-center">Answer</th>
						</tr>
					  </thead>
					  <table class="mui-table mui-table--bordered" >
					  
					  <tbody id="dataTable">
						<tr>
						<TD><INPUT type="checkbox" name="chk[]"/></TD>
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
						  
						</tr>
					
					  </tbody>
					  <table>
					   <button type="submit" class="mui-btn mui-btn--raised mui-btn--accent" name="submit"><b>Submit</b></button>
					   <div class="tooltip"><i class="fa fa-question-circle-o fa-5" aria-hidden="true"></i>
  <span class="tooltiptext">Only one word for the answer!</span>
</div>
					  </table>
					</table>
					</form>
					
					<div class="mui-col-xs-8 mui-col-sm-8 mui-col-md-12">
						<button onclick="addRow('dataTable')" class="AddItem mui-btn mui-btn--raised mui-btn--success"><b>+</b></button>
						<button onclick="deleteRow('dataTable')" class="mui-btn mui-btn--raised mui-btn--danger"><b>-</b></button>
						</div>
						
				</div>
			</div>
			<div class="mui-tabs__pane" id="pane-justified-2">
							<div class="mui-container">
  <form class="mui-form" method="POST" action="muifill_modify.php">
		<table class="mui-table mui-table--bordered">
					  <thead>
						<tr>
						  <th>Question</th>
						
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody>
						
		
	<?php
				
				$query = sprintf('SELECT questions,answers FROM quiz_it1000_c where quiztype="fib" ');
                $result = mysqli_query($conn,$query);
				
				while($row=mysqli_fetch_array($result)){
		
	$select='<tr>
						  <td>
	
							<div class="mui-textfield mui-textfield--float-label" >
								<input type="text" id="block21" name="questions[]" value='.$row[0].'>
								<label>Question</label>
							</div>
							
								
	
						  </td>
						<td>
								  <div class="mui-textfield mui-textfield--float-label">
								<input type="text" id="block26" name="answers[]" value='.$row[1].'> 
								<label>Answer</label>
							  </div>
						  </td>
						  
						</tr>
						';
						echo $select;
				
			

				
				}				
			
			
?>			

					  </tbody>
					</table>
					<div class="mui-container mui--text-center">
			<button type="submit" name="submit" class="mui-btn mui-btn--primary mui-btn--raised">Submit</button>
		</div>
</form>
				</div>
			</div>
			
		</div>
    </div>

  </body>
</html>
