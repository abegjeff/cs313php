<!DOCTYPE html>
<html lang="en">
<head>
  <title>Clark Center Fires Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="adminCSS.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Clark Center Fires</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="phpProjectHome.php">Home</a></li>
            <li><a href="phpProjectInventory.php">View Inventory</a></li>
            <li><a href="phpProjectContact.php">Contact Us</a></li>
          </ul>
        </li>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="phpProjectLogin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<form action="phpProjectAdmin.php" method="POST">
 <fieldset>
   <legend>UserName:</legend>
	 <input  type="text" name="username"><br />
   <legend>Password:</legend>
	<input  type="text" name="password"><br /><br />
 </fieldset>
 <button type="submit" value="Submit" name="login">Submit</button>
 </form>
 
</body>
</html>