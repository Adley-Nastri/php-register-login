<?php
session_start();
error_reporting(0);

require('database/connect_db.php');
require('functions/general.php');
require('functions/users.php');

if (logged_in() === true) {
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'UserID', 'Username', 'pass', 'FirstName', 'LastName', 'email', 'type', 'banned_id', 'Gender', 'UserBio', 'Picture', 'CEO', 'DateTime', 'Date', 'ConfirmID', 'Founder');
}

$errors = array();
?>