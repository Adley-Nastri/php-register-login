<?php

function change_profile_image($user_id, $file_temp, $file_extn) {
	$file_path = 'http://bitsandbytez.co.uk/uploads/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
	move_uploaded_file($file_temp, $file_path);
	mysql_query("UPDATE `users` SET `Picture` = '" . mysql_real_escape_string($file_path) . "' WHERE `UserID` = " . (int)$user_id);
}


function is_mod($user_id) {
	$user_id =(int)$user_id;
	return (mysql_result(mysql_query("SELECT COUNT(`UserID`) FROM `users` WHERE `UserID` = $user_id AND `type` = 2"), 0) == 1) ? true : false;
}

function is_banned($user_id) {
	$user_id =(int)$user_id;
	return (mysql_result(mysql_query("SELECT COUNT(`UserID`) FROM `users` WHERE `UserID` = $user_id AND `banned_id` = 1"), 0) == 1) ? true : false;
}

function is_admin($user_id) {
	$user_id =(int)$user_id;
	return (mysql_result(mysql_query("SELECT COUNT(`UserID`) FROM `users` WHERE `UserID` = $user_id AND `type` = 1"), 0) == 1) ? true : false;
}

function change_password($user_id, $password) {
	$user_id = (int)$user_id;
	$password = $password;
	
	mysql_query("UPDATE `users` SET `pass` = '$password' WHERE `UserID` = $user_id");
}

function change_gender($user_id, $gender) {
	$user_id = (int)$user_id;
	$gender = $gender;
	
	mysql_query("UPDATE `users` SET `Gender` = '$gender' WHERE `UserID` = $user_id");
}


function change_email($user_id, $email) {
	$user_id = (int)$user_id;
	$email = $email;
	
	mysql_query("UPDATE `users` SET `email` = '$email' WHERE `UserID` = $user_id");
}

function change_bio($user_id, $bio) {
	$user_id = (int)$user_id;
	$bio = $bio;
	
	mysql_query("UPDATE `users` SET `UserBio` = '$bio' WHERE `UserID` = $user_id");
}

function user_count() {
	return mysql_result(mysql_query("SELECT COUNT(`UserID`) FROM `users`"), 0);
}

function user_data($user_id) {
	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if ($func_num_args > 1){
		unset($func_get_args[0]);
		
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `UserID` = $user_id"));
		
		return $data;
	}
}

function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`UserID`) FROM `users` WHERE `Username` = '$username'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function user_id_from_username($username) {
	$username = sanitize($username);
	return mysql_result(mysql_query("SELECT `UserID` FROM `users` WHERE `Username` = '$username'"), 0, 'UserID');
}

function login($username, $password) {
	$user_id = user_id_from_username($username);
	
	$username = sanitize($username);
	$password = $password;
	
	return (mysql_result(mysql_query("SELECT COUNT(`UserID`) FROM `users` WHERE `Username` = '$username' AND `pass` = '$password'"), 0) == 1) ? $user_id : false;
}
?>