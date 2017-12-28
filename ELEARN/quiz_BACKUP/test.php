<html>
<head>
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
  xmlhttp.open("GET","display.php?q="+str,true);
  
  xmlhttp.send();
}

</script>

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script type='text/javascript'>
$(window).load(function(){
$("#delete").live('click', function(event) {
    alert('you clicked me!');
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
 <button type="button" class="mui-btn mui-btn--raised mui-btn--accent" name="delete" id="delete" ><b>Delete</b></button>

  
	<select  name="qtype" id="qtype" onchange="showUser(this.value)">
							 <option value="mcq">Multiple Choice Questions</option>
							  <option value="fib">Fill in the Blanks</option>
							  <option value="tf">True or False</option>
							  <option value="rear">Code Rearrange</option>
							  <option value="cmcq">Code based MCQ</option>
							  <option value="short">Short Questions</option>
							  <option value="long">Long Questions</option>
							</select>
							
							<label>Select Type of Quiz</label>
	<div id="txtHint">
	
	</div>
				</div>
				
	</body>
	</html>