

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
  			<a href="home.php" class="navbar-brand">Home</a>
  		</div>

  		<div>
  			<ul class="nav navbar-nav pull-right">
  				<li><a href="landing.html">Login</a></li>
  			</ul>
  		</div>
  	</nav>

<!--Form to submit to: addVolunteer.php and add a volunteer to the database-->
    <div class="col-md-12">
         <h3 class="header-text">New User Profile</h3>
        <form class="form-group form-style img-rounded" role="form" name="volunteerForm" onsubmit="return compare()" method="post" action="addVolunteer.php">

            <!--First name and Last name -->
            <div class="form-group row">
                <label class="col-md-1" for="text">First Name:</label>
                <div class="col-md-3">
                    <input class="form-control col-md-6" type="text" name="fname" id="fname" required="" placeholder="First name">
                </div>

                <label class="col-md-1" for="text">Last Name:</label>
                <div class="col-md-3">
                    <input class="form-control col-md-6" type="text" name="lname" id="lname" required="" placeholder="Last name">
                </div>
            </div>

            <!--email-->
            <div class="form-group row">
                <label class="col-md-1" for="text">Email:</label>
                <div class="col-md-3">
                    <input class="form-control col-md-6" type="text" id="email" name="email" placeholder="email">
                </div>

            <!--Occupation: Drop-down list-->
                <label class="col-md-1">Occupation:</label>
                <div class="col-md-3">
                    <select class="form-control col-md-6" name="occupation" required="">
                        <option value="">Select</option>
                        <option value="doctor">Doctor</option>
                        <option value="teacher">Teacher</option>
                        <option value="engineer">Engineer</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <!--Season Available-->
                <label class="col-md-1">Season:</label>
                <div class="col-md-3">
                    <select class="form-control col-md-6" name="season" required="">
                        <option value="">Select</option>
                        <option value="winter">Winter</option>
                        <option value="spring">Spring</option>
                        <option value="summer">Summer</option>
                        <option value="fall">Fall</option>
                    </select>
                </div>

                <!--Days Available-->
                <label class="col-md-1">Days:</label>
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

            <div class="form-group row">
                <!--Region-->
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
                        <option value="australia">Australia</option>
                        <option value="newZealand">New Zealand</option>
                        <option value="russia">Russia</option>
                    </select>
                </div>
            </div>

            <!--
            <label> Occupation:
                <input type="text" name="occupation" id="occupation">
            </label>
            -->
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
            <button type="submit" id="volunteerSubmit" value="Add Volunteer" class="btn btn-primary"onclick="window.location='home.html'">Submit</button>
        </form>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  </body>
</html>
