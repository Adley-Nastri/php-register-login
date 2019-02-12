<?php 
include($_SERVER['DOCUMENT_ROOT'].'/core/init.php');
protect_page();
include($_SERVER['DOCUMENT_ROOT'].'/includes/overall/header.php');
?>
<section class="container content" id="main-content">
<link rel="icon" href="button.png" type="image/x-icon" />
<![endif]>
<!-- This is needed for IE -->
<link rel="shortcut icon" href="button.png" type="image/ico" />
<center><img src="http://bitsandbytez.co.uk/Logo.bmp"></center>

<div class="container" align="center">
	<div class="content">
		<h1><b>users</b></h1>
		<br>
		<p>There is no functionality on this website, yet you can write a bio. Let<?php echo "'";?>s see what Thomas Erskine-Jones has to say:</p2>
		<br>
		<br>
		<p><b>"I write about interesting things for the site. Like quantum computation and stuff!"</p>
		<br>
		<br>
		<?php
			$q = "SELECT * FROM `users` WHERE `banned_id` = '0'";
			?>
			<?php
			if ($_POST['gender'] == "All") {
			
			$q = "SELECT * FROM `users` WHERE `banned_id` = '0'";
			
			echo '<p>All Users</p>';
			
			}
			
			if ($_POST['gender'] == 'Male') {
			
			$q = "SELECT * FROM `users` WHERE `Gender`= 'Male' AND `banned_id` = '0'";
			
			echo '<p>Male Users</p>';
			
			}
			if ($_POST['gender'] == 'Female') {
			
			$q = "SELECT * FROM `users` WHERE `Gender`= 'Female' AND `banned_id` = '0'";
			
			echo '<p>Female Users</p>';
			
			}
			?>
			<?php
			$query = mysql_query($q) or die(mysql_error());
			?>
		<form action="" method="post">
		<select name="gender">
			  <option value="All" selected="true">All</option>
			  <option value="Male">Male</option>
			  <option value="Female">Female</option>
		</select>
		<input type="submit" value="Filter Users">
		</form>
		<?php if (mysql_num_rows($query)) { ?>
		<?php while ($row = mysql_fetch_assoc($query)) { ?>
		<div font-family="verdana" class="separator"></div>
		<br><center>
		<img src="http://bitsandbytez.co.uk/<?php echo $row['Picture']; ?>" width="75px" height="75px" style="border-radius: 75px; -webkit-border-radius: 75px; -moz-border-radius: 75px; box-shadow: 0 0 8px rgba(0, 0, 0, .8); -webkit-box-shadow: 0 0 8px rgba(0, 0, 0, .8); -moz-box-shadow: 0 0 8px rgba(0, 0, 0, .8);">
		<p><a href="http://bitsandbytez.co.uk/user/<?php echo $row['Username']; ?>"><?php echo $row['Username']; ?></a></p>

		</center>
		<?php } ?>
		<div class="separator"></div>
		<?php } else { ?>
		<h4>Nothing to display!</h2>
		<?php } ?>
	</div>
	</b>
</div>














<?php 
include($_SERVER['DOCUMENT_ROOT'].'/includes/overall/footer.php'); 
?>
</section>