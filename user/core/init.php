<?php
session_start();
error_reporting(0);

include('database/connect_db.php');
include('functions/general.php');
include('functions/users.php');

if (logged_in() === true) {
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'UserID', 'Username', 'pass', 'FirstName', 'LastName', 'email', 'type', 'banned_id', 'Gender', 'UserBio', 'Picture', 'CEO', 'Founder');
}

$errors = array();

?>