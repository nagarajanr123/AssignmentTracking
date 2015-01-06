<?php
include_once('dbparent.php');
class LoginMaster extends DBParent
{
  // Login Master
    
    public function Login($username,$password,$institute,$usertype)
    {
	$loggedin=false;
	$conn  = $this->CreateDBConnection();
	switch ($usertype) {
	    case "Admin":
		$query= "select adminuser, password, id from Institution_Master where name='" . $institute . "'";
		$result=$conn->query($query);
		while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
		if ($row[0]==$username AND $row[1]==$password)
			{
			   session_start();
			   $_SESSION['usertype']  = $usertype;
			   $_SESSION['username']  = $username;
			   $_SESSION['institute'] = $institute;	
			   $_SESSION['instituteid']=$row[2];
			   $loggedin=true;
			}
    			
		}
	        break;
	    default:
	}

	return $loggedin;

    }
    public function LandingPage()
    {
	session_start();
	if ($_SESSION['usertype'] == "Admin")
	{
		header("Location:adminlandingpage.php");
		return;
	}
	// header("Location:index.php");
    }	

    public function CheckPermission($usertype)
    {
	session_start();
	if ($_SESSION['usertype'] !== $usertype)
	{
		header("Location:index.php");

	}
    }	
    public function ResetSession()
    {
	
	session_start();
	$_SESSION['usertype']  = '';
        $_SESSION['username']  = '';
	$_SESSION['institute'] = '';
	$_SESSION['instituteid']='';
	header("Location:index.php");

    }	

    public function SimpleEcho()
    {
  
         echo "test";

    }
    
}
?>
