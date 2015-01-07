<?php
 include('classes/loginmaster.php');
include('classes/subjectmaster.php');
$lm=new LoginMaster();
$lm->CheckPermission($lm->GetUserType());
$im=new SubjectMaster();
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
               <h3 class="panel-title">Add/Modify Subject</h3>
            </div>
            <?php
	       $username='';
               $subjectname='';
	       $remarks='';
               $active='';
               $activedb='';
               $success=false;
	
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'GET' && $uid!='')
		{
		  
		  $res=$im->GetSubject($uid,$lm->GetInstituteID());
		    
		   $subjectname=$res[0][0];
               	   $remarks=$res[0][1];
                   $active=$res[0][2];
		   if($active=='A')
		   {
			$active='checked';
		   }
		}	
		
               
               if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
               
               {
               
               	$subjectname=$_POST["txtSubjectName"];
               	$remarks=$_POST["txtRemarks"];
               	$uid=$_POST["uid"];
               	if (isset($_POST["chkActive"])) {
               
               	    $active="checked";
               
               	    $activedb='A';
               
               	};
		if ($uid=='')
		{

 	             //  $insid,$userid,$password,$firstname,$lastname,$add1,$add2,$city,$state,$zip,$country,$remarks,$active
	               	$res=$im->InsertRecord($lm->GetInstituteID(),$subjectname,$remarks,$activedb);
		}
		else
		{
	//		$id,$instid,$userid,$password,$firstname,$lastname,$add1,$add2,$city,$state,$zip,$country,$remarks,$active
			$res=$im->UpdateRecord($uid,$lm->GetInstituteID(),$subjectname,$remarks,$activedb);

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
	  	<li role="presentation" class="active"><a href="subjectadd.php">Add One More Subject</a></li>
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
               
               		echo "<h3 style='color: #FF0000;'> Subject  already exist or Invalid data, Please try again...</h3>";
               
               	}
               
               
               
               
               
               ?>
            <div class="panel-body" >
               <form class="form-horizontal"  method="post" action="subjectadd.php" >
                 <div class="form-group">
                     <label for="txtSubjectName" class="col-sm-2 control-label">Subject Name:</label>
                     <div class="col-sm-10">
                        <input  class="form-control" name="txtSubjectName" placeholder="User Name" maxlength="30"value="<?php echo $subjectname; ?>" required>
                     </div>
                  </div>
		  <input type="hidden" name="uid" value="<?php echo $uid; ?>"/>
		<div class="form-group">
		  <label for="txtRemarks" class="col-sm-2 control-label">Comment:</label>
		  <div class="col-sm-10">
	  		  <textarea class="form-control" rows="5" name="txtRemarks" maxlength="200"  ><?php echo $remarks; ?></textarea>
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
