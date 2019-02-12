<?php
include($_SERVER['DOCUMENT_ROOT'].'/core/init.php');
logged_in_redirect();
require($_SERVER['DOCUMENT_ROOT'].'/includes/overall/header.php');
?>
<link rel="icon" href="button.png" type="image/x-icon" />
<![endif]>
<!-- This is needed for IE -->
<link rel="shortcut icon" href="button.png" type="image/ico" />
<?php
$page_title = 'Register';
 $errors = array();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
 if(empty($_POST['first_name']))
 {$errors[] = "Enter your First Name.<br>";}
 else
 {$fn = mysql_escape_string(trim($_POST['first_name']));}
 if(empty($_POST['last_name']))
 {$errors[] = "Enter your Last Name.<br>";}
 else
 {$ln = mysql_escape_string(trim($_POST['last_name']));}
 if(empty($_POST['username']))
 {$errors[] = "Enter a Username.<br>";}
 else
 {$un = mysql_escape_string(trim($_POST['username']));}
 $e = mysql_escape_string(trim($_POST['email']));
 if(!empty($_POST['pass1']))
 {
 if($_POST['pass1'] != $_POST['pass2'])
 {$errors[] = 'Passwords do not match.' ;}
 else
 {$p = md5(mysql_escape_string(trim($_POST['pass1'])));}
 }
 else{$errors[] = 'Enter your Password.<br>' ;}
 if(empty($_POST['gender']))
 {$errors[] = "Enter a Gender <br>";}
 else
 {$g = mysql_escape_string(trim($_POST['gender']));
  $pic = "default.png";
 }
 if(empty($errors))
 {
  $q ="SELECT `UserID` FROM `u524817853_db`.`users` WHERE `email`='$e'";
  $result = mysql_query ($q) or die(mysql_error());
  if (mysql_num_rows($result) > 0)
  {$errors[] = 'Email address \''. $_POST['email'] . '\' has already been registered.<br>';}
 }
 {
  $q ="SELECT `UserID` FROM `u524817853_db`.`users` WHERE `Username`='$un'";
  $result = mysql_query ($q) or die(mysql_error());
  if (mysql_num_rows($result) > 0)
  {$errors[] = 'The username \''. $_POST['username'] . '\' has already been registered.<br>';}
 }
 {
  if (preg_match("/[^a-zA-Z_\-0-9]/", $_POST['username']) == true) {
	  $errors[] = 'Username must not contain special characters.<br>';
  }
  if (strlen($_POST['username']) < 3 ) {
      $errors[] = 'Username must have a minumum of 3 characters.<br>';
  
  }
  elseif (strlen($_POST['username']) > 15 ) {
      $errors[] = 'Username must have a maximum of 15 characters.<br>';
  
  }
 }
 {
  if (preg_match("/[^a-zA-Z\-]+/", $_POST['first_name']) == true) {
	  $errors[] = 'First Name must contain letters and/or no spaces.<br>';
  }
 }
 {
  if (preg_match("/[^a-zA-Z_\-]+/", $_POST['last_name']) == true) {
	  $errors[] = 'Last Name must contain letters and/or no spaces.<br>';
  }
 }
 {
  if (!filter_var($e, FILTER_VALIDATE_EMAIL) === true) {
     $errors[] = 'The email you have entered is a invalid email address.<br>';
  }
 }
 if(empty($errors))
 {
 
  $current_date = gmdate("Y-m-d H:i:s");
    
  $xplod = explode(' ', $current_date);
  $string = "$xplod[0] $xplod[1]";
  
  $new_date = date("Y-m-d H:i:s", strtotime($string));
  
  $full_date = date("l d F Y", strtotime($string));
  
  $confirm_code = md5(rand(0,1000));
  

  $q = "INSERT INTO `u524817853_db`.`users`(`FirstName`, `LastName`, `Username`, `email`, `pass`, `DateTime`, `Date`, `Gender`, `Picture`, `ConfirmCode`) VALUES('$fn','$ln','$un','$e','$p','$new_date','$full_date','$g','$pic','$confirm_code')" or die(mysql_error());
  $result = mysql_query ($q) or die(mysql_error());
  if($result)
  {
   echo '<section class="container content" id="main-content"><center><img src="http://bitsandbytez.co.uk/Logo.bmp"></center><center><h1>Registered!</h1> <p>You are now registered.</p>';
   $message= "Thank you for your registration $un. \nYou may activate your account from the link below . \n http://bitsandbytez.co.uk/register/activate.php?email=$e&confirm_code=$confirm_code";
   mail($e,"User Registration Confirmation",$message,"From: DoNotReply@bitsandbytez.co.uk");
   include($_SERVER['DOCUMENT_ROOT'].'/includes/overall/footer.php');
  }
  mysql_close($dbc);
  exit();
 }
 else
 {
 echo '<section class="container content" id="main-content"><center><img src="http://bitsandbytez.co.uk/Logo.png"></center>';
 echo '<div align="center"><h1>Error</h1> <p id="err_msg">The following error(s) occurred: <br><br>';
 foreach($errors as $msg)
 {
  echo "- $msg<br>";
 }
 echo 'Please <a href="javascript:history.back()">try again</a>.</p></div>';
 include($_SERVER['DOCUMENT_ROOT'].'/includes/overall/footer.php');
 mysql_close($dbc);
 exit();
 }
 
}

