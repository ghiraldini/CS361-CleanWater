<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");
//$mysqli = new mysqli("oniddb.cws.oregonstate.edu","thrashek-db","QybR0dsOjULZ4QtZ","thrashek-db");
//$mysqli = new mysqli("oniddb.cws.oregonstate.edu","moondav-db","BUyiIi84msF2NNtI","moondav-db");


if($mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
?>

<script>
function compare() {
	var startDate = new Date(document.getElementById("startDate").value);
	var endDate = new Date(document.getElementById("endDate").value);

	if (startDate.getTime() > endDate.getTime()) {
		alert ("End Date is before Start Date");
		return false;
	}
}
</script>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Database</title>
	<meta name="description" content="Database.">
	<link rel="stylesheet" href="main.css">
</head>

<body>
	<h1> Clean Water Database </h1>
	<!--//----------------------------------VOLUNTEERS FORM--------------------------------------------->
	<form name="volunteerForm" onsubmit="return compare()" method="post" action="addVolunteer.php">
		<fieldset>
			<legend>Volunteer Sign Up: </legend>
			<fieldset>
				<label>
					First Name:
					<input type="text" name="fname" id="fname" required="">
				</label>
			</br>
			<label>
				Last Name:
				<input type="text" name="lname" id="lname" required="">
			</label>
		</br>
		<label>
			Email:
			<input type="text" name="email" id="email" required="">
		</label>
		<br>
		<label>
			Occupation:
			<select name="occupation" required="">
				<option value="">Select</option>
				<option value="doctor">Doctor</option>
				<option value="teacher">Teacher</option>
				<option value="engineer">Engineer</option>
				<option value="other">Other</option>
			</select>
		</label>
	</br>
	<label>
		Season:
		<select name="season" required="">
			<option value="">Select</option>
			<option value="winter">Winter</option>
			<option value="spring">Spring</option>
			<option value="summer">Summer</option>
			<option value="fall">Fall</option>
		</select>
	</label>
</br>
<label>
	Days:
	<select name="days" required="">
		<option value="">Select</option>
		<option value="oneweek">0-7</option>
		<option value="twoweek">8-14</option>
		<option value="threeweek">15-21</option>
		<option value="moreweek">22+</option>
	</select>
</label>
</br>



<label>
	Region:
	<select name="region" id="region" required="">
		<!-- If user wants to add multiple regions - TBD
		<input type="radio" name="northAmerica" value="North America"> North America
		<input type="radio" name="southAmerica" value="South America"> South America -->
		<option value="">Select</option>
		<option value="northAmerica">North America</option>
		<option value="centralAmerica">Central America</option>
		<option value="southAmerica">South America</option>
		<option value="europe">Europe</option>
		<option value="asia">Asia</option>
		<option value="africa">Africa</option>
		<option value="india">India</option>
		<option value="australia">Australia</option>
		<option value="newZealand">New Zealand</option>
		<option value="russia">Russia</option>

	</select>
</label>
<!--
<label> Occupation:
<input type="text" name="occupation" id="occupation">
</label>
-->
</br>
<label>
	Start Date:
	<input type="date" name="startDate" id="startDate" required="">
</label>

<label>
	End Date:
	<input type="date" name="endDate" id="endDate" required="">
</label>

</br>
<input type="submit" id="volunteerSubmit" value="Add Volunteer" required="">
</fieldset>
</fieldset>
</form>
</br>
</br>

<!--//---------------------------------LOCATIONS IN NEED FORM------------------------------------>
<form action="addLocation.php" method="post">
	<fieldset>
		<legend> Opportunity Location: </legend>
		<fieldset>
			<label>
				Region:
				<select name="region" id="region" required="">
					<!-- If user wants to add multiple regions - TBD
					<input type="radio" name="northAmerica" value="North America"> North America
					<input type="radio" name="southAmerica" value="South America"> South America -->
					<option value="">Select</option>
					<option value="northAmerica">North America</option>
					<option value="centralAmerica">Central America</option>
					<option value="southAmerica">South America</option>
					<option value="europe">Europe</option>
					<option value="asia">Asia</option>
					<option value="africa">Africa</option>
					<option value="india">India</option>
					<option value="australia">Australia</option>
					<option value="newZealand">New Zealand</option>
					<option value="russia">Russia</option>

				</select>
			</label>
			<br>
			<label>
				Country:
				<input type="text" name="country" id="country" required="">
			</label>
		</br>
		<label>
			City:
			<input type="text" name="city" id="city" required="">
		</label>
	</br>
	<label>
		Coordinator Email:
		<input type="text" name="cemail" id="cemail" required="">
	</label>
	<br>
	<label>
		Coordinator Phone Number:
		<input type="text" name="cphone" id="cphone" required="">
	</label>
</br>
<!--    <label> Needed expertise:
<input type="text" name="need" id="need" required>
</label>
</br>-->

<label>
	Needed Occupation:
	<select name="occupation" required="">
		<option value="">Select</option>
		<option value="doctor">Doctor</option>
		<option value="teacher">Teacher</option>
		<option value="engineer">Engineer</option>
		<option value="other">Other</option>
	</select>
</label>
</br>

<label>
	Needed Season:
	<select name="season" required="">
		<option value="">Select</option>
		<option value="winter">Winter</option>
		<option value="spring">Spring</option>
		<option value="summer">Summer</option>
		<option value="fall">Fall</option>
	</select>
</label>
</br>

<label>
	Needed Days:
	<select name="days" required="">
		<option value="">Select</option>
		<option value="oneweek">0-7</option>
		<option value="twoweek">8-14</option>
		<option value="threeweek">15-21</option>
		<option value="moreweek">22+</option>
	</select>
</label>
</br>




<br>
<label>
	Opportunity Description (Max 255 characters):
	<br>
	<input type="textbox" name="opdesc" style="height: 100px; width: 400px" maxlength="255">
	<br>

</label>
</br>
<label>
	Start Date:
	<input type="date" name="startDate" id="startDate" required="">
</label>

<label>
	End Date:
	<input type="date" name="endDate" id="endDate" required="">
</label>
<br>

<input type="submit" id="locationSubmit" value="Add Location">
</fieldset>
</fieldset>
</form>
</br>
</br>

<!-- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ----- -->
<!--//      ----------------------------------ALL VOLUNTEERS------------------------------------------//        ----->
<!-- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ----- -->

<h2> Volunteers </h2>

<table align="center" id="volunteers">
	<tr>
		<th>ID </th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Occupation</th>
		<th>Season</th>
		<th>Days</th>
		<th>Region</th>
		<th>Start Date</th>
		<th>End Date</th>
	</tr>

	<!-- MySqli Statements to fill table after freshing database -->

	<?php
	if(!($stmt = $mysqli->prepare("SELECT * FROM volunteers"))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	if(!$stmt->bind_result($vid, $first_name, $last_name, $email, $occupation, $season, $days, $region, $startDate, $endDate)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	while($stmt->fetch()){
		$newStartDate = date( "Y-m-d", strtotime( $startDate ) );
		$newEndDate = date( "Y-m-d", strtotime( $endDate ) );
		echo "<tr>\n<td>\n" . $vid . "\n</td>\n<td>\n" . $first_name . "\n</td>\n<td>\n" . $last_name . "\n</td>\n<td>\n" . $email . "\n</td>\n<td>\n" .
		$occupation . "\n</td>\n<td>\n" . $season . "\n</td>\n<td>\n" .
		$days . "\n</td>\n<td>\n" . $region . "\n</td>\n<td>\n" . $newStartDate . "\n</td>\n<td>\n" . $newEndDate . "\n</td>\n</tr>";
	}
	$stmt->close();
	?>
</table>



<!--//---------------------------------- CLEAR VOLUNTEER FUNCTIONALITY --------------------------------------------->
</br>
</br>
<form action="clearVolunteers.php" method="post">
	<fieldset>
		<legend> Delete All Volunteers: </legend>
		<input type="submit" id="clearVolunteers" value="Delete Volunteers">
	</fieldset>
</fieldset>
</form>

<form action="removeVolunteer.php" method="post">
	<fieldset>
		<legend> Remove Volunteer: </legend>
		<label>
			ID:
			<input type="number" name="IdNum" id="idNum">
		</br>
		<input type="submit" id="removeVolunteer" value="Delete">
	</label>
</fieldset>
</fieldset>
</form>


<!-- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ----- -->
<!--//      ----------------------------------ALL LOCATIONS ------------------------------------------//        ----->
<!-- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ----- -->


<h2> Opportunities </h2>

<table align="center" id="locations">
	<tr>
		<th>ID </th>
		<th>Region </th>
		<th>Country</th>
		<th>City</th>
		<th>Coordinator Email</th>
		<th>Coordinator Phone Number</th>
		<th>Occupation Needed</th>
		<th>Season Needed</th>
		<th>Hours Needed</th>
		<th>Opportunity Description</th>
		<th>Start Date</th>
		<th>End Date</th>
	</tr>
	<!-- MySqli statements for filling table -->
	<?php
	if(!($stmt = $mysqli->prepare("SELECT * FROM locations"))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	if(!$stmt->bind_result($lid, $region, $country, $city, $cemail, $cphone, $occupation, $season, $days, $opdesc, $startDate, $endDate)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	while($stmt->fetch()){
		echo "<tr>\n<td>\n" . $lid . "\n</td>\n<td>\n" . $region . "\n</td>\n<td>\n". $country . "\n</td>\n<td>\n" . $city .  "\n</td>\n<td>\n". $cemail .  "\n</td>\n<td>\n".
		$cphone .  "\n</td>\n<td>\n". $occupation .  "\n</td>\n<td>\n". $season .  "\n</td>\n<td>\n".  $days . "\n</td>\n<td>\n".  $opdesc . "\n</td>\n<td>\n".
		$startDate . "\n</td>\n<td>\n".  $endDate . "\n</td>\n</tr>";
	}

	$stmt->close();
	?>
</table>

<!--//---------------------------------- CLEAR LOCATIONS FUNCTIONALITY --------------------------------------------->
</br>
</br>
<form action="clearLocations.php" method="post">
	<fieldset>
		<legend> Delete All Locations: </legend>
		<input type="submit" id="clearLocations" value="Delete Locations">
	</fieldset>
</fieldset>
</form>

<form action="removeLocation.php" method="post">
	<fieldset>
		<legend> Remove Location: </legend>
		<label>
			ID:
			<input type="number" name="IdNum" id="idNum">
		</br>
		<input type="submit" id="removeLocation" value="Delete">
	</label>
</fieldset>
</fieldset>
</form>



<!-- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ----- -->
<!--//      ----------------------------------MATCHING LOCATIONS ------------------------------------------//        ----->
<!-- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ----- -->


          <h2> ALL MATCHES</h2>

          <table align="center" id="matches">
               <tr>
                    <th>Region </th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Coordinator Email</th>
                    <th>Coordinator Phone Number</th>
                    <th>Opportunity Description</th>
		    						<th>Volunteer</th>
               </tr>
               <!-- MySqli statements for filling table -->

<?php
if(!($stmt = $mysqli->prepare("
SELECT locations.lid, locations.region, locations.country, locations.city, locations.cemail, locations.cphone, locations.opdesc, volunteers.email
FROM locations
INNER JOIN volunteers
WHERE (locations.need = volunteers.occupation)
OR (locations.region = volunteers.region)
OR (volunteers.startDate < locations.endDate AND volunteers.endDate > locations.startDate)
OR (volunteers.startDate < locations.endDate AND volunteers.endDate < locations.endDate)
OR (volunteers.startDate > locations.startDate AND volunteers.startDate < volunteers.endDate)
SORT BY locations.lid ASC;
"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($lid, $region, $country, $city, $cemail, $cphone, $opdesc, $email)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $lid . "\n</td>\n<td>\n" . $region . "\n</td>\n<td>\n". $country . "\n</td>\n<td>\n" . $city .  "\n</td>\n<td>\n". $cemail .  "\n</td>\n<td>\n".
 $cphone .  "\n</td>\n<td>\n". $email .  "\n</td>\n</tr>";
}

$stmt->close();
?>
          </table>



<!-- MATCH FILTER BY OCCUPATION -->

<h2> Matches by Occupation</h2>

<table align="center" id="matches_occupation">
	<tr>
		<th>Region </th>
		<th>Country</th>
		<th>City</th>
		<th>Coordinator Email</th>
		<th>Coordinator Phone Number</th>
		<th>Opportunity Description</th>
		<th>Volunteer</th>
	</tr>
	<!-- MySqli statements for filling table -->

	<?php
	if(!($stmt = $mysqli->prepare("
	SELECT locations.lid, locations.region, locations.country, locations.city, locations.cemail, locations.cphone, locations.opdesc, volunteers.email
	FROM locations
	INNER JOIN volunteers
	WHERE locations.need = volunteers.occupation
	AND volunteers.email = \"dave@moon.com\";
	"))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	if(!$stmt->bind_result($lid, $region, $country, $city, $cemail, $cphone, $opdesc, $email)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	while($stmt->fetch()){
		echo "<tr>\n<td>\n" . $lid . "\n</td>\n<td>\n" . $region . "\n</td>\n<td>\n". $country . "\n</td>\n<td>\n" . $city .  "\n</td>\n<td>\n". $cemail .  "\n</td>\n<td>\n".
		$cphone .  "\n</td>\n<td>\n". $email .  "\n</td>\n</tr>";
	}

	$stmt->close();
	?>
</table>




<!-- MATCHES FILTER BY REGION -->

<h2> Matches by Region</h2>

<table align="center" id="matches_region">
	<tr>
		<th>Region </th>
		<th>Country</th>
		<th>City</th>
		<th>Coordinator Email</th>
		<th>Coordinator Phone Number</th>
		<th>Opportunity Description</th>
		<th>Volunteer</th>
	</tr>
	<!-- MySqli statements for filling table -->

	<?php
	if(!($stmt = $mysqli->prepare("
	SELECT locations.lid, locations.region, locations.country, locations.city, locations.cemail, locations.cphone, locations.opdesc, volunteers.email
	FROM locations
	INNER JOIN volunteers
	WHERE locations.region = volunteers.region
	AND volunteers.email = \"dave@moon.com\";
	"))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	if(!$stmt->bind_result($lid, $region, $country, $city, $cemail, $cphone, $opdesc, $email)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	while($stmt->fetch()){
		echo "<tr>\n<td>\n" . $lid . "\n</td>\n<td>\n" . $region . "\n</td>\n<td>\n". $country . "\n</td>\n<td>\n" . $city .  "\n</td>\n<td>\n". $cemail .  "\n</td>\n<td>\n".
		$cphone .  "\n</td>\n<td>\n". $email .  "\n</td>\n</tr>";
	}

	$stmt->close();
	?>
</table>



<!-- MATCHES FILTER BY TIME -->


<h2> Matches by Time</h2>

<table align="center" id="matches_time">
	<tr>
		<th>Region </th>
		<th>Country</th>
		<th>City</th>
		<th>Coordinator Email</th>
		<th>Coordinator Phone Number</th>
		<th>Opportunity Description</th>
		<th>Volunteer</th>
	</tr>
	<!-- MySqli statements for filling table -->

	<?php
	if(!($stmt = $mysqli->prepare("
	SELECT locations.lid, locations.region, locations.country, locations.city, locations.cemail, locations.cphone, locations.opdesc, volunteers.email
	FROM locations
	INNER JOIN volunteers
	WHERE volunteers.startDate < locations.endDate
	AND volunteers.endDate > locations.startDate
	OR volunteers.startDate < locations.endDate
	AND volunteers.endDate < locations.endDate
	OR volunteers.startDate > locations.startDate
	AND volunteers.startDate < volunteers.endDate
	AND volunteers.email = \"dave@moon.com\";
	"))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	if(!$stmt->bind_result($lid, $region, $country, $city, $cemail, $cphone, $opdesc, $email)){
		echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	while($stmt->fetch()){
		echo "<tr>\n<td>\n" . $lid . "\n</td>\n<td>\n" . $region . "\n</td>\n<td>\n". $country . "\n</td>\n<td>\n" . $city .  "\n</td>\n<td>\n". $cemail .  "\n</td>\n<td>\n".
		$cphone .  "\n</td>\n<td>\n". $email .  "\n</td>\n</tr>";
	}

	$stmt->close();
	?>
</table>





</body>

</html>
