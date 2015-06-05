<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="phpContactCss.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">
         <img src="logo2.png" alt="" width="150" height="55">
	  </a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="phpProjectHome.php">Home</a></li>
            <li><a href="phpProjectInventory.php">View Inventory</a></li>
            <li class="active"><a href="phpProjectContact.php">Contact Us</a></li>
          </ul>
        </li>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="phpProjectLogin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<form action="" method="POST" form="email">
 <fieldset>
   <legend>From:</legend>
	 <input  type="text" name="from"><br /><br/>
   <legend>Message:</legend>
	<textarea rows="4" cols="50" name="message">
	</textarea>
 </fieldset>
 <button type="submit" value="Submit" name="contact">Send Email</button>
 </form>


<?php

if (!empty($_POST['from']) && !empty($_POST['message']))
{
	$from = $_POST['from'];
	$message = $_POST['message'];
	$to = 'mistajeffles@gmail.com';
	ini_set('sendmail_from', 'abe12002@byui.edu');
	$WAGLOBAL_Email_Server = "" ;
	/*
	echo $message . "<br/>";
	// the message
	$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
	$msg = wordwrap($msg,70);

// send email*/
	mail($to,"My subject",$message);
	
	echo $from . "<br/>";
	echo $message;
}
/*
else
{
	echo '<script language="javascript">';
	echo "alert(\"Please fill in all required fields\")";	
	echo '</script>';
	
}
*/

?>



</body>
</html>