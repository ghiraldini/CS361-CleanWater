<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ghiraldj-db","v1bptepGowZ4t1OE","ghiraldj-db");
if($mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
?>

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
        <form method="post" action="addVolunteer.php">
            <fieldset>
                <legend>Volunteer Sign Up: </legend>
                <fieldset>
                    <label> First Name:
                        <input type="text" name="fname" id="fname">
                    </label>
                    </br>
                    <label> Last Name:
                        <input type="text" name="lname" id="lname">
                    </label>
                    </br>
                    <label> Occupation:
                        <input type="text" name="occupation" id="occupation">
                    </label>
                    </br>
                    <label> Start Date:
                        <input type="date" name="startDate" id="startDate">
                    </label>
                    <label> End Date:
                        <input type="date" name="endDate" id="endDate">
                    </label>
                    </br>
                    <input type="submit" id="volunteerSubmit" value="Add Volunteer">
                </fieldset>
            </fieldset>
        </form>
        </br>
        </br>

        <!--//---------------------------------LOCATIONS IN NEED FORM------------------------------------>
        <form action="addLocation.php" method="post">
            <fieldset>
                <legend> Add Location: </legend>
                <fieldset>
                    <label> Country:
                        <input type="text" name="country" id="country">
                    </label>
                    </br>
                    <label> City:
                        <input type="text" name="city" id="city">
                    </label>
                    </br>
                    <label> Needed expertise:
                        <input type="text" name="need" id="need">
                    </label>
            
                    </br>
                    <input type="submit" id="locationSubmit" value="Add Location">
                </fieldset>
            </fieldset>
        </form>
        </br>
        </br>

<!-- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ----- -->
<!--//      ----------------------------------ALL VOLUNTEERS------------------------------------------//        ----->
<!-- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ----- -->

        <h2> All Volunteers </h2>
        
        <table align="center" id="volunteers">
            <tr>
                <th>ID </th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Occupation</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
            
            <?php
if(!($stmt = $mysqli->prepare("SELECT * FROM volunteers"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($vid, $first_name, $last_name, $occupation, $startDate, $endDate)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	$newStartDate = date( "Y-m-d", strtotime( $startDate ) );
	$newEndDate = date( "Y-m-d", strtotime( $endDate ) );
	echo "<tr>\n<td>\n" . $vid . "\n</td>\n<td>\n". $first_name . "\n</td>\n<td>\n" . $last_name . "\n</td>\n<td>\n" . $occupation . "\n</td>\n<td>\n" . $newStartDate . "\n</td>\n<td>\n" . $newEndDate . "\n</td>\n</tr>";
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
                <label> ID:
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


        <h2> All Locations </h2>

        <table align="center" id="locations">
            <tr>
                <th>ID </th>
                <th>Country</th>
                <th>City</th>
                <th>Occupation Needed</th>
            </tr>
            
            <?php
if(!($stmt = $mysqli->prepare("SELECT * FROM locations"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($lid, $country, $city, $need)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $lid . "\n</td>\n<td>\n". $country . "\n</td>\n<td>\n" . $city .  "\n</td>\n<td>\n". $need . "\n</td>\n</tr>";
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
                <label> ID:
                    <input type="number" name="IdNum" id="idNum">
                    </br>
                    <input type="submit" id="removeLocation" value="Delete">
                </label>
            </fieldset>
            </fieldset>
        </form>





    </body>

    </html>
