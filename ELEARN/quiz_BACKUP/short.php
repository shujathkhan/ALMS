<?php
		echo '<html>
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
			var age = jQuery.map(jQuery(".map-test"),function(n,i){
                return jQuery(n).attr("id");
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
   
<script type="text/javascript">//<![CDATA[
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
			<ul class="mui-tabs__bar mui-tabs__bar--justified">
			  <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-justified-1">Add Quiz</a></li>
			</ul>
			<div class="mui-tabs__pane mui--is-active" id="pane-justified-1">
				<div class="container">
				<table class="mui-table mui-table--bordered">
				<thead>
				   <th class="mui--text-center">Question</th> 
				   <th class="mui--text-center">Answer</th> 
				   <th class="mui--text-center">Hint 1</th> 
				   <th class="mui--text-center">Hint 2</th> 
				</thead>
				<tbody>';
   
   
   echo'<td> 
		<div class="mui-textfield mui-textfield--float-label">
		<input type="text" name="txt">
		<label>Question</label>
		</div>
		</td> 
		<td>
		<div class="mui-textfield mui-textfield--float-label">
		<input type="text" name="txt">
		<label>Answer</label>
		</div></td>
		<td> <div class="mui-textfield mui-textfield--float-label">
		<input type="text" name="txt"><label>Hint 1</label></div></td>
		<td><div class="mui-textfield mui-textfield--float-label">
		<input type="text" name="txt"><label>Hint 2</label>
		</div></td></tr>';
   echo'
    
 	</tbody>
				</table>
					
				</div>
			</div>
			
		</div>
    </div>

  </body>
</html>
';
?>