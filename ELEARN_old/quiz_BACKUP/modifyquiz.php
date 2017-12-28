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
	<script>
function showUser(str) {
  
 if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","modify.php?q="+str,true);
  
  xmlhttp.send();
}

</script>
 <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script type='text/javascript'>
$(window).load(function(){
$("#delete").live('click', function(event) {
	event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'delete_ques.php',
            data: $('#quesForm').serialize(),
            success: function (data) {
              alert(data);
            }
          });
});
});

</script>
	
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
	<center>
	<div class="mui-panel mui-col-xs-12">
	
				<div class="mui-container">
					  
					  <div class="mui-row">
					  <form class="mui-form">
	
	<div class="mui-col-xs-4"> 
						
						<div class="mui-select" >
							<select  name="qtype" id="qtype" onchange="showUser(this.value)">
							 <option >Select the type of quiz</option>
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
			
						  </div>
						  

		
					  </div>
					  
					  
				</div>
				
				</div>
				</center>		
				
					<div id="txtHint"></div>
				</div>
				
	  </body>
</html>