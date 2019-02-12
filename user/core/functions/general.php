<?php
function redirect() {
	if (logged_in() === false) {
		header('Location: http://bitsandbytez.co.uk/');
		exit();
	}
}

function mod_protect() {
	global $user_data;
	if (is_mod($user_data['UserID']) === false) {
		header('Location: http://bitsandbytez.co.uk/');
		exit();
	}
}

function banned_redirect() {
	global $user_data;
	if (logged_in() === true && is_banned($user_data['UserID']) === true) {
		header('Location: http://bitsandbytez.co.uk/banned.php');
		exit();
	}
}

function logged_in_redirect() {
	global $user_data;
	if (logged_in() === true && is_banned($user_data['UserID']) === false) {
		header('Location: http://bitsandbytez.co.uk/');
		exit();
	}
}

function protect_page() {
	if (logged_in() === false) {
		header('Location: http://bitsandbytez.co.uk/protected.php');
		exit();
	}
}

function admin_protect() {
	global $user_data;
	if (is_admin($user_data['UserID']) === false) {
		header('Location: http://bitsandbytez.co.uk/');
		exit();
	}
}

function sanitize($data) {
	return mysql_real_escape_string($data);
}

function output_errors($errors) {
	$output = array();
	foreach($errors as $error) {
		echo $error;
	}
	
}
?>