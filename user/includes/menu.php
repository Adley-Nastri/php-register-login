<div id='cssmenu'>
<link rel="stylesheet" type="text/css" href="css/screen.css">

	<?php
	if (logged_in() === true) {
		include('includes/widgets/loggedin.php');
	} else {
		include('includes/widgets/login.php');
	}
	?>
</div>