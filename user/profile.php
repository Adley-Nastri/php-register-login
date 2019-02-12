<?php 
include($_SERVER['DOCUMENT_ROOT'].'/core/init.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/overall/header.php');
?>
<link rel="icon" href="www.bitsandbytez.co.uk/button.png" type="image/x-icon" />
<![endif]>
<!-- This is needed for IE -->
<link rel="shortcut icon" href="www.bitsandbytez.co.uk/button.png" type="image/ico" />
<section class="container content" id="main-content">
<center><img src="http://bitsandbytez.co.uk/Logo.bmp"></center>
<br>
<br>
<?php $us = $_GET['username']; ?>
<?php
function admin_tick(){
	
	global $user_data;
	global $profile_data;

	if ($profile_data['type'] == 1) {
	
		echo '<img height="20" width="20" src="http://bitsandbytez.co.uk/tick.png">';
	
	}
}

?>
<?php
function founder_tick(){
	
	global $user_data;
	global $profile_data;

	if ($profile_data['Founder'] == 1) {
	
		echo '<img height="20" width="20" src="http://bitsandbytez.co.uk/RedTick.png">';
	
	}
}

?>
<?php
function display_ban(){
	
	global $user_data;
	global $profile_data;

	if ($profile_data['banned_id'] == 1) {
	
		echo '<p><b><i>(Banned)</b></i></p>';
	
	}
}

?>

<?php
if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
    $username = $_GET['username'];
    
    if (user_exists($username) === true) {
    	$user_id = user_id_from_username($username);
    
    	$profile_data = user_data($user_id, 'Username', 'FirstName', 'LastName', 'Email', 'UserBio', 'Gender', 'CEO', 'Datetime', 'Date', 'type', 'Picture', 'Founder', 'banned_id'); 
    	
    	?>
       
    	<center><h1> <?php echo $profile_data['FirstName']; ?> <?php echo $profile_data['LastName']; ?> <?php admin_tick(); ?><?php founder_tick(); ?></h1><?php display_ban(); ?></center>
    	<div id="UserProfile" align="center">
    	<div class="polaroid"> 	
    	<?php if ($profile_data['banned_id'] == 0) {
    		echo '<img src="http://bitsandbytez.co.uk/'.$profile_data['Picture'].'" height="200" width="200">';
    		}
    		else {
    			echo '<img src="http://bitsandbytez.co.uk/banned.png" height="200" width="200">';
    		
    		}
    	?>
    		   		
    	<p><b><?php echo $profile_data['Username']; ?></b></p></div>
    	<br>
    	
    	<?php if ($profile_data['CEO'] == 1) {
    	
    	echo '<center><p>(Chief Executive Officer)</p></center>';
    	
    	}
    	
    	if ($profile_data['CEO'] == 2) {
    	
    	echo '<center><p>(Head of Programming)</p></center>';
	
    	}
    	
    	if ($profile_data['CEO'] == 3) {
    	
    	echo '<center><p>(Inbetweener)</p></center>';
	
    	}
        

 ?>
    	
    				
    		      		
		
</p>
      		<br>
      		<center><h>-----------</h></center>
      		<br>
    		<p><u>About:</u>
    		<p><b>Member since: </br> <?php echo $profile_data['Date']; ?> </b></p>
    		<br>
    		<p>
    		<?php echo $profile_data['UserBio']; ?>
    		<br>
    		<center><h>-----------</h></center></p>
                <br>
                <br>
                              
                
                

<br>
<br>
    	</div>
    	<br>
    	<br>
    	<br>
    <?php	
    } else {
    	echo "<center><p>Sorry, the user ".$us." does not exist. <a href='http://bitsandbytez.co.uk/register'>Register</a></p></center>";
	
    }
       
} else {
    header('Location: http://bitsandbytez.co.uk/index.php');
    exit();
}
?>

<?php 
include($_SERVER['DOCUMENT_ROOT'].'includes/overall/footer.php');
?>
</section>