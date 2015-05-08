<?php 
session_start();
if (isset($_SESSION['voted'])) {
    header("Location:results.php");
	exit();
}

?>

<!DOCTYPE HTML> 
<html>
<head>
  <link rel="stylesheet" href="surveyCSS.css">
</head>
<body> 

<form method="post" action="results.php" >
   <fieldset>
   <legend>Which superpower would you rather have?</legend>
   <input type="radio" name="superpower" value="Flight">Flight<br />
   <input type="radio" name="superpower" value="Invisibility">Invisibility<br />
   <input type="radio" name="superpower" value="Super Strength">Super Strength<br />
   <input type="radio" name="superpower" value="Super Speed">Super Speed<br />
   <input type="radio" name="superpower" value="Mind Control">Mind Control<br /> <br />
   </fieldset>
   
   <fieldset>
   <legend>What is your favorite color?</legend>
   <input type="radio" name="favcolor" value="Red">Red<br />
   <input type="radio" name="favcolor" value="Orange">Orange<br />
   <input type="radio" name="favcolor" value="Yellow">Yellow<br />
   <input type="radio" name="favcolor" value="Green">Green<br />
   <input type="radio" name="favcolor" value="Blue">Blue<br />
   <input type="radio" name="favcolor" value="Purple">Purple<br />
   <input type="radio" name="favcolor" value="Black">Black<br />
   <input type="radio" name="favcolor" value="White">White<br /> <br />
   </fieldset>
   
   <fieldset>
   <legend>Are you a Taylor Swift fan?</legend>
   <input type="radio" name="swift" value="Yes">Yes<br />
   <input type="radio" name="swift" value="No">No<br /> <br />
   </fieldset>
   
   <fieldset>
   <legend>What is your favorite sport?</legend>
   <input type="radio" name="sport" value="Basketball">Basketball<br />
   <input type="radio" name="sport" value="Baseball">Baseball<br />
   <input type="radio" name="sport" value="Football">Football<br />
   <input type="radio" name="sport" value="Soccer">Soccer<br /> <br />
   </fieldset>
   
   <input type="submit" value="Vote"> 
</form> 

<div id="center">
	<br /><a href="results.php">See Results</a>
</div>
</body>
</html>