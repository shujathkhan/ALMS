
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
<link rel="stylesheet" href="prettify.css" />
<script src="prettify.js"></script>
<script>
window.onload = (function(){ prettyPrint(); });
</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.js"></script>
   <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  

  
    <link rel="stylesheet" type="text/css" href="/css/normalize.css">
  

  
    
      <script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    
    
      <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
    
  

 
    <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  

  

  <style type="text/css">
    


#drop
{
  background-color: red;
  
}
.over {
  border: solid 5px purple;
}
.draggable
{
  border: solid 2px gray;
}
  </style>

		
		<script type = "text/javascript" language = "javascript">
         $(document).ready(function() {
            $("#driver").click(function(event){
			var age = jQuery.map(jQuery('.map-test'),function(n,i){
                return jQuery(n).attr('id');
            });
               var name = $("#name").val();
               $.post("quiz_code_rearrange_eval.php",{ "age": age},
			   function(data)
			   {
				   alert(data);
				   //location.href="quiz_code_rearrange.php";
        });
            });

         });
      </script>
   
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$("#origin").sortable({connectWith: "#drop"});

$("#drop").sortable({connectWith: "#origin"});
});//]]> 

</script>

  
    <link href="//cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css" />
    <link href="static/style.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<style>
.card-example {
  position: relative;
  background-color: #fff;
}

.card-example .label {
  padding: 	0px 0px 0;
}
.mui-appbar{
	min-height:30px;
}
.mui--appbar-height{
	height:30px;
}


</style>
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
	<br><br>
	<div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-height"></div>
		<div class="mui-container">
			
			<table class="mui-table">
  <thead>
    <tr>
      <th class="mui-col-xs-6 mui-col-md-6">Question</th>
      <th class="mui-col-xs-6 mui-col-md-6">Answer</th>
    </tr>
  </thead>

		<?php
		$table="quiz_table_it1001";
		$qtype="cmcq";
				$query = sprintf("SELECT questions,options,answers FROM $table where quiztype='$qtype'");
                $result = mysqli_query($conn,$query);
				
				while($row=mysqli_fetch_array($result)){
				$query1 = sprintf("SELECT code FROM $table where quiztype='$qtype'");
                $result1 = mysqli_query($conn,$query1);
				$count='0';
				$qcount='0';
					
echo'   
<form class="mui-form">
<tbody>
    <tr>
      <td class="mui-col-xs-6 mui-col-md-6">
		Rearrange the codes accordingly to compile the following code:
<center>
<pre class="prettyprint" style="text-align:center;">';
$rows=mysqli_fetch_array($result1);
				$code=str_replace("<","&lt;",$rows[0]);
echo $code;
				
echo'	  </pre>	  
 </center>
 </td>
 
  
  <td class="mui-col-xs-6 mui-col-md-6"> 
  <div id="origin" class="fbox">';
 for($i=0;$i<4;$i++){
					++$count;
				$op=explode('~`',$row[1]);
				$op=str_replace("<","&lt;",$op);
	  $select='
	  <div class="mui-container ">';
	  $select.='
  <div class="card-example mui--z1">
    <div class="label">
      <div class="mui--text-dark-secondary mui--text-caption">
    <pre class="prettyprint map-test" id="'.$count.'"name="op[]" style="text-align:left;">
	'.$op[$qcount].'
	
	</pre>
</div>
</div>
</div>
</div>

';
echo $select;
$qcount++;

				}
				echo'<button  type = "button" id = "driver"  class="mui-btn mui-btn--raised mui-btn--accent">Submit</button>

	</div>
	

</td>
</tr>
  </tbody>
</form>
	';
				}
?>

</table>
			
		</div>
    </div>


  </body>
</html>
