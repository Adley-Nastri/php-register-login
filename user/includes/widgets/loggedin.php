<ul>
   <li><a href='http://bitsandbytez.co.uk/'><span>Home</span></a></li>
   <li><a href='http://bitsandbytez.co.uk/about.php'><span>About</span></a></li>
   <li><a href='http://bitsandbytez.co.uk/users.php'><span>Users</span></a></li>
   <li><a href='http://bitsandbytez.co.uk/comment.php'><span>Comment</span></a></li>
    <li><a href='http://bitsandbytez.co.uk/learn'><span>Learn</span></a></li>
   <li class='active has-sub'><a href='#'><span>Logged in as <?php echo $user_data['Username']; ?></span></a>
      <ul>
       <li class='active has-sub'><a href='#'><span>Profile</span></a>
      <ul>
         <li class='has-sub'><a href="http://bitsandbytez.co.uk/aboutme.php"><span>Edit Profile

</span></a>

         </li>
         <li class='has-sub'><a href="http://bitsandbytez.co.uk/change_password.php"><span>Change Password

</span></a>

         </li>
         
 
       </ul>
       <li class='has-sub'><a href="http://bitsandbytez.co.uk/logout.php"><span>Logout

</span></a>
         </li>
       </ul>

	<?php
				if (is_admin($session_user_id) === true){
					echo "<li class='active has-sub'><a href='#'><span>Admin</span></a>
      <ul>
         <li class='has-sub'><a href='http://bitsandbytez.co.uk/admin.php'><span>Admin Control Panel

</span></a>
         </li>
								'";
				}
				?>
					<?php
				if (is_mod($session_user_id) === true){
					echo "<li class='active has-sub'><a href='#'><span>Moderator</span></a>
      <ul>
         <li class='has-sub'><a href='http://bitsandbytez.co.uk/mod.php'><span>Moderator Control Panel

</span></a>
         </li>
								'";
				}
				?>

</ul>