<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script>
  	function pageReset() {
    var allForms = document.forms;
	for (var i=0; i < allForms.length; i++) {
		allForms[i].reset();
	}
	window.location.href = "phpProjectAdmin.php";
}
  </script>
</head>
<body>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Clark Center Fires</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="phpProjectHome.php">Home</a></li>
            <li><a href="phpProjectInventory.php">View Inventory</a></li>
            <li><a href="phpProjectContact.php">Contact Us</a></li>
          </ul>
        </li>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="phpProjectLogin.php"><span class="glyphicon glyphicon-log-in"></span> Stuff</a></li>
      </ul>
    </div>
  </div>
</nav>


<?php	

$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

if ($openShiftVar === null || $openShiftVar == "")
{
	 try
		{
			$user = "admin";
			$password = "1111"; 
			$host = "127.0.0.1";
			$name = "php_project";
			$db = new PDO("mysql:host=$host;dbname=$name", $user, $password);
		}
	catch (PDOException $ex) 
		{
			echo "Error!:" . $ex->getMessage();
			die(); 
		}
}
else 
{
	$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
	$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
	$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
	$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
	$dbName= "php";
		try
		{
			$user = "inventory";
			$password = "guns"; 
			$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
		}
		catch (PDOException $ex) 
		{
			echo "Error!:" . $ex->getMessage();
			die(); 
		}
}

?>

<?php
session_start();
if (!empty($_POST['username']) && !empty(['password']))
{
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
//	echo $username . "<br/>";
//echo $password . "<br/>";
	foreach($db->query("SELECT user_name, password FROM user_info;") as $row)
			{
				if ($row["user_name"] == $username && $row["password"] == $password)
				{
					$_SESSION["logged"] = true;
				}
				else
				{
					$_SESSION["logged"] = false;
				}
			}


}
if ($_SESSION["logged"] == false)
{
	header('Location: http://php-abegjeff.rhcloud.com/phpProjectLogin.php');
	
}

?>


<div class="container">
	<h1>Edit Inventory</h1>
	<br/>

	
	
<h4>Add</h4>

<!-- Add Form -->
<form action="phpProjectAdmin.php" method="POST" id="addForm">
<b> Brand: </b>
 <input  type="text" name="addingBrand"> 
<b> Caliber: </b>
 <input  type="text" name="caliberAdd" form="addForm"> 
<br /><br />
<button type="submit" value="Submit" name="add";>Add</button>
</form>



<!-- Gun Create Form -->
<form action="" method="POST" id="createForm">
<br/><br/>
<h4> Create Gun</h4> 
<b> Gun Name: </b>
 <input  type="text" name="gunName"> 
<b> Brand: </b>
<select name="gunBrand" form="createForm">
  <option disabled selected> -- select an option -- </option>
	<?php
		foreach ($db->query("SELECT name FROM manufacturers ORDER BY name") as $row)
		{
			$name = $row['name'];
			echo '<option value="'.$name.'">'.$name.'</option>';
		}
	?>
</select>
<b> Caliber: </b>
<select name="gunCaliber" form="createForm">
  <option disabled selected> -- select an option -- </option>
	<?php
		foreach ($db->query("SELECT caliber FROM calibers ORDER BY caliber") as $row)
		{
			$caliber = $row['caliber'];
			echo '<option value="'.$caliber.'">'.$caliber.'</option>';
		}		
	?>
</select>

<b> Type: </b>
<select name="gunType" form="createForm">
  <option disabled selected> -- select an option -- </option>
  <option value="Handgun">Handgun</option>		
  <option value="Rifle">Rifle</option>
  <option value="Shotgun">Shotgun</option>
</select>
<b> Automatic: </b>
<select name="gunAutomatic" form="createForm">
  <option disabled selected> -- select an option -- </option>
  <option value="Semi-Automatic">Semi-Automatic</option>
  <option value="Automatic">Automatic</option>
  <option value="Revolver">Revolver</option>
  <option value="N/A">N/A</option>
</select>
<br /> <br/>
<b> Price: </b>
<input  type="text" name="gunPrice">
<b> Quantity: </b>
<input  type="text" name="gunQuantity">
<br /><br />
<button type="submit" value="CreateGun" name="createGun">Create Gun</button>
</form>
<br /> <br />



<!-- Remove Form -->
<form action="" method="POST" id="removeForm">
<br/>
<h4>Remove</h4>
<b><u>Brand</u></b>
<select name="brandRemove" form="removeForm">
  <option disabled selected> -- select an option -- </option>
	<?php
		foreach ($db->query("SELECT name FROM manufacturers ORDER BY name") as $row)
		{
			$name = $row['name'];
			echo '<option value="'.$name.'">'.$name.'</option>';
		}
	?>
</select>
<b><u>Caliber</u></b>
<select name="caliberRemove" form="removeForm">
 <option disabled selected> -- select an option -- </option>
	<?php
		foreach ($db->query("SELECT caliber FROM calibers ORDER BY caliber") as $row)
		{
			$caliber = $row['caliber'];
			echo '<option value="'.$caliber.'">'.$caliber.'</option>';
		}		
	?>
</select>

<b><u>Gun</u></b>
<select name="gunRemove" form="removeForm">
 <option disabled selected> -- select an option -- </option>
	<?php
		foreach ($db->query("SELECT name FROM guns ORDER BY name") as $row)
		{
			$gundisplay = $row['name'];
			echo '<option value="'.$gundisplay.'">'.$gundisplay.'</option>';
		}		
	?>
</select>
<button type="submit" value="Submit" name="remove">Remove</button>
</form>


<!-- Update Form -->
<form action="" method="POST" id="updateForm">
<br/><br/>
<h4>Edit</h4>
<b> Select a gun: </b>
<select name="gunEdit" form="updateForm">
 <option disabled selected> -- select an option -- </option>
	<?php
		foreach ($db->query("SELECT name FROM guns ORDER BY name") as $row)
		{
			$gundisplay = $row['name'];
			echo '<option value="'.$gundisplay.'">'.$gundisplay.'</option>';
		}		
	?>
</select> <br /><br/>

<b> New Quantity: </b>
 <input  type="text" name="newQuantity"> 
<b> New Price: </b>
 <input  type="text" name="newPrice"> 
<button type="submit" value="Update" name="update">Update Gun</button>
</form>

<br/><br/>
<button type="button" value="pageReset" onclick="pageReset()">Reset</button>
  
<?php
//
//Brand/Caliber Add Handling
//
$set = false;

if (isset($_POST['add']))
{
	if (!empty($_POST['addingBrand']) || !empty($_POST['caliberAdd']))
	{	
		if(!empty($_POST['addingBrand']))
		{
			foreach($db->query("SELECT name FROM manufacturers") as $row)
			{
				if ($row['name'] == $_POST['addingBrand'])
				{
					echo '<script language="javascript">';
					echo 'alert("Brand already exists.")';
					echo '</script>';
					$set = true;
				}				
			}
			if($set == false)
			{
				$db->query("INSERT INTO manufacturers(name) VALUES(\"" . $_POST['addingBrand'] ."\");");									
			}

		}
	
		if(!empty($_POST['caliberAdd']))
		{
			$set = false;
			foreach($db->query("SELECT caliber FROM calibers") as $row)
			{
				if ($row['caliber'] == $_POST['caliberAdd'])
				{
					$set = true;
				}
			}
			if($set == false)
			{
				$addingcaliber = $_POST['caliberAdd'];
				$db->query("INSERT INTO calibers(caliber) VALUES(\"$addingcaliber\");");
			}				
		}
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("No field has been filled in for adding.")';
		echo '</script>';
	}
	
	if($set == false)
	{
		echo '<script type="text/javascript">'
		, 'pageReset();'
		, '</script>';
	}
}
?>



			
<?php		
//
// Gun Add Handling
//

if (isset($_POST['createGun']))
{
	if (!empty($_POST['gunName']) && !empty($_POST['gunBrand']) && !empty($_POST['gunCaliber'])
		&& !empty($_POST['gunType']) && !empty($_POST['gunAutomatic']) && !empty($_POST['gunPrice'])
		&& !empty($_POST['gunQuantity']))
		{
			echo "Form filled<br />";
			$gunName = $_POST['gunName'];
			$gunBrand = $_POST['gunBrand'];
			$gunCaliber = $_POST['gunCaliber'];
			$gunType = $_POST['gunType'];
			$gunAutomatic = $_POST['gunAutomatic'];
			$gunPrice = $_POST['gunPrice'];
			$gunQuantity = $_POST['gunQuantity'];

			$db->query("INSERT INTO guns (name, brand, caliber, type, automatic, quantity, price, create_date) VALUES
						(\"$gunName\", \"$gunBrand\", \"$gunCaliber\", \"$gunType\", \"$gunAutomatic\", $gunQuantity, $gunPrice, NOW());");
			
		}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Missing fields for Gun Creation.")';
		echo '</script>';
	}
	echo '<script type="text/javascript">'
	, 'pageReset();'
	, '</script>';
}
	
?>

<?php
//
// Remove Handling
//

if (isset($_POST['remove']))
{
	echo "Remove is set";
	if (!empty($_POST['brandRemove']) || !empty($_POST['caliberRemove']) || !empty($_POST['gunRemove']))
	{
		if(!empty($_POST['brandRemove']))
		{
			$brandRemove = $_POST['brandRemove'];
			$db->query("DELETE FROM manufacturers WHERE name=\"$brandRemove\";");
			
		}
		
		if(!empty($_POST['caliberRemove']))
		{
			$caliberRemove = $_POST['caliberRemove'];
			$db->query("DELETE FROM calibers WHERE caliber=\"$caliberRemove\";");
		}
		
		if(!empty($_POST['gunRemove']))
		{
			$gunRemove = $_POST['gunRemove'];
			$db->query("DELETE FROM guns WHERE name=\"$gunRemove\";");
		}
		
	}
	else
	{	
		echo '<script language="javascript">';
		echo 'alert("Missing fields for Removing.")';
		echo '</script>';	
	}
	echo '<script type="text/javascript">'
	, 'pageReset();'
	, '</script>';
}
?>


<?php
//
// EDIT Handling
//

if (isset($_POST['update']))
{
	if (!empty($_POST['gunEdit']) && (!empty($_POST['newQuantity']) || !empty($_POST['newPrice'])))
	{
		$gunEdit = $_POST['gunEdit'];

		if (!empty($_POST['newQuantity']))
		{
			$newQuantity = $_POST['newQuantity'];
			$db->query("UPDATE guns SET quantity = $newQuantity WHERE name='$gunEdit';");
		}
		if (!empty($_POST['newPrice']))
		{
			$newPrice = $_POST['newPrice'];
			$db->query("UPDATE guns set price = $newPrice WHERE name='$gunEdit';");
		}
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Missing fields in Editing.")';
		echo '</script>';	
	}

	echo '<script type="text/javascript">'
		, 'pageReset();'
		, '</script>';
}


?>

</div>
</body>
</html>