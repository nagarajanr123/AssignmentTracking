<?php
include('classes/institutionmaster.php');
include('classes/loginmaster.php');
$lm=new LoginMaster();
$lm->LandingPage();
$im=new InstitutionMaster();
$instlist=$im->GetInstitutionList();
$username='';
$pwd='';
$error=false;
if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
{
	$username=$_POST["txtUserName"];
	$pwd=$_POST["txtPassword"];
	$institute=$_POST["selinstitute"];
	$usertype=$_POST["selusertype"];
	$result=$lm->Login($username,$pwd,$institute,$usertype);
	if(!$result) {
	 	$error=true; 
		
	}
	else
	{
		$lm->LandingPage();

	}
		
}	


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login</title>

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
	    <h3 class="panel-title">Login</h3>
	</div>
<?php
if ($error)
{

	echo "<h3 style='color: #ff0000;'> Invalid Credentials, Please try again...</h3>";

}

?>

<div class="panel-body">
	<form class="form-horizontal" method="post" action="login.php" >
	  <div class="form-group">
	    <label for="txtName" class="col-sm-2 control-label">User Name:</label>
<div class="col-sm-10">
	    <input  class="form-control" name="txtUserName" placeholder="User Name" maxlength="30" value="<?php echo $username; ?>" required/>
</div>
	  </div>
  <div class="form-group">
    <label for="txtAdminPassword" class="col-sm-2 control-label">Password:</label>
<div class="col-sm-10">
    <input  class="form-control" name="txtPassword" placeholder="Password" maxlength="20" type="password" required>
</div>
  </div>

 <div class="form-group">
  <label for="usertpe" class="col-sm-2 control-label">Select UserType:</label>
<div class="col-sm-10">
  <select class="form-control" name="selusertype">
    <option>Admin</option>
    <option>Instructor</option>
    <option>Student</option>
  </select>
</div>
</div>

<div class="form-group">
  <label for="txtinstitute" class="col-sm-2 control-label">Select Institution:</label>
<div class="col-sm-10">
  <select class="form-control" name="selinstitute">
<?php

foreach ($instlist as $value) {
     if ($value !="")
     {
     	echo "<option>" . $value . "</option>";
     }
}
?>
    
  </select>
</div>
</div>

<br>
  <div class="col-sm-offset-2 col-sm-10">
  <button type="submit" class="btn btn-default">Submit</button>
</div>
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
