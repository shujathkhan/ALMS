<?php

echo '	<nav class="orange darken-1">
    <ul id="slide-out" class="side-nav">
      <li><a href="index.php">Dashboard</a></li>
      <li><a href="AddUser.php">User Creation</a></li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Courses<i class="material-icons">arrow_drop_down</i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="courseupload.php">Content Upload</a></li>
                <li><a href="MyCourse.php">My Courses</a></li>
              </ul>
            </div>
          </li>
		  <li><a href="Report.php">Report</a></li>
		  <li><a href="Notification.php">Notification</a></li>
		  <li><a href="ChangePwd.php">Change Password</a></li>
        </ul>
      </li>
    </ul>
    <ul class="left hide-on-med-and-down">
     <li><a href="index.php">Dashboard</a></li>
      <li><a href="AddUser.php">User Creation</a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Courses<i class="material-icons">arrow_drop_down</i></a>
      <ul id="dropdown1" class="dropdown-content">
               <li><a href="courseupload.php">Content Upload</a></li>
                <li><a href="MyCourse.php">My Courses</a></li>
      </ul>
	  </li>
		 <li><a href="Report.php">Report</a></li>
		  <li><a href="Notification.php">Notification</a></li>
		  <li><a href="ChangePwd.php">Change Password</a></li>
    </ul>
	 <ul class="right hide-on-med-and-down">
	 <li><a href="profile.php">'.$_SESSION['username'].'</a></li>
     <li><a href="logout.php">Sign-out</a></li></a>
	 </ul>
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
          
	</nav>';
	?>