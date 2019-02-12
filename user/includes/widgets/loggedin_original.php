<div class="widget">
	<center><h3>Logged in as: <?php echo $user_data['Username']; ?></h3></center>
	<div class="inner">
		<ul>
			<?php
				if (is_admin($session_user_id) === true){
					echo '<br>
							<center><h2></h2></center>
								<li>
									<center><a href="admin.php">Admin Control Panel</a></center>
								</li>
								';
				}
				?>
			<li><center><a href="change_password.php">Change Password</a></center>
			</li>
			<li><center><a href="aboutme.php">About You</a></center>
			</li>
			<li><center><a href="logout.php">Log Out</a></center>
			</li>
		</ul>
	</div>
</div>