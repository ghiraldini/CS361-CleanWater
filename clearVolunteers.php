<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");

if(!$mysqli || $msqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
    echo "<br>";
	}

if(!($stmt = $mysqli->prepare("TRUNCATE volunteers"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    echo "<br>";
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Cleared volunteers table.";
    echo "<br>";
}
?>

<html>
    <body>
    <form action="cleanWaterMain.php">
        <fieldset>
            <legend> Return to Homepage: </legend>
            <input type="submit" id="cleanWaterMain" value="Return">
        </fieldset>
    </form>    
    </body>
</html>
