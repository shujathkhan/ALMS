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
					  <tbody>
						
		
	<?php
			/*	$query = sprintf('SELECT questions,answers FROM quiz_it1000_c where quiztype="fib" ');
                $result = mysqli_query($conn,$query);
				while($row=mysqli_fetch_array($result)){*/
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
			//}
?>			

					  </tbody>
					</table>
					<div class="mui-container mui--text-center">
			<button type="submit" name="submit" class="mui-btn mui-btn--primary mui-btn--raised">Submit</button>
		</div>
</form>
				</div>
			</div>
  </body>
</html>
