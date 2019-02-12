<aside>
	<?php
	if (logged_in() === true) {
		include('http://bitsandbytez.co.uk/includes/widgets/loggedin.php');
	} else {
		include('http://bitsandbytez.co.uk/includes/widgets/login.php');
	}
	?>
</aside>