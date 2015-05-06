<!DOCTYPE html>
<html>
	<head>
		<title>
		Testing Files
		</title>
	</head>
	
	<body style="background-color:#57E964"">
		<div>
<?php

	echo "This from PHP...<br />...Like a bauws<br/><br/>";
		
	$file = fopen("myFile.txt", "r"); #r for read
		
	if ($file)
	{
		echo "The file is open<br />";
		
		while ($line = fgets($file))
		{
			echo "This is from the file: $line<br />\n";
		}
	}

	

		$file = fopen("myFile.txt", "a");
		
		if ($file)
		{
			fwrite($file, "Hello World!\nMUAHAHAHAHAHA\n");
			fclose($file);
		}
		else
		{
			die ("File did not exist and could not be created.");
		}


	
	echo "<br />Doing the rest of the things on the page...";
	
?>
		
		
		</div>
	</body>
</html>