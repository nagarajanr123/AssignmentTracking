<?php
include_once('dbparent.php');
class InstitutionMaster extends DBParent
{
  // Institution Master
    
    public function InsertRecord($name,$add1,$add2,$city,$state,$zip,$country,$username,$password,$active)
    {
	$conn  = $this->CreateDBConnection();
	$query='Insert into Institution_Master
		(name,AddressLine1,Addressline2,City,State,Zip,Country,AdminUser,Password,Active)  
		values (';
	$values = "'" . $name . "'," .
			"'" .  $add1 . "'," .
			"'" .  $add2 . "'," .
			"'" .  $city . "'," .
			"'" .  $state . "'," .
			"'" .  $zip . "'," .
			"'" .  $country . "'," .
			"'" .  $username . "'," .
			"'" . $password . "'," .
			"'" . $active ."')";
	$query = $query . $values;
	if (!$conn->query($query)) {
		
		return $conn->error;
	}
	$conn->close();
    }
    public function GetInstitutionList()
    {
	$conn  = $this->CreateDBConnection();
	$query= "select name from Institution_Master where active='A' order by upper(name)";
	$result=$conn->query($query);
	$namelist=array();
	while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
    		$namelist[]= $row[0];
	}
	return $namelist;

    }
    public function SimpleEcho()
    {
  
         echo "test";

    }
    
}
?>
