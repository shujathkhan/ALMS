<?php
	echo" 

<script>
      $(function () {
        $('#longform').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'muilong_eval.php',
            data: $('#longform').serialize(),
            success: function (data1) {
			console.log('Long Success');
            }
          });

        });
      });
    </script>	";
	echo '	
	<script>
		
		$(document).ready(function(){
			
			$("#submitlong").click(function(){
				if (confirm("Are you sure you want to submit?")) {
								$("#modallong").closeModal();
				$("#long").attr("disabled", true);
			}
			else{
				return false;
			}
			});
			
		});
		</script>
	<form id="longform">
		<table>
					  <thead>
						<tr>
						  <th>Question</th>
						
						  <th>Hint 1</th>
						  <th>Hint 2</th>
						  <th>Answer</th>
						</tr>
					  </thead>
					  <tbody>';
					 $sid = $_SESSION['sid'];
	$id = $_SESSION['id'];
$t="quiz_$id"."_$sid";
	$tab = sprintf("INSERT INTO $t (questionrefid, question, answer)
VALUES ('$qrid','$q','$a')");
                $res= mysqli_query($conn,$tab);

				$count='0';
				while($row=mysqli_fetch_array($result)){
					++$count;
				$op=explode('~`',$row[1]);
	$select='<tr>
						  <td>
				<div class="col s12">
								
								'.$row[0].'
								
							</div>
						  </td>
				
						  			  <td>
				<div class="col s12">
								
								'.$op[0].'
								
							</div>
						  </td>
						  			  <td>
				<div class="col s12">
								
								'.$op[1].'
								
							</div>
						  </td>
						  		<td>
							<div class="input-field col s12">
							   <textarea id="textarea1" class="materialize-textarea" name="ans[]"></textarea>

								<label>Answer</label>
							  </div>
						  </td>
						</tr>';
						echo $select;
			}


					  echo '</tbody>
					</table>
		<center>
			 <button class="btn waves-effect waves-light" type="submit" id="submitlong" name="submit">Submit</button>
		</center>
</form>

';
?>