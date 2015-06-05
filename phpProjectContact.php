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
/*
	$from = $_POST['from'];
	$message = $_POST['message'];
	$to = 'jeffabagelen@hotmail.com';
	$WAGLOBAL_Email_Server = "" ;
	
	*/
	
	
	ini_set('sendmail_from', 'mistajeffles@gmail.com');
	ini_set("SMTP","smtp.example.com" ); 

	
	$Name = "Da Duder"; //senders name 
	$email = "jeffabagelen@hotamil.com"; //senders e-mail adress 
	$recipient = "mistajeffles@gmail.com"; //recipient 
	$mail_body = "Hello Email World!"; //mail body 
	$subject = "Test Email"; //subject 
	$header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields 

	mail($recipient, $subject, $mail_body, $header); //mail command :) 
	/*
	echo $message . "<br/>";
	// the message
	$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
	$msg = wordwrap($msg,70);

// send email*/

/*	$subject = 'the subject';
	$headers = 'From: webmaster@example.com' . "\r\n" .
       'Reply-To: webmaster@example.com';

	mail($to, $subject, $message, $headers);
	*/

	//mail($to,"My subject",$message);
	
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