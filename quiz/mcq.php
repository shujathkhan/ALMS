<?php

	echo '	


<link rel="stylesheet" href="static/mui.min.css">
<script src="http://w3schools.com/lib/w3.js"></script>
    <link href="//cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css" />
    <link href="static/style.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
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
	<div class="mui-container">
			<form class="mui-form" method="POST" action="muimcq_eval.php">
			<table class="mui-table">
  <thead>
    <tr>
	<br><br>
    </tr>
  </thead>
   <tbody>';
$table = 'quiz_table_'.$_SESSION['courseid'];
   $type='mcq';
				$query = sprintf("SELECT questions,options,answers,questionrefid FROM $table where quiztype='$type'");
                $result = mysqli_query($conn,$query);
				$count='0';
				while($row=mysqli_fetch_array($result)){
					++$count;
				$op=explode('~`',$row[1]);
	$select='<tr>
      <td class="mui-col-xs-12 mui-col-md-12">
	  	<div class="mui-card">
				<ul class="mui-table-view">
					<li class="mui-table-view-cell mui-collapse">
						<a class="mui-navigate-right" href="#">Question'.$count.'     ('.$row[3].')';
						
		 $select.='</a>
						<div class="mui-collapse-content">
							<div class="answer1">
		<h3>'.$row[0];
		$select.='</h3>
		    <input type="radio"
             name="op'.$count.'"
             value="'.$op[0].'">'.$op[0].'
      <br>
      <input type="radio"
             name="op'.$count.'"
             value="'.$op[1].'">'.$op[1].'
      <br> 
      <input type="radio"
             name="op'.$count.'"
             value="'.$op[2].'">'.$op[2].'
      <br>
      <input type="radio"
             name="op'.$count.'"
             value="'.$op[3].'">'.$op[3].'
      <br>
   </div>
	</div>
		</li>
  	</ul>
		</div>
		</div>
		
  </div>
						  
						</tr>';
						echo $select;
			}


					  echo '</tbody>
					</table>
					<div class="mui-container mui--text-center">
			<button type="submit" name="submit" class="mui-btn mui-btn--primary mui-btn--raised">Submit</button>
		</div>
</form>
				</div>
			</div>
';
echo'
<script src="static/mui.min.js"></script>
		<script>
			mui.init({
				swipeBack:true 
			});
		</script>
';
?>