<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inventory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="phpInventoryCSS.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="phpjs.js">
</script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="phpProjectHome.php">Clark Center Fires</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="phpProjectHome.php">Home</a></li>
            <li class="active"><a href="phpProjectInventory.php">View Inventory</a></li>
            <li><a href="phpProjectContact.php">Contact Us</a></li>
          </ul>
        </li>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="phpProjectLogin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php	

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
?>

<div class="container">
	<h1>Inventory</h1>
	<br/><br/>

<b>By Selection</b> <br /><br/>
<b> Brand: </b>
<select name="manufacturer" form="filterform"  class="styled-select">
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
<select name="caliber" form="filterform" class="styled-select">
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
<select name="type" form="filterform" class="styled-select">
  <option disabled selected> -- select an option -- </option>
  <option value="Handgun">Handgun</option>
  <option value="Rifle">Rifle</option>
  <option value="Shotgun">Shotgun</option>
</select>

<b> Automatic: </b>
<select name="automatic" form="filterform">
  <option disabled selected> -- select an option -- </option>
  <option value="Semi-Automatic">Semi-Automatic</option>
  <option value="Automatic">Automatic</option>
</select> 

<br /><br />

<b>Filter</b> <br /> <br />
<form action="phpProjectInventory.php" method="POST" id="filterform">

  <input type="radio" name="rfilter" value="Name" id="lradio"> Name
  <input type="radio" name="rfilter" value="Date" id ="cradio"> Date
  <input type="radio" name="rfilter" value="Price" id="rradio"> Price <br /><br/>
  <input type="submit" value="Update">
 <button type="button" value="pageReset" onclick="pageReset()">Reset</button>
</form>

<br/><br/>	
	
	<table class="table table-striped">
		<thead>
		<th>Name</th>
		<th>Type</th>
		<th>Caliber</th>
		<th>Brand</th>
		<th>Automatic</th>
		<th>Added</th>
		<th>Quantity</th>
		<th>Price</th>
		</tr>
			
