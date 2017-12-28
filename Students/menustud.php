<?php

echo '	<nav class="orange darken-1">
    <ul id="slide-out" class="side-nav">
      <li><a href="index.php">Dashboard</a></li>

      <li><a href="MyCourse.php">My Courses</a></li>
      
		  <li><a href="Report.php">Report</a></li>
		  <li><a href="Notification.php">Notification</a></li>

        </ul>
      </li>
    </ul>
    <ul class="left hide-on-med-and-down">
     <li><a href="index.php">Dashboard</a></li>

      <li><a href="MyCourse.php">My Courses</a></li>
      
		 <li><a href="Report.php">Report</a></li>
		  <li><a href="Notification.php">Notification</a></li>

    </ul>
	 <ul class="right hide-on-med-and-down">
	 <li><a href="profile.php">'.$_SESSION['username'].'</a></li>
      <li><a href="logout.php">Sign-out</a></li>
	 </ul>
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
          
	</nav>';
	?>