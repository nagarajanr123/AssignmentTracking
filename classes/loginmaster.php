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
			  if(!isset($_SESSION)){
    			  session_start();
			}
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
	if(!isset($_SESSION)){
    		session_start();
	}
	if(isset($_SESSION['usertype']))
	{
		if ($_SESSION['usertype'] == "Admin")
		{
			header("Location:adminlandingpage.php");
			return;
		}
	}
	
    }	

    public function CheckPermission($usertype)
    {
	if(!isset($_SESSION)){
    		session_start();
	}
	if ($_SESSION['usertype'] !== $usertype)
	{
		header("Location:index.php");

	}
    }	
    public function ResetSession()
    {
	
	if(!isset($_SESSION)){
    		session_start();
	}
	$_SESSION['usertype']  = '';
        $_SESSION['username']  = '';
	$_SESSION['institute'] = '';
	$_SESSION['instituteid']='';
	header("Location:index.php");

    }
    public function GetUserType()
    {
	if(!isset($_SESSION)){
    		session_start();
	}
	return $_SESSION['usertype'];
        $_SESSION['username']  = '';
	$_SESSION['institute'] = '';
	$_SESSION['instituteid']='';
    }
    public function GetUsername()
    {
	if(!isset($_SESSION)){
    		session_start();
	}
	return $_SESSION['username'];


    }
    public function GetInstituteName()
    {
	if(!isset($_SESSION)){
    		session_start();
	}
	return $_SESSION['institute'];


    }

    public function GetInstituteID()
    {
	if(!isset($_SESSION)){
    		session_start();
	}
	return $_SESSION['instituteid'];

    }
	

    public function SimpleEcho()
    {
  
         echo "test";

    }
    
}
?>
