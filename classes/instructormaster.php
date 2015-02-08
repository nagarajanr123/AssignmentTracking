<?php
include_once('dbparent.php');
class InstructorMaster extends DBParent
{
  // Instructor Master
    
    public function InsertRecord($insid,$userid,$password,$firstname,$lastname,$add1,$add2,$city,$state,$zip,$country,$remarks,$active)
    {
	$conn  = $this->CreateDBConnection();
	$query='Insert into Instructor_Master
		(insid,userid,password,firstname,lastname,Addressline1,Addressline2,City,State,Zip,Country,Remarks,Active)  
		values (';
	$values = "'" . $insid . "'," .
			"'" .  $userid . "'," .
			"'" .  $password . "'," .
			"'" .  $firstname . "'," .
			"'" .  $lastname . "'," .
			"'" .  $add1 . "'," .
			"'" .  $add2 . "'," .
			"'" .  $city . "'," .
			"'" .  $state . "'," .
			"'" .  $zip . "'," .
			"'" .  $country . "'," .
			"'" .  $remarks . "'," .
			"'" . $active ."')";
	$query = $query . $values;
	if (!$conn->query($query)) {
		
		return $conn->error;
	}
	$conn->close();
    }
    public function UpdateRecord($id,$instid,$userid,$password,$firstname,$lastname,$add1,$add2,$city,$state,$zip,$country,$remarks,$active)
    {
	$conn  = $this->CreateDBConnection();
	$query="Update Instructor_Master
		set userid =" . "'" . $userid . "',  
		 password =" . "'" . $password . "',  
		 firstname =" . "'" . $firstname . "',  
		 lastname =" . "'" . $lastname . "',  
		 Addressline1 =" . "'" . $add1 . "',  
		 Addressline2 =" . "'" . $add2 . "',  
		 City =" . "'" . $city . "',  
		 State =" . "'" . $state . "',  
		 Zip =" . "'" . $zip . "',  
		 Country =" . "'" . $country . "',  
		 Remarks =" . "'" . $remarks . "',  
		 Active = " . "'" . $active . "' where id=" . $id . " and insid =". $instid;  
	if (!$conn->query($query)) {
		
		return $conn->error;
	}
	$conn->close();
    }
    public function GetInstructorList($insid)
    {
	$conn  = $this->CreateDBConnection();
	$query= "select userid,firstname,lastname,active,id from Instructor_Master where insid ='" . $insid . "' order by upper(firstname)";
	$result=$conn->query($query);
	$namelist=array();
	while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
    		$namelist[]= array($row[0],$row[1],$row[2],$row[3],$row[4]);
	}
	return $namelist;

    }
      public function GetInstructor($id,$insid)
    {
	$conn  = $this->CreateDBConnection();
	$query= "select userid,firstname,lastname,Addressline1,Addressline2,city,state,zip,country,remarks,active from Instructor_Master where 		id =" . $id . " and insid =". $insid; 
	$result=$conn->query($query);
	$name=array();
	while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
    		$name[]= array($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10]);
	}
	return $name;

    }
    public function SimpleEcho()
    {
  
         echo "test";

    }
    
}
?>
