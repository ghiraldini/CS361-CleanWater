
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Clean Water</title>

  <!-- Bootstrap -->
  <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <nav class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
      <a href="#" class="navbar-brand">Home</a>
    </div>

    <div>
      <ul class="nav navbar-nav pull-right">
        <li><a href="landing.html">Logout</a></li>
      </ul>
    </div>
  </nav>


  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <form>
          <h4>Current User Email:</h4>
        </div>
        <div class="col-md-4">
          <select class="col-md-4 form-control" id="email" name="email" method="post" action="populate_tables.php">
            <option class="form-control" value="">Select Current User Email</option>
            <?php
            if(!($stmt = $mysqli->prepare("SELECT email FROM volunteers"))){
              echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
            }
            if(!$stmt->execute()){
              echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
            }
            if(!$stmt->bind_result($email)){
              echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
            }
            while($stmt->fetch()){
              echo "<option value=''>" . $email . "</option>\n";
            }
            $stmt->close();
            ?>
          </select>
          <input type="submit" id="getTables" value="Refresh" required="">
        </form>
      </div>
    </div>
  </div>

  <!-- <a id="loginLink" onclick="toggleTable();" href="#">Login</a> -->

  <nav class="navbar navbar-default" role="navigation">
    <ul class="nav navbar-nav pull-left">
      <li><a href="">Filters:</a></li>
      <li><a id="occupation" href="#" >Occupation</a></li>
      <li><a id="region" href="#" >Region</a></li>
      <li><a id="season" href="#" >Season</a></li>
      <li><a id="dateRange" href="#" >Date Range</a></li>
    </ul>
  </nav>
  <br>

  <!-- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ----- -->
  <!--//      ----------------------------------MATCHING  ----------------------------------------------//        ----->
  <!-- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ------- ----- -->

  <!-- MATCH FILTERS -->

  <div class="container-fluid text-center" id="all_matches_div">
    <table class="table" id="matches" align="center">
      <div class="container-fluid text-center">
        <h2> All matches</h2>
      </div>

      <tr>
        <th>ID </th>
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
      ORDER BY locations.lid ASC;"))){
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
        $cphone .  "\n</td>\n<td>\n". $opdesc . "\n</td>\n<td>\n" . $email .  "\n</td>\n</tr>";
      }

      $stmt->close();
      ?>
    </table>
  </div>


  <!-- MATCH FILTER BY OCCUPATION -->
  <div class="container-fluid text-center" id="occupation_matches_div" style="display:none">
    <table class="table" id="matches_occupation" align="center">
      <div class="container-fluid text-center">
        <h2> Matches by occupation</h2>
      </div>
      <tr>
        <th>ID </th>
        <th>Region </th>
        <th>Country</th>
        <th>City</th>
        <th>Coordinator Email</th>
        <th>Coordinator Phone Number</th>
        <th>Opportunity Description</th>
        <th>Volunteer</th>
      </tr>
      <!-- MySqli statements for filling table -->
      <!-- AND volunteers.email = \"dave@moon.com\"; -->
      <?php
      if(!($stmt = $mysqli->prepare("
      SELECT locations.lid, locations.region, locations.country, locations.city, locations.cemail, locations.cphone, locations.opdesc, volunteers.email
      FROM locations
      INNER JOIN volunteers
      WHERE locations.need = volunteers.occupation
      ORDER BY locations.lid ASC;
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
        $cphone .  "\n</td>\n<td>\n". $opdesc . "\n</td>\n<td>\n" . $email .  "\n</td>\n</tr>";
      }

      $stmt->close();
      ?>
    </table>
  </div>




  <!-- MATCHES FILTER BY REGION -->
  <div class="container-fluid text-center" id="region_matches_div" style="display:none">
    <table class="table" id="matches_region" align="center">
      <div class="container-fluid text-center">
        <h2> Matches by region</h2>
      </div>
      <tr>
        <th>ID </th>
        <th>Region </th>
        <th>Country</th>
        <th>City</th>
        <th>Coordinator Email</th>
        <th>Coordinator Phone Number</th>
        <th>Opportunity Description</th>
        <th>Volunteer</th>
      </tr>
      <!-- MySqli statements for filling table -->
      <!-- AND volunteers.email = \"dave@moon.com\" -->
      <?php
      if(!($stmt = $mysqli->prepare("
      SELECT locations.lid, locations.region, locations.country, locations.city, locations.cemail, locations.cphone, locations.opdesc, volunteers.email
      FROM locations
      INNER JOIN volunteers
      WHERE locations.region = volunteers.region
      ORDER BY locations.lid ASC;
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
        $cphone .  "\n</td>\n<td>\n". $opdesc . "\n</td>\n<td>\n" . $email .  "\n</td>\n</tr>";
      }

      $stmt->close();
      ?>
    </table>
  </div>



  <!-- MATCHES FILTER BY TIME -->

  <div class="container-fluid text-center" id="time_matches_div" style="display:none">
    <table class="table" id="matches_time" align="center">
      <div class="container-fluid text-center">
        <h2> Matches by date range</h2>
      </div>
      <tr>
        <th>ID </th>
        <th>Region </th>
        <th>Country</th>
        <th>City</th>
        <th>Coordinator Email</th>
        <th>Coordinator Phone Number</th>
        <th>Opportunity Description</th>
        <th>Volunteer</th>
      </tr>
      <!-- MySqli statements for filling table -->
      <!-- AND volunteers.email = \"dave@moon.com\" -->
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
      ORDER BY locations.lid ASC;
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
        $cphone .  "\n</td>\n<td>\n" . $opdesc . "\n</td>\n<td>\n" .  $email .  "\n</td>\n</tr>";
      }

      $stmt->close();
      ?>
    </table>
  </div>

  <!-- Matches by Season -->

  <div class="container-fluid text-center" id="season_matches_div" style="display:none">
    <table class="table" id="matches_time" align="center">
      <div class="container-fluid text-center">
        <h2> Matches by season</h2>
      </div>
      <tr>
        <th>ID </th>
        <th>Region </th>
        <th>Country</th>
        <th>City</th>
        <th>Coordinator Email</th>
        <th>Coordinator Phone Number</th>
        <th>Opportunity Description</th>
        <th>Volunteer</th>
      </tr>
      <!-- MySqli statements for filling table -->
      <!-- AND volunteers.email = \"dave@moon.com\" -->
      <?php
      if(!($stmt = $mysqli->prepare("
      SELECT locations.lid, locations.region, locations.country, locations.city, locations.cemail, locations.cphone, locations.opdesc, volunteers.email
      FROM locations
      INNER JOIN volunteers
      WHERE volunteers.season = locations.season
      ORDER BY locations.lid ASC;
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
        $cphone .  "\n</td>\n<td>\n" . $opdesc . "\n</td>\n<td>\n" .  $email .  "\n</td>\n</tr>";
      }

      $stmt->close();
      ?>
    </table>
  </div>


  <a href="cleanWaterMain.php">Display the current database</a>

  <script src="home.js"></script>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</body>
</html>



<script>
document.getElementById("occupation").addEventListener("click", showOccupation);
document.getElementById("region").addEventListener("click", showRegion);
document.getElementById("dateRange").addEventListener("click", showTime);
document.getElementById("season").addEventListener("click", showSeason);

function showOccupation() {
  var p1 = document.getElementById("email").value;
  document.getElementById("all_matches_div").style.display="none";
  document.getElementById("region_matches_div").style.display="none";
  document.getElementById("time_matches_div").style.display="none";
  document.getElementById("season_matches_div").style.display="none";
  document.getElementById("occupation_matches_div").style.display="table";
}
function showRegion() {
  document.getElementById("all_matches_div").style.display="none";
  document.getElementById("season_matches_div").style.display="none";
  document.getElementById("region_matches_div").style.display="table";
  document.getElementById("time_matches_div").style.display="none";
  document.getElementById("occupation_matches_div").style.display="none";
}
function showTime() {
  document.getElementById("all_matches_div").style.display="none";
  document.getElementById("season_matches_div").style.display="none";
  document.getElementById("region_matches_div").style.display="none";
  document.getElementById("time_matches_div").style.display="table";
  document.getElementById("occupation_matches_div").style.display="none";
}
function showSeason() {
  document.getElementById("all_matches_div").style.display="none";
  document.getElementById("region_matches_div").style.display="none";
  document.getElementById("time_matches_div").style.display="none";
  document.getElementById("occupation_matches_div").style.display="none";
  document.getElementById("season_matches_div").style.display="table";
}

</script>
