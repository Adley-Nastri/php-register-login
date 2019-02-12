<div id='cssmenu'>
<link rel="stylesheet" type="text/css" href="http://bitsandbytez.co.uk/screen.css">

	<?php
	if (logged_in() === true) {
		include($_SERVER['DOCUMENT_ROOT'].'/includes/widgets/loggedin.php');
	} else {
		include($_SERVER['DOCUMENT_ROOT'].'/includes/widgets/default.php');
	}
	?>
</div>