<?php 
include($_SERVER['DOCUMENT_ROOT'].'/core/init.php');
admin_protect();
include($_SERVER['DOCUMENT_ROOT'].'/includes/overall/header.php'); 
?>
<section class="container content" id="main-content">
<center><img src="../Logo.bmp"></center>
<br>
<center><h1>Welcome to the Admin Control Panel.</h1>
<br>
<div id="clock">
<p>
<span id="digitalclock" class="styling"></span>
</p>
</div>
</body>
<br>
<!-- hitwebcounter Code START -->
<a href="http://www.hitwebcounter.com" target="_blank">
<img src="http://hitwebcounter.com/counter/counter.php?page=6142269&style=0024&nbdigits=5&type=ip&initCount=0" title="" Alt=""   border="0" >
</a>                                        <br/>
                                        <!-- hitwebcounter.com --><a href="http://www.hitwebcounter.com" title="Stats Of Hits" 
                                        target="_blank" style="font-family: Geneva, Arial, Helvetica, sans-serif; 
                                        font-size: 10px; color: #848387; text-decoration: underline ;"><strong></strong>
                                        </a>   
                            
<br>
<br>
<p>
<span id="digitalclock" class="styling"></span>
</p>
<h1>Noticeboard</h1>
<p>Hey, admins. Currently there are only two, but we are hoping to expand. 
</b>
<br>
<br>
<p>I will personally feed a nine foot pole up through your anal cavity and into your rectum. Thanks, the CEO.</p>
<br>
<br>

<br>
<br>
<center><h2>All Users</h2></center>

<?php 
$query = mysql_query("SELECT * FROM `users`") or die(mysql_error());

if (isset($_GET['delete_id'])) {
	
	$id = mysql_real_escape_string($_GET['delete_id']);
	$delete = "DELETE FROM `users` WHERE `UserID` = {$id}";
	
	mysql_query($delete) or die(mysql_error());
	
	header('Location: http://www.bitsandbytez.co.uk/admin');
	exit();
}
if (isset($_GET['ban_id'])) {
	
	$id = mysql_real_escape_string($_GET['ban_id']);
	$ban = "UPDATE `users` SET `banned_id` = 1 WHERE `UserID` = {$id}";
	
	mysql_query($ban) or die(mysql_error());
	
	header('Location: http://www.bitsandbytez.co.uk/admin');
	exit();
}
if (isset($_GET['unban_id'])) {
	
	$id = mysql_real_escape_string($_GET['unban_id']);
	$ban = "UPDATE `users` SET `banned_id` = 0 WHERE `UserID` = {$id}";
	
	mysql_query($ban) or die(mysql_error());
	
	header('Location: http://www.bitsandbytez.co.uk/admin');
	exit();
}
?>



<div class="CSSTableGenerator" >
		
                <table >
                
                    <tr>
                        <td>
                            Username
                        </td>
                        <td >
                            Email
                        </td>
                        <td>
                            Action
                        </td>
                    </tr>
                    <tr>
                    <?php if (mysql_num_rows($query)) { ?>
		    <?php while ($row = mysql_fetch_assoc($query)) { ?>
                        <td >
                           <?php echo $row['Username']; ?> 
                        </td>
                        <td>
                           <?php echo $row['email']; ?>    
                        </td>
                        <td>
                           <a href="?delete_id=<?php echo $row['UserID']; ?>" OnClick="return confirm('You are about to delete the user <?php echo $row['Username']; ?>. Click OK to continue or Cancel to abort.');">Delete</a> <a href="?ban_id=<?php echo $row['UserID']; ?>">Ban</a> <a href="?unban_id=<?php echo $row['UserID']; ?>">Unban</a></p>
                        </td>
                    </tr>
                <?php } ?>
                <?php } ?>
		  
                </table>
                
            </div>
       
<style>

.CSSTableGenerator {
	margin:0px;padding:0px;
	width:65%;
	box-shadow: 10px 10px 5px #888888;
	border:1px solid #000000;
	
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:10%;
	margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}.CSSTableGenerator tr:hover td{
	
}
.CSSTableGenerator tr:nth-child(odd){ background-color:#ffffff; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#d3e9ff; }.CSSTableGenerator td{
	vertical-align:middle;
	
	
	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:3px;
	font-size:14px;
	font-family:Verdana;
	font-weight:normal;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
		background:-o-linear-gradient(bottom, #0057af 5%, #0057af 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #0057af), color-stop(1, #0057af) );
	background:-moz-linear-gradient( center top, #0057af 5%, #0057af 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#0057af", endColorstr="#0057af");	background: -o-linear-gradient(top,#0057af,0057af);

	background-color:#0057af;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:16px;
	font-family:Verdana;
	color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #0057af 5%, #0057af 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #0057af), color-stop(1, #0057af) );
	background:-moz-linear-gradient( center top, #0057af 5%, #0057af 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#0057af", endColorstr="#0057af");	background: -o-linear-gradient(top,#0057af,0057af);

	background-color:#0057af;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
</style>

<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/overall/footer.php'); ?>
<br>
<br>
</section>
</html>