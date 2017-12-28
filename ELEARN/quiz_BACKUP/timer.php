<?php
require_once 'dbconfig.php';
$id='221';//$_SESSION['id'];
$cid='it1001';//$_SESSION['courseid'];
$sid='100U1S1';//$_SESSION['sid'];
$table='student_'.$cid.'_'.$id;
$sql=sprintf("SELECT learningplan from $table where sid = '$sid'");
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($res);
$lp=explode(' ',$row[0]);
$time=$lp[0];
?>
<html>
<body>
<!-- Display the countdown timer in an element -->

<script>
var seconds = <?php echo $time?>*60;
function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;  
    }
    document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        window.location.href = "../Students/report.php";
    } else {
        seconds--;
    }
}
 
var countdownTimer = setInterval('secondPassed()', 1000);
</script>

</script>
</body>
</html>