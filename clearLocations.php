<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
//$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","thrashek-db","QybR0dsOjULZ4QtZ","thrashek-db");

if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
    echo "<br>";
	}

if(!($stmt = $mysqli->prepare("TRUNCATE locations"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    echo "<br>";
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	header("Refresh: 0, url=cleanWaterMain.php");
//	echo "Cleared locations table.";
}
?>