?>

<section class="container content" id="main-content">
<center><img src="http://bitsandbytez.co.uk/Logo.bmp"></center>
<center>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_register.php",
	data:'username='+$("#username").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>
<script>
function checkAvailabilityEmail() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_register.php",
	data:'email='+$("#email").val(),
	type: "POST",
	success:function(data){
		$("#email-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>

<script>
function checkAvailabilityFN() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_register.php",
	data:'first_name='+$("#first_name").val(),
	type: "POST",
	success:function(data){
		$("#fn-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>
<script>
function checkAvailabilityLN() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_register.php",
	data:'last_name='+$("#last_name").val(),
	type: "POST",
	success:function(data){
		$("#ln-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>



<h1><b>register</b></h1>
</center>
<form action="" method="POST" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
<center><ul>
		<li>
		    <p>
			First Name:<br><br>
			<input type="text" name="first_name" id="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name'];?>" class="demoInputBox" onBlur="checkAvailabilityFN()"><span id="fn-availability-status"></span> 
		    </p>
		</li>
		<li>
		    <p>
			Last Name:<br><br>
			<input type="text" name="last_name" id="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name'];?>" class="demoInputBox" onBlur="checkAvailabilityLN()"><span id="ln-availability-status"></span> 
		    </p>
		</li>
		<li>
		    <p>
			Username:<br><br>
			<input type="text" name="username" id="username" maxlength="15" pattern=".{3,}" required title="Username must have a minimum of 3 characters" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>" class="demoInputBox" onBlur="checkAvailability()"><span id="user-availability-status"></span>
		    </p>
		</li>
		<li>
		    <p>
			Email Address:<br><br>
			<input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" class="demoInputBox" onBlur="checkAvailabilityEmail()"><span id="email-availability-status"></span> 
		   </p>
		</li>
		<li>
		    <p>
			Password:<br><br>
			<input type="password" name="pass1" value="<?php if(isset($_POST['pass1'])) echo $_POST['pass1'];?>">
		    </p>
		</li>
		<li>
		    <p>
			Confirm Password:<br><br>
			<input type="password" name="pass2" value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2'];?>">
	    	    </p>
		</li>
		<li>
		    <p>
			What is your Gender?
		    </p>
			<select name="gender" value="<?php if(isset($_POST['gender'])) echo $_POST['gender'];?>">>
			  <option value="">Select...</option>
			  <option value="Male">Male</option>
			  <option value="Female">Female</option>
			  <option value="Neutral">Prefer not to say</option>
			</select>
		</li>
	</ul>
</center>
<center><p style="font-size:11px"><input type="checkbox" name="checkbox" value="check" id="agree" /> I have read and agree to the <a href="terms.php">Terms and Conditions</a> and <a href="policy.php">Privacy Policy</a></p><br><br>
<input type="submit" value="Register"></center>
</form>
<br>

<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/overall/footer.php');
?>
</section>


 	