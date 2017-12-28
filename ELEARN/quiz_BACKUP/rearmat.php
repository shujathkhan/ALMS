<?php
echo '	


			<table>
  <thead>
    <tr>
      <th>Question</th>
      <th>Answer</th>
    </tr>
  </thead>
   <tbody>
    <tr>
      <td>
		Rearrange the codes accordingly to compile the following code:

<pre class="prettyprint" style="text-align:left;">
<!-- language: lang-c -->
		';
				$query = sprintf("SELECT questions,options,answers FROM $table where quiztype='$qtype'");
                $result = mysqli_query($conn,$query);
				$query1 = sprintf("SELECT code FROM quiz_table_it1001 where quiztype='rear'");
                $result1 = mysqli_query($conn,$query1);
				$count='0';
				$qcount='0';
				$rows=mysqli_fetch_array($result1);
				$code=str_replace("<","&lt;",$rows[0]);
				echo $code;
				$row=mysqli_fetch_array($result);
	echo '
	  </pre>	  
 </td>
 
  <form>
  <td> 
  <div id="origin" class="fbox">';
 for($i=0;$i<4;$i++){
					++$count;
				$op=explode('~`',$row[1]);
				$op=str_replace("<","&lt;",$op);
	  $select='<script type = "text/javascript" language = "javascript">
         $(document).ready(function() {
            $("#driver'.$i.'").click(function(event){
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
	  <div class="container ">';
	  $select.='
  <div class="card">
    <label>
      <div>
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
				echo'	<center>
			 <button class="btn waves-effect waves-light" type="button" id="driver" name="submit">Submit</button>
		</center>

	</div>
	

</td>
</form>
    </tr>
  </tbody>
</table>
					<table>
  <thead>
    <tr>
      <th>Question</th>
      <th>Answer</th>
    </tr>
  </thead>
   <tbody>
    <tr>
      <td>
		Rearrange the codes accordingly to compile the following code:

<pre class="prettyprint" style="text-align:left;">
<!-- language: lang-c -->
	';
				$query = sprintf("SELECT questions,options,answers FROM $table where quiztype='$qtype'");
                $result = mysqli_query($conn,$query);
				$query1 = sprintf("SELECT code FROM quiz_table_it1001 where quiztype='rear'");
                $result1 = mysqli_query($conn,$query1);
				$count='0';
				$qcount='0';
				$rows=mysqli_fetch_array($result1);
				$code=str_replace("<","&lt;",$rows[0]);
				echo $code;
				$row=mysqli_fetch_array($result);
	echo '
	  </pre>	  
 </td>
 
  <form>
  <td > 
  <div id="origin" class="fbox">';
 for($i=0;$i<4;$i++){
					++$count;
				$op=explode('~`',$row[1]);
				$op=str_replace("<","&lt;",$op);
	  $select='
	  <div class="container ">';
	  $select.='
  <div class="card">
    <label>
      <div class="mui--text-dark-secondary mui--text-caption">
    <pre class="prettyprint map-test" id="'.$count.'"name="op[]" style="text-align:left;">
	'.$op[$qcount].'
	
	</pre>
</div>
</label>
</div>
</div>';
echo $select;
$qcount++;

echo			'	}
	<center>
			 <button class="btn waves-effect waves-light" type="button" id="driver" name="submit">Submit</button>
		</center>
	</div>
	

</td>
</form>
    </tr>
  </tbody>
</table>'; ?>