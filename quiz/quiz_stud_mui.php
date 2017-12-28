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
    <link href="static/style.css" rel="stylesheet" type="text/css" />
    <link href="css/modal.css" rel="stylesheet" type="text/css" />
    
    <script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
	
	 
  </head>	
  <body>
<div class="mui-appbar mui--z1 mui--bg-danger">
  <table width="100%">
    <tr style="vertical-align:middle;">
      <td class="mui--text-title">ELEARN | Quiz</td></tr>
  </table>
</div>
 <body>
<br>
<br>
<br>

<a class="btn" href="#open-modal">MCQ</a>
<div id="open-modal" class="modal-window">
  <div>
    <a href="#modal-close" title="Close" class="modal-close">Close</a>
    
    <div><?php include('mcq.php')?></div>
    </div>
</div>
<br>
<br>
<center>
		<input type="submit" value="END Quiz"  class="mui-btn mui-btn--raised mui-btn--primary"></input>
</center>
 </body>
</html>
