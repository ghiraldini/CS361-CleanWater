<?php
ini_set('display_errors', 'On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");
//$mysqli = new mysqli("oniddb.cws.oregonstate.edu","thrashek-db","QybR0dsOjULZ4QtZ","thrashek-db");

if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " .
     $mysqli->connect_error;
}

// Filter Results from Database
if(!($stmt = $mysqli->prepare("SELECT t.name, c.fullName FROM title_tbl t
    INNER JOIN cat_tbl c ON t.catID = c.id
    WHERE c.id =?"))){
    echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

//example code
SELECT F.film_id AS 'Film ID#', F.title AS 'Film Title', COUNT(A.actor_id) AS 'Actor Count'
FROM film F INNER JOIN film_category FC ON F.film_id = FC.film_id
INNER JOIN film_actor FA ON F.film_id = FA.film_id
INNER JOIN actor A ON A.actor_id = FA.actor_id
GROUP BY F.film_id
ORDER BY F.film_id;



if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	header("Refresh: 0, url=cleanWaterMain.php");
//	echo "Added " . $stmt->affected_rows . " rows to volunteers.";
}

?>
