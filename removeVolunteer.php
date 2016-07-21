<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");

if(!$mysqli || $msqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
    echo "<br>";
	}

if(!($stmt = $mysqli->prepare("DELETE FROM volunteers WHERE vid = " . $_POST['IdNum']))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    echo "<br>";
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	header("Refresh: 0, url=cleanWaterMain.php");
//	echo "Cleared Volunteer ID: " . $_POST["IdNum"] . " from volunteers table.";
}
?>
