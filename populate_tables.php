<?php

ini_set('display_errors', 'On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");
//$mysqli = new mysqli("oniddb.cws.oregonstate.edu","thrashek-db","QybR0dsOjULZ4QtZ","thrashek-db");
//$mysqli = new mysqli("oniddb.cws.oregonstate.edu","moondav-db","BUyiIi84msF2NNtI","moondav-db");

if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
    echo "<br>";
	}

if (!empty($_POST)){

  // print_r($_POST['email']);
  $emailVar = $_POST['email'];
  print_r($emailVar);

  if(!($stmt = $mysqli->prepare("SELECT locations.lid, locations.region, locations.country, locations.city, locations.cemail, locations.cphone, locations.opdesc, volunteers.email
    FROM locations
    INNER JOIN volunteers
    WHERE locations.need = volunteers.occupation
    AND volunteers.email = $emailVar"))){
      echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    }
  }
  if(!$stmt->execute()){
    echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
  }
  if(!$stmt->bind_result($lid, $region, $country, $city, $cemail, $cphone, $opdesc, $email)){
    echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
  }
  while($stmt->fetch()){
    echo "<tr>\n<td>\n" . $lid . "\n</td>\n<td>\n" . $region . "\n</td>\n<td>\n". $country . "\n</td>\n<td>\n" . $city .  "\n</td>\n<td>\n". $cemail .  "\n</td>\n<td>\n".
    $cphone .  "\n</td>\n<td>\n". $opdesc . "\n</td>\n<td>\n" . $email .  "\n</td>\n</tr>";
  }
  // header("Refresh: 0, url=home.php");
  $stmt->close();
  ?>


  <!--
  WHERE locations.need = volunteers.occupation
  AND volunteers.email = " . $_POST['email'] -->
