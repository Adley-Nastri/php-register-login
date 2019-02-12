<?php
include($_SERVER['DOCUMENT_ROOT'].'/core/init.php');
?>

<?php
if(!empty($_POST["username"])) {
  $result = mysql_query("SELECT count(*) FROM `users` WHERE `Username`='" . $_POST["username"] . "'");
  $row = mysql_fetch_row($result);
  $user_count = $row[0];
  if($user_count>0) {
      echo "<span class='user-not-available'> Username Not Available.</span>";
  }else{
      echo "<span class='user-available'> Username Available.</span>";
  }
  
  if (preg_match("/[^a-zA-Z0-9]+/", $_POST['username']) == true) {
    echo "<span class='user-not-available'> Username must not contain special characters.</span>";
  }
}




if(!empty($_POST["email"])) {
  $result = mysql_query("SELECT count(*) FROM `users` WHERE `email`='" . $_POST["email"] . "'");
  $row = mysql_fetch_row($result);
  $email_count = $row[0];
  if($email_count>0) {
      echo "<span class='email-not-available'> Email has already been registered.</span>";
  }else{
      echo "<span class='email-available'> Email Available.</span>";
  }
  
  if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === true) {
     echo "<span class='email-not-available'> Email is invalid.</span>";
  }
}

if($_POST['pass1'] != $_POST['pass2']) 
{
    echo "<span class='pass2-availability-status'> Passwords do not match</span>";
}
 

?>