<?php		
	
	$selectedFields= array();
	array_push($selectedFields,"blue","yellow");
	
	if (!empty($_POST))
	{
		$required = array('manufacturer', 'caliber', 'type', 'automatic', 'rfilter');

		// Loop over field names, make sure each one exists and is not empty
		$error = false;
		foreach($required as $field) {
			if (!empty($_POST[$field])) {
				array_push($selectedFields, $_POST[$field]);
			}
		}
	}	

	echo "<br/> <br/>";
	
	if (!empty($_POST))
	{
		if (!empty($_POST['rfilter'])){
			
		if ($_POST['rfilter'] == "Name"){
			foreach ($db->query("SELECT name, type, caliber, brand, automatic, create_date, quantity, price FROM guns ORDER BY name") as $row)
				{	
				if((!empty($_POST['manufacturer']) && $_POST['manufacturer'] == $row['brand'] || empty($_POST['manufacturer'])) &&
					(!empty($_POST['caliber']) && $_POST['caliber'] == $row['caliber'] || empty($_POST['caliber'])) &&
					(!empty($_POST['type']) && $_POST['type'] == $row['type'] || empty($_POST['type'])) &&
					(!empty($_POST['automatic']) && $_POST['automatic'] == $row['automatic'] || empty($_POST['automatic'])))
					{
					echo "<tr>" . "<td>" . $row['name'] . "</td>" 
					. "<td>" . $row['type'] . "</td>"
					. "<td>" . $row['caliber'] . "</td>"
					. "<td>" . $row['brand'] . "</td>" 
					. "<td>" . $row['automatic'] . "</td>" 
					. "<td>" . $row['create_date'] . "</td>"
					. "<td id=\"quantity\">" . $row['quantity'] . "</td>" 
					. "<td>" . "$" . $row['price'] . "</td>" . "</tr>";
				
					}
				}
			}
			
		else if ($_POST['rfilter'] == "Date"){
			foreach ($db->query("SELECT name, type, caliber, brand, automatic, create_date, quantity, price FROM guns ORDER BY create_date") as $row)
				{	
				if((!empty($_POST['manufacturer']) && $_POST['manufacturer'] == $row['brand'] || empty($_POST['manufacturer'])) &&
					(!empty($_POST['caliber']) && $_POST['caliber'] == $row['caliber'] || empty($_POST['caliber'])) &&
					(!empty($_POST['type']) && $_POST['type'] == $row['type'] || empty($_POST['type'])) &&
					(!empty($_POST['automatic']) && $_POST['automatic'] == $row['automatic'] || empty($_POST['automatic'])))
					{
					echo "<tr>" . "<td>" . $row['name'] . "</td>" 
					. "<td>" . $row['type'] . "</td>"
					. "<td>" . $row['caliber'] . "</td>"
					. "<td>" . $row['brand'] . "</td>" 
					. "<td>" . $row['automatic'] . "</td>" 
					. "<td>" . $row['create_date'] . "</td>"
					. "<td id=\"quantity\">" . $row['quantity'] . "</td>" 
					. "<td>" . "$" . $row['price'] . "</td>" . "</tr>";
				
					}
				}
			}	
			
		
		else if ($_POST['rfilter'] == "Price"){
			foreach ($db->query("SELECT name, type, caliber, brand, automatic, create_date, quantity, price FROM guns ORDER BY price") as $row)
				{	
				if((!empty($_POST['manufacturer']) && $_POST['manufacturer'] == $row['brand'] || empty($_POST['manufacturer'])) &&
					(!empty($_POST['caliber']) && $_POST['caliber'] == $row['caliber'] || empty($_POST['caliber'])) &&
					(!empty($_POST['type']) && $_POST['type'] == $row['type'] || empty($_POST['type'])) &&
					(!empty($_POST['automatic']) && $_POST['automatic'] == $row['automatic'] || empty($_POST['automatic'])))
					{
					echo "<tr>" . "<td>" . $row['name'] . "</td>" 
					. "<td>" . $row['type'] . "</td>"
					. "<td>" . $row['caliber'] . "</td>"
					. "<td>" . $row['brand'] . "</td>" 
					. "<td>" . $row['automatic'] . "</td>" 
					. "<td>" . $row['create_date'] . "</td>"
					. "<td id=\"quantity\">" . $row['quantity'] . "</td>" 
					. "<td>" . "$" . $row['price'] . "</td>" . "</tr>";
				
					}
				}
			}
			


	}
			else {
			foreach ($db->query("SELECT name, type, caliber, brand, automatic, create_date, quantity, price FROM guns") as $row)
				{	
				if((!empty($_POST['manufacturer']) && $_POST['manufacturer'] == $row['brand'] || empty($_POST['manufacturer'])) &&
					(!empty($_POST['caliber']) && $_POST['caliber'] == $row['caliber'] || empty($_POST['caliber'])) &&
					(!empty($_POST['type']) && $_POST['type'] == $row['type'] || empty($_POST['type'])) &&
					(!empty($_POST['automatic']) && $_POST['automatic'] == $row['automatic'] || empty($_POST['automatic'])))
					{
					echo "<tr>" . "<td>" . $row['name'] . "</td>" 
					. "<td>" . $row['type'] . "</td>"
					. "<td>" . $row['caliber'] . "</td>"
					. "<td>" . $row['brand'] . "</td>" 
					. "<td>" . $row['automatic'] . "</td>" 
					. "<td>" . $row['create_date'] . "</td>"
					. "<td id=\"quantity\">" . $row['quantity'] . "</td>" 
					. "<td>" . "$" . $row['price'] . "</td>" . "</tr>";
				
					}
				}
			
		}
	}
	
	else{
		foreach ($db->query("SELECT name, type, caliber, brand, automatic, create_date, quantity, price FROM guns by brand") as $row)
		{	
		echo "<tr>" . "<td>" . $row['name'] . "</td>" 
		. "<td>" . $row['type'] . "</td>"
		. "<td>" . $row['caliber'] . "</td>"
		. "<td>" . $row['brand'] . "</td>" 
		. "<td>" . $row['automatic'] . "</td>" 
		. "<td>" . $row['create_date'] . "</td>"
		. "<td id=\"quantity\">" . $row['quantity'] . "</td>" 
		. "<td>" . "$" . $row['price'] . "</td>" . "</tr>";
		}
	}
?>


	
</table>
</div>	
	
</body>
</html>

