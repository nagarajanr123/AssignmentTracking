<?php
include_once('dbparent.php');
class StudentMaster extends DBParent
{
  // Instructor Master
    
    public function InsertRecord($insid,$userid,$password,$firstname,$lastname,$add1,$add2,$city,$state,$zip,$country,$remarks,$email,$active)
    {
	$conn  = $this->CreateDBConnection();
	$query='Insert into Student_Master
		(insid,userid,password,firstname,lastname,Addressline1,Addressline2,City,State,Zip,Country,Remarks,email,Active)  
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
			"'" .  $email . "'," .
			"'" . $active ."')";
	$query = $query . $values;
	if (!$conn->query($query)) {
		
		return $conn->error;
	}
	$conn->close();
    }
    public function UpdateRecord($id,$instid,$userid,$password,$firstname,$lastname,$add1,$add2,$city,$state,$zip,$country,$remarks,$email,$active)
    {
	$conn  = $this->CreateDBConnection();
	$query="Update Student_Master
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
		 email =" . "'" . $email . "',  
		 Active = " . "'" . $active . "' where id=" . $id . " and insid =". $instid;  
	if (!$conn->query($query)) {
		
		return $conn->error;
	}
	$conn->close();
    }
    public function GetStudentList($insid)
    {
	$conn  = $this->CreateDBConnection();
	$query= "select userid,firstname,lastname,active,id from Student_Master where insid ='" . $insid . "' order by upper(firstname)";
	$result=$conn->query($query);
	$namelist=array();
	while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
    		$namelist[]= array($row[0],$row[1],$row[2],$row[3],$row[4]);
	}
	return $namelist;

    }
   public function GetStudentSubject($insid,$subjectid)
    {
	$conn  = $this->CreateDBConnection();

	$query= "select userid,firstname,lastname,active,id, (select id from Subject_Student_Link where
		 subjectid=" . $subjectid . " and insid=" . $insid . " and userid=a.id) as Enabled
  	         from Student_Master a where insid =" . $insid . " order by upper(firstname)";
	
	$result=$conn->query($query);
	$namelist=array();
	while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
    		$namelist[]= array($row[0],$row[1],$row[2],$row[3],$row[4]);
	}
	return $namelist;

   }
   public function GetStudent($id,$insid)
    {
	$conn  = $this->CreateDBConnection();
	$query= "select userid,firstname,lastname,Addressline1,Addressline2,city,state,zip,country,remarks,active,email from Student_Master where 		id =" . $id . " and insid =". $insid; 
	$result=$conn->query($query);
	$name=array();
	while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
    		$name[]= array($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11]);
	}
	return $name;

    }
    public function SimpleEcho()
    {
  
         echo "test";

    }
    
}
?>
