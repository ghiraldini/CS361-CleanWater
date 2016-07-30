<?php
ini_set('display_errors', 'On');
//$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","thrashek-db","QybR0dsOjULZ4QtZ","thrashek-db");

if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . 
     $mysqli->connect_error;
}
// Add Volunteer to volunteer table
if(!($stmt = $mysqli->prepare("INSERT INTO volunteers (first_name, last_name, 
email, occupation, season, days, region, startDate, endDate) 
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!($stmt->bind_param("sssssssss",$_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['occupation'],$_POST['season'],$_POST['days'],$_POST['region'],
     $_POST['startDate'],$_POST['endDate']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	header("Refresh: 0, url=cleanWaterMain.php");
//	echo "Added " . $stmt->affected_rows . " rows to volunteers.";
}
?>