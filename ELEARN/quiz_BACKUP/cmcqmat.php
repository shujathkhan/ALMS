<?php
echo '
<link rel="stylesheet" href="prettify.css" />
<link rel="stylesheet" href="static/mui.min.css">
<script src="prettify.js"></script>

<script>
window.onload = (function(){ prettyPrint(); });
</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<script >//<![CDATA[
$(window).load(function(){
$("#origin").sortable({connectWith: "#drop"});

$("#drop").sortable({connectWith: "#origin"});
});//]]> 
</script>
<script src="http://w3schools.com/lib/w3.js"></script>
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
.mui-appbar{
	min-height:30px;
}
.mui--appbar-height{
	height:30px;
}

</style>
<script>
myShow = w3.slideshow(".nature", 0);
</script>
<script>
		
		$(document).ready(function(){
			
			$("#submitcmcq").click(function(){
				if (confirm("Are you sure you want to submit?")) {
				
				$("#lol").attr("disabled", true);
			}
			else{
				return false;
			}
			});
			
		});
		</script>

	 <form method="POST" action="muimcq_eval.php">
			<table>
  <thead>
    <tr>
	<br><br>
      <th>Question</th>
      <th>Answer</th>
    </tr>
  </thead>
   <tbody>';
					 
				$count='0';
			
				$query1 = sprintf("SELECT DISTINCT code FROM $table where quiztype='$qtype'");
				
                $result1 = mysqli_query($conn,$query1);
				while($rows=mysqli_fetch_array($result1)){
					  $query = sprintf("SELECT questions,options,answers FROM $table where quiztype='$qtype' AND code='$rows[0]'");
				
                $result = mysqli_query($conn,$query);
					$code=str_replace("<","&lt;",$rows[0]);
	  echo '<tr>
	
      <td>
		Rearrange the codes accordingly to compile the following code:

<pre class="prettyprint" >
	
	';
  echo $code;
  echo' </pre>	  
	  </td>
	  <td>';
	
	  while($row=mysqli_fetch_array($result)){
					++$count;
					$op=str_replace("<","&lt;",$row[1]);
				$op=explode('~`',$op);
	  $select='
     <table> <tr>
	  	<div class="card">
				<ul class="collapsible" data-collapsible="accordion">
					
					<li >
						<div class="collapsible-header">Question'.$count;
						
		 $select.='</div>
						<div class="collapsible-body">
							<div class="answer1">
		<h3>'.$row[0];
		$select.='</h3>
		    <input type="radio"
             name="op'.$count.'"
             id="'.$op[0].'" value="'.$op[0].'">   <label for="'.$op[0].'">'.$op[0].'</label>
      <br>
      <input type="radio"
             name="op'.$count.'"
             id="'.$op[1].'" value="'.$op[1].'">   <label for="'.$op[1].'">'.$op[1].'</label>
      <br> 
      <input type="radio"
             name="op'.$count.'"
             id="'.$op[2].'" value="'.$op[2].'">   <label for="'.$op[2].'">'.$op[2].'</label>
      <br>
      <input type="radio"
             name="op'.$count.'"
             id="'.$op[3].'" value="'.$op[3].'">   <label for="'.$op[3].'">'.$op[3].'</label>
      <br>
   </div>
	</div>
		</li>
  	</ul>
		</div>
		</div>
		
  </div></tr></table> ';
$_SESSION['count'] = $count;  
  echo $select;
	  }	}			echo'		 		
	</td>
	
	
		</div>


    </tr>
  </tbody>
</table>
<center>
			 <button class="btn waves-effect waves-light" type="button" id="submitcmcq" name="submit">Submit</button>
		</center>

</form>


	
<script src="static/mui.min.js"></script>
		<script>
			mui.init({
				swipeBack:true //启用右滑关闭功能
			});
		</script>
	';?>