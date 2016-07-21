<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");

if(!$mysqli || $msqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}

// Add Volunteer to volunteer table
if(!($stmt = $mysqli->prepare("INSERT INTO volunteers (first_name, last_name, occupation, startDate, endDate) VALUES (?, ?, ?, ?, ?)"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("sssss",$_POST['fname'],$_POST['lname'],$_POST['occupation'],$_POST['startDate'],$_POST['endDate']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Added " . $stmt->affected_rows . " rows to volunteers.";
}

?>
<html>
    <body>
    <form action="cleanWaterMain.php">
        <fieldset>
            <legend> Homepage: </legend>
            <input type="submit" id="cleanWaterMain">
        </fieldset>
    </form>    
    </body>
</html>
