<?php
session_start();
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ELEARN | Quiz</title>
    <link href="//cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css" />
    <link href="static/style.css" rel="stylesheet" type="text/css" />
    <link href="css/slide.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
	<script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
  </head>	
  <body>
 <?php
  $a=$_SESSION['sid'];
$id = intval($_GET['q']);
  $quizrefid = $a.'Q'.$id;
  $_SESSION['quizrefid'] = $quizrefid;
  ?>
  <center>
  <!--[if mso]><table><tr><td class="mui-container-fixed"><![endif]-->
  <div class="mui-container">
   <h3 class="mui--text-center" id="qheader">ELEARN | Quiz</h3>
<table cellpadding="0" cellspacing="0" border="0" width="50%">
  <tr>
    <td class="mui-panel" style="box-shadow: 0 15px 15px 0 rgba(0,0,0,.16), 15px 15px 30px 0 rgba(0,0,0,.12);">
      <table
          id="content-wrapper"
          border="0"
          cellpadding="0"
          cellspacing="0"
          width="100%"
      >
        <tbody>
          <tr>
            <td>
              <h2 class="mui--text-center">Welcome to Quiz Module!</h2>
            </td>
          </tr>
          <tr>
            <td class="mui--divider-top">
            
            </td>
          </tr>
          
          </tr>
        
        </tbody>
      </table>
	  
	  <form target="_blank" action="quiz_stud.php" method="post">
					  <table>
					  <tbody>
						
						
						
						  <tr>
							<div class="mui-select" >
							
							<select  name="qtype" id="qtype">
							 <option value="mcq">Multiple Choice Questions</option>
							  <option value="fib">Fill in the Blanks</option>
							  <option value="tf">True or False</option>
							  <option value="rear">Code Rearrange</option>
							  <option value="cmcq">Code based MCQ</option>
							  <option value="short">Short Questions</option>
							  <option value="long">Long Questions</option>
							</select>
							
							<label>Select Type of Quiz</label>
			</div>				
						  </tr>
						  
						  <tr class="mui-col-xs-2 mui-col-xs-2">
						  <center>
		<input type="submit" value="GO!"  class="mui-btn mui-btn--raised mui-btn--accent"></input>
</center>
		</tr> 
						  
						
					
					  </tbody>
					  </table>
					  </form> 
</tr>
				
</table>
</center>
	  
    </td>
	
  </tr>


  </body>
</html>
