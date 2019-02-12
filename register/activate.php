<?php
include($_SERVER['DOCUMENT_ROOT'].'/core/init.php');
logged_in_redirect();
include($_SERVER['DOCUMENT_ROOT'].'/includes/overall/header.php');
?>
<section class="container content" id="main-content"><center><img src="http://bitsandbytez.co.uk/Logo.bmp"></center>
<?php
if (isset($_GET['success']) === true && empty($_GET['email']) === true){
?>
<center>
<h2>Account Active</h2>
<p>You are now free to login to your account</p>
</center>
<?php


}else if (isset($_GET['email'] , $_GET['confirm_code']) === true) {
    
    $email      = trim($_GET['email']);
    $confirm_code       = trim($_GET['confirm_code']);
    
    if (email_exists($email) === false) {
    
    $errors[] = '<p>Email not found</p>';

    } 
    else if (activate($email, $confirm_code) ===false){
    
    	$errors[] = '<p>We had problems activating your account</p>';

    }
    
    if (empty($errors) === false) {
    
    ?> 
    <center>
    <h2>Oops...</h2>
    
    <?php
    
    echo output_errors($errors);
    echo "</center>";

    } else {
        
    	header('Location: activate.php?success');
    }
    
    }else{
    
    header('Location: index.php');
    exit();
}


include($_SERVER['DOCUMENT_ROOT'].'/includes/overall/footer.php');
?>