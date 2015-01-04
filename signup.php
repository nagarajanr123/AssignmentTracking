<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Theme Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body role="document"  >

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse ">
       <div class="container">
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
          </ul>
        </div><!--/.nav-collapse -->

       <h1 style="color: #00ff00;"> Assignment and Reference Tracking Aid for Students </h1>
      
      </div>
    </nav>
   <div class="container theme-showcase" role="main">

	<div class="panel panel-success">
	<div class="panel-heading">
	    <h3 class="panel-title">Create New Institution</h3>
	</div>
	<div class="panel-body">
<form class="form-horizontal" >
  <div class="form-group">
    <label for="txtName">Institution Name:</label>
    <input  class="form-control" id="txtInstitutionName" placeholder="Institution Name" maxlength="30"  required>
  </div>
  <div class="form-group">
    <label for="txtAddressLine1">Address Line 1:</label>
    <input  class="form-control" id="txtAddressLine1" placeholder="Address Line 1" maxlength="30" required>
  </div>
  <div class="form-group">
    <label for="txtAddressLine2">Address Line 2:</label> 
    <input  class="form-control" id="txtAddressLine2" placeholder="Address Line 2" maxlength="30" required>
  </div>
  <div class="form-group">
    <label for="txtcity">City:</label>
    <input  class="form-control" id="txtCity" placeholder="City" maxlength="20" required>
  </div>
  <div class="form-group">
    <label for="txtState">State:</label>
    <input  class="form-control" id="txtState" placeholder="State" maxlength="20" required>
  </div>
  <div class="form-group">
    <label for="txtZip">Zip Code:</label>
    <input  class="form-control" id="txtZip" placeholder="Zip Code" maxlength="10" required>
  </div>
  <div class="form-group">
    <label for="txtCountry">Country:</label>
    <input  class="form-control" id="txtCountry" placeholder="Country:" maxlength="30" required>
  </div>
  <div class="form-group">
    <label for="txtAdminUser">Admin User:</label>
    <input  class="form-control" id="txtAdminUser" placeholder="User Name" maxlength="20" required>
  </div>
  <div class="form-group">
    <label for="txtAdminPassword">Password:</label>
    <input  class="form-control" id="txtPassword" placeholder="Password" maxlength="20" required>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="chkActive"> Active
    </label>
  </div>
<br>
  <button type="submit" class="btn btn-default">Submit</button>
</form>    		

	</div>

	</div>

    </div>      

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src=""assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
