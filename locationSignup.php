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
  			<a href="landing.html" class="navbar-brand">Home</a>
  		</div>

  		<div>
  			<ul class="nav navbar-nav pull-right">
  				<li><a href="landing.html">Logout</a></li>
  			</ul>
  		</div>
  	</nav>


<!--Form to submit to: addLocation.php and add a volunteer opportunity to the database-->
    <div class="col-md-12">
      <h3 class="header-text">New Volunteer Opportunity</h3>
        <form class="form-group form-style img-rounded" role="form" name="volunteerForm" onsubmit="return compare()" method="post" action="addLocation.php">

          <!--Region-->
          <div class="form-group row">
            <label class="col-md-1">Region:</label>
            <div class="col-md-3">
              <select class="form-control col-md-6" name="region" id="region" required="">
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
                <option value="Australia">Australia</option>
                <option value="newZealand">New Zealand</option>
                <option value="russia">Russia</option>
              </select>
            </div>
          </div>

          <!--Country and City -->
          <div class="form-group row">
            <label class="col-md-1">Country:</label>
            <div class="col-md-3">
              <input class="form-control col-md-6" type="text" name="country" id="country" required="" placeholder="Country">
            </div>

            <label class="col-md-1">City:</label>
            <div class="col-md-3">
              <input class="form-control col-md-6" type="text" name="city" id="city" required="" placeholder="City">
            </div>
          </div>


          <!--Coordinator email and phone number -->
          <div class="form-group row">
            <label class="col-md-1">Coordinator Email:</label>
            <div class="col-md-3">
              <input class="form-control col-md-6" type="text" name="cemail" id="cemail" required="" placeholder="Coordinator email">
            </div>

            <label class="col-md-1">Coordinator Phone:</label>
            <div class="col-md-3">
              <input class="form-control col-md-6" type="text" name="cphone" id="cphone" required="" placeholder="Coordinator phone">
            </div>
          </div>


          <!--Needed occupation and season -->
          <div class="form-group row">
            <label class="col-md-1">Needed Occupation:</label>
            <div class="col-md-3">
              <select class="form-control col-md-6" id="occupation" name="occupation" required="">
                <option value="">Select</option>
                <option value="doctor">Doctor</option>
                <option value="teacher">Teacher</option>
                <option value="engineer">Engineer</option>
                <option value="other">Other</option>
              </select>
            </div>

            <label class="col-md-1">Needed Season:</label>
            <div class="col-md-3">
              <select class="form-control col-md-6" name="season" id="season" required="">
                <option value="">Select</option>
                <option value="winter">Winter</option>
                <option value="spring">Spring</option>
                <option value="summer">Summer</option>
                <option value="fall">Fall</option>
              </select>
            </div>
          </div>


          <!--Needed days -->
          <div class="form-group row">
            <label class="col-md-1">Needed Days:</label>
            <div class="col-md-3">
              <select class="form-control col-md-6" name="days" id="days" required="">
                <option value="">Select</option>
                <option value="oneweek">0-7</option>
                <option value="twoweek">8-14</option>
                <option value="threeweek">15-21</option>
                <option value="moreweek">22+</option>
              </select>
            </div>
          </div>


          <!--Opportunity description -->
          <div class="form-group row">
            <label for="opdesc" class="col-md-1">Opportunity Description (Max 255 characters):</label>
            <div class="col-md-7">
              <textarea class="form-control col-md-6" rows="3" id="opdesc" name="opdesc" maxlength="255" placeholder="Opportunity description"> 
              </textarea>
            </div>  
          </div>


          <div class="form-group row">
            <label class="col-md-1" for="date">Start Date:</label>
            <div class="col-md-3">
              <input class="form-control col-md-6" type="date" name="startDate" id="startDate" required="">
            </div>
                
            <label class="col-md-1">End Date:</label>
            <div class="col-md-3">
              <input class="form-control col-md-3"type="date" name="endDate" id="endDate" required="">
            </div>
          </div>


          <button type="button" class="btn btn-default" onclick="window.location='landing.html'">Cancel</button>
          <button type="submit" id="volunteerSubmit" value="Add Volunteer" class="btn btn-primary"onclick="window.location='landing.html'">Submit</button>
        </form>
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  </body>
</html>
