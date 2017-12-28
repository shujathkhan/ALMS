<?php
echo '
  
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
   <tbody>';
   $query = sprintf("SELECT questions,options,answers,questionrefid FROM $table where quiztype='$qtype'");
                $result = mysqli_query($conn,$query);
				while($row=mysqli_fetch_array($result)){
   echo'
    <tr>
      <td class="mui-col-xs-6 mui-col-md-6">
		Rearrange the codes accordingly to compile the following code:

<pre class="prettyprint" style="text-align:left;">';
				$questionrefid = $row[3];
				$query1 = sprintf("SELECT code FROM $table where questionrefid='$questionrefid'");
                $result1 = mysqli_query($conn,$query1);
				$count='0';
				$qcount='0';
				$rows=mysqli_fetch_array($result1);
				$code=str_replace("<","&lt;",$rows[0]);
				echo $code;
				
	
	echo'</pre>	  
 </td>
 
  <form class="mui-form">
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
</div>';
echo $select;
$qcount++;

				}
				}
echo'
<button  type = "button" id = "driver"  class="mui-btn mui-btn--raised mui-btn--accent">Submit</button>

	</div>
	

</td>
</form>
</tr>
    
  </tbody>
</table>
			
		</div>
    </div>
';
?>