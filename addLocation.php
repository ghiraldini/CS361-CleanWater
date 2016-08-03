<?php
ini_set('display_errors', 'On');
//$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");
//$mysqli = new mysqli("oniddb.cws.oregonstate.edu","thrashek-db","QybR0dsOjULZ4QtZ","thrashek-db");
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","moondav-db","BUyiIi84msF2NNtI","moondav-db");

if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . 
     $mysqli->connect_error;
}
// Add Location to locations table
if(!($stmt = $mysqli->prepare("INSERT INTO locations (region, country, city, cemail, cphone, need, season, days, opdesc, startDate, endDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!($stmt->bind_param("sssssssssss", $_POST['region'], $_POST['country'], $_POST['city'], $_POST['cemail'], $_POST['cphone'],
$_POST['occupation'], $_POST['season'], $_POST['days'], $_POST['opdesc'], $_POST['startDate'], $_POST['endDate']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	header("Refresh: 0, url=landing.html");
}
?>
