<?php
session_start();
?>

<!DOCTYPE HTML> 
<html>
<head>
<title>Form Information></title>
  <link rel="stylesheet" href="resultsCSS.css">
  <link rel="stylesheet"    href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<body> 
<div class="heading">Results</div>

<?php
$filename = "myFile.txt";

if (!empty($_POST))
{
	$file = fopen ($filename, "a");
	
	$superpower = $_POST['superpower'];
	$favcolor = $_POST['favcolor'];
	$swift = $_POST['swift'];
	$sport = $_POST['sport'];
	
	if ($file)
	{
		fwrite($file, "$superpower $favcolor $swift $sport ");
		fclose($file);
	}
	else
	{
		die ("File did not exist and could not be created.");
	}
  
  $_SESSION[""voted"] = true;

}

$file = fopen("$filename", "r");

$filecontents = file_get_contents ($filename);

$flightcount = substr_count($filecontents, "Flight");
$inviscount = substr_count($filecontents, "Invisibility");
$strengthcount = substr_count($filecontents, "Super Strength");
$speedcount = substr_count($filecontents, "Super Speed");
$mindcount = substr_count($filecontents, "Mind Control");
$superherototal = (("$flightcount" + "$inviscount" + "$strengthcount" + "$speedcount" + "$mindcount"));

$flightbar =($flightcount/$superherototal) * 100;
$invisbar =($inviscount/$superherototal) * 100;
$strengthbar =($strengthcount/$superherototal) * 100;
$speedbar =($speedcount/$superherototal) * 100;
$mindbar =($mindcount/$superherototal) * 100;

echo "<br/><hr>";		
echo "<h2>Which superpower would you rather have?</h2>";
echo "<div id=\"progress\">" . "Flight: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $flightbar%'>"
        . $flightcount
        . "</div>"
	    . "</div>" 
		. "</div>";

echo "<div id=\"progress\">" . "Invisibility: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:$invisbar%'>"
        . $inviscount
        . "</div>"
	    . "</div>" 
		. "</div>";

echo "<div id=\"progress\">" . "Super Strength: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $strengthbar%'>"
        . $strengthcount
        . "</div>"
	    . "</div>" 
		. "</div>";

echo "<div id=\"progress\">" . "Super Speed: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:$speedbar%'>"
        . $speedcount
        . "</div>"
	    . "</div>" 
		. "</div>";

echo "<div id=\"progress\">" . "Mind Control: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:$mindbar%'>"
        . $mindcount
        . "</div>"
	    . "</div>" 
		. "</div>";
		
$redcount = substr_count($filecontents, "Red");
$orangecount = substr_count($filecontents, "Orange");
$yellowcount = substr_count($filecontents, "Yellow");
$greencount = substr_count($filecontents, "Green");
$bluecount = substr_count($filecontents, "Blue");
$purplecount = substr_count($filecontents, "Purple");
$blackcount = substr_count($filecontents, "Black");
$whitecount = substr_count($filecontents, "White");
$colortotal = (("$redcount" + "$orangecount" + "$yellowcount" + "$greencount" + "$bluecount"
							+ "$purplecount" + "$blackcount" + "$whitecount"));
							
$redbar = ($redcount/$colortotal) * 100;
$orangebar = ($orangecount/$colortotal) * 100;
$yellowbar = ($yellowcount/$colortotal) * 100;
$greenbar = ($greencount/$colortotal) * 100;
$bluebar = ($bluecount/$colortotal) * 100;
$purplebar = ($purplecount/$colortotal) * 100;
$blackbar = ($blackcount/$colortotal) * 100;
$whitebar = ($whitecount/$colortotal) * 100;

echo "<br/><hr>";				
echo "<h2>What is your favorite color?</h2>";
echo "<div id=\"progress\">" . "Red: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-info progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $redbar%'>"
        . $redcount
        . "</div>"
	    . "</div>" 
		. "</div>";
echo "<div id=\"progress\">" . "Orange: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-info progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $orangebar%'>"
        . $orangecount
        . "</div>"
	    . "</div>" 
		. "</div>";
		
echo "<div id=\"progress\">" . "Yellow: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-info progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $yellowbar%'>"
        . $yellowcount
        . "</div>"
	    . "</div>" 
		. "</div>";
		
echo "<div id=\"progress\">" . "Green: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-info progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $greenbar%'>"
        . $greencount
        . "</div>"
	    . "</div>" 
		. "</div>";
		
echo "<div id=\"progress\">" . "Blue: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-info progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $bluebar%'>"
        . $bluecount
        . "</div>"
	    . "</div>" 
		. "</div>";
		
echo "<div id=\"progress\">" . "Purple: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-info progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $purplebar%'>"
        . $purplecount
        . "</div>"
	    . "</div>" 
		. "</div>";
		
echo "<div id=\"progress\">" . "Black: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-info progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $blackbar%'>"
        . $blackcount
        . "</div>"
	    . "</div>" 
		. "</div>";

echo "<div id=\"progress\">" . "White: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-info progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $whitebar%'>"
        . $whitecount
        . "</div>"
	    . "</div>" 
		. "</div>";

$yescount = substr_count($filecontents, "Yes");
$nocount = substr_count($filecontents, "No");

$yntotal = (("$yescount" + "$nocount"));

$yesbar = ($yescount/$yntotal) * 100;
$nobar = ($nocount/$yntotal) * 100;							

echo "<br/><hr>";		
echo "<h2>Are you a Taylor Swift fan?</h2>";
echo "<div id=\"progress\">" . "Yes: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-danger progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $yesbar%'>"
        . $yescount
        . "</div>"
	    . "</div>" 
		. "</div>";
		
echo "<div id=\"progress\">" . "No: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-danger progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $nobar%'>"
        . $nocount
        . "</div>"
	    . "</div>" 
		. "</div>";

$basketballcount = substr_count($filecontents, "Basketball");
$baseballcount = substr_count($filecontents, "Baseball");
$footballcount = substr_count($filecontents, "Football");
$soccercount = substr_count($filecontents, "Soccer");

$sportstotal = (("$basketballcount" + "$baseballcount" + "$footballcount" + "$soccercount"));

$basketballbar = ($basketballcount/$sportstotal) * 100;
$baseballbar = ($baseballcount/$sportstotal) * 100;	
$footballbar = ($footballcount/$sportstotal) * 100;
$soccerbar = ($soccercount/$sportstotal) * 100;		

echo "<br/><hr>";		
echo "<h2>What is your favorite sport?</h2>";
echo "<div id=\"progress\">" . "Basketball: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-warning progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $basketballbar%'>"
        . $basketballcount
        . "</div>"
	    . "</div>" 
		. "</div>";
		
echo "<div id=\"progress\">" . "Baseball: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-warning progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $baseballbar%'>"
        . $baseballcount
        . "</div>"
	    . "</div>" 
		. "</div>";
		
echo "<div id=\"progress\">" . "Football: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-warning progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $footballbar%'>"
        . $footballcount
        . "</div>"
	    . "</div>" 
		. "</div>";
		
echo "<div id=\"progress\">" . "Soccer: ".
		"<div class='progress'>"
		. "<div class='progress-bar progress-bar-warning progress-bar-striped' role='progressbar'
		aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: $soccerbar%'>"
        . $soccercount
        . "</div>"
	    . "</div>" 
		. "</div>";

?>

</body>
</html>