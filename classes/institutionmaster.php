<?php
include('dbparent.php');
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
	echo $query;
	$conn->query($query);
	printf ("New Record has id %d.\n", $conn->insert_id);
	$conn->close();

    }
    public function SimpleEcho()
    {
  
         echo "test";

    }
    
}

?>