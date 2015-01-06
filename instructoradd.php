<?php
 include('classes/loginmaster.php');
include('classes/instructormaster.php');
$lm=new LoginMaster();
$lm->CheckPermission($lm->GetUserType());
$im=new InstructorMaster();
$uid='';
if(isset($_GET['id'])) 
{
    $uid=$_GET['id'];
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
      <title>Add or Modify Instructor</title>
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
            <li class="active"><a href="logout.php">Logout</a></li>
               </ul>
	  <p class="navbar-text"> <?php echo $lm->GetInstituteName(); ?> &nbsp;&nbsp;&nbsp;:Logged in as <?php echo $lm->GetUsername(); ?></p> 
 
            </div>
            <!--/.nav-collapse -->
            <h1 style="color: #00ff00;"> Assignment and Reference Tracking Aid for Students </h1>
         </div>
      </nav>
      <div class="container theme-showcase" role="main">
         <div class="panel panel-success">
            <div class="panel-heading">
               <h3 class="panel-title">Add/Modify Instructor</h3>
            </div>
            <?php
	       $username='';
               $firstname='';
               $lastname='';
               $add1='';
               $add2='';
               $city='';
               $state='';
               $zip='';
               $country='';
               $pwd='';
	       $remarks='';
               $active='';
               $activedb='';
               $success=false;
	
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'GET' && $uid!='')
		{
		  
		  $res=$im->GetInstructor($uid,$lm->GetInstituteID());
		    
		   $username=$res[0][0];
               	   $firstname=$res[0][1];
                   $lastname=$res[0][2];
                   $add1=$res[0][3];
                   $add2=$res[0][4];
                   $city=$res[0][5];
                   $state=$res[0][6];
                   $zip=$res[0][7];
                   $country=$res[0][8];
	           $remarks=$res[0][9];
                   $active=$res[0][10];
		   if($active=='A')
		   {
			$active='checked';
		   }
		}	
		
               
               if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
               
               {
               
               	$username=$_POST["txtUserName"];
                $lastname=$_POST["txtLastName"];
               	$firstname=$_POST["txtFirstName"];
               	$remarks=$_POST["txtRemarks"];
               	$add1=$_POST["txtAddressLine1"];
               	$add2=$_POST["txtAddressLine2"];
               	$city=$_POST["txtCity"];
               	$state=$_POST["txtState"];
               	$zip=$_POST["txtZip"];
               	$country=$_POST["txtCountry"];
               	$pwd=$_POST["txtPassword"];
               	$uid=$_POST["uid"];
               	if (isset($_POST["chkActive"])) {
               
               	    $active="checked";
               
               	    $activedb='A';
               
               	};
		if ($uid=='')
		{

 	             //  $insid,$userid,$password,$firstname,$lastname,$add1,$add2,$city,$state,$zip,$country,$remarks,$active
	               	$res=$im->InsertRecord($lm->GetInstituteID(),$username,$pwd,$firstname,
			$lastname,$adresd1,$add2,$city,$state,$zip,$country,$remarks,$activedb);
		}
		else
		{
	//		$id,$instid,$userid,$password,$firstname,$lastname,$add1,$add2,$city,$state,$zip,$country,$remarks,$active
			$res=$im->UpdateRecord($uid,$lm->GetInstituteID(),$username,$pwd,$firstname,
			$lastname,$add1,$add2,$city,$state,$zip,$country,$remarks,$activedb);

		}
               
               	
               
               	if($res==""){
               
               		$success=true;
               
               	}
               
               }	
               
               
               
               ?>
            <?php 
               if ($success)
               
               {
               
               
               
               	echo "<h3 style='color: #006400;'> Successfully Added...</h3>"; ?>

               <div class="panel panel-success">
         	   <ul class="nav nav-pills">
		<?php if ($uid=='') { ?>
	  	<li role="presentation" class="active"><a href="instructoradd.php">Add One More Instructor</a></li>
		<?php } ?>
		&nbsp;&nbsp;
		<li role="presentation" class="active"><a href="adminlandingpage.php">Home</a></li>

		   </ul>

		</div>
               
               <?php
               }
               
               
               
               else
               
               {
               
               	if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')	
               
               	{
               
               		echo "<h3 style='color: #FF0000;'> User Name  already exist or Invalid data, Please try again...</h3>";
               
               	}
               
               
               
               
               
               ?>
            <div class="panel-body" >
               <form class="form-horizontal"  method="post" action="instructoradd.php" >
                 <div class="form-group">
                     <label for="txtUserName" class="col-sm-2 control-label">User Name:</label>
                     <div class="col-sm-10">
                        <input  class="form-control" name="txtUserName" placeholder="User Name" maxlength="20"value="<?php echo $username; ?>" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="txtPassword" class="col-sm-2 control-label">Password:</label>
                     <div class="col-sm-10">
                        <input  class="form-control" name="txtPassword" placeholder="Password" maxlength="20" type="password" required>
                     </div>
                  </div>
                 <div class="form-group">
                     <label for="txtFirstName" class="col-sm-2 control-label">First Name:</label>
                     <div class="col-sm-10">
                        <input  class="form-control" name="txtFirstName" placeholder="User Name" maxlength="30"value="<?php echo $firstname; ?>" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="txtLastName" class="col-sm-2 control-label">Last Name:</label>
                     <div class="col-sm-10">
                        <input  class="form-control" name="txtLastName" placeholder="User Name" maxlength="30"value="<?php echo $lastname; ?>" required>
                     </div>

                  </div>
		  <input type="hidden" name="uid" value="<?php echo $uid; ?>"/>
                  <div class="form-group">
                     <label for="txtAddressLine1" class="col-sm-2 control-label">Address Line 1:</label>
                     <div class="col-sm-10">
                        <input  class="form-control" name="txtAddressLine1" placeholder="Address Line 1" maxlength="30" value="<?php echo $add1; ?>" required />
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="txtAddressLine2" class="col-sm-2 control-label">Address Line 2: </label> 
                     <div class="col-sm-10">
                        <input  class="form-control" name="txtAddressLine2" placeholder="Address Line 2" maxlength="30" value="<?php echo $add2; ?>" required />
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="txtcity" class="col-sm-2 control-label">City:</label>
                     <div class="col-sm-10">
                        <input  class="form-control" name="txtCity" placeholder="City" maxlength="20" value="<?php echo $city; ?>" required/>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="txtState" class="col-sm-2 control-label">State:</label>
                     <div class="col-sm-10">
                        <input  class="form-control" name="txtState" placeholder="State" maxlength="20" value="<?php echo $state; ?>" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="txtZip" class="col-sm-2 control-label">Zip Code:</label>
                     <div class="col-sm-10">
                        <input  class="form-control" name="txtZip" placeholder="Zip Code" maxlength="10" value="<?php echo $zip; ?>" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="txtCountry" class="col-sm-2 control-label">Country:</label>
                     <div class="col-sm-10">
                        <input  class="form-control" name="txtCountry" placeholder="Country:" maxlength="30" value="<?php echo $country; ?>" required>
                     </div>
                  </div>

		<div class="form-group">
		  <label for="txtRemarks" class="col-sm-2 control-label">Comment:</label>
		  <div class="col-sm-10">
	  		  <textarea class="form-control" rows="5" name="txtRemarks" maxlength="200" value="<?php echo $remarks; ?>" ></textarea>
		  </div>
		</div>
 
                  <div class="checkbox">
                     <div class="col-sm-offset-2 col-sm-10">
                        <input type="checkbox" name="chkActive" <?php echo $active; ?> > Active
                     </div>
                  </div>
                  <br>
                  <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-default">Submit</button>
                  </div>
               </form>
            </div>
            <?php
               }
               
               ?>
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
