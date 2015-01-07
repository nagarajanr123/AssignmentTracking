<?php
include_once('dbparent.php');
class SubjectMaster extends DBParent
{
  // Instructor Master
    
    public function InsertRecord($insid,$subject,$remarks,$active)
    {
	$conn  = $this->CreateDBConnection();
	$query='Insert into Subject_Master
		(insid,subjectname,remarks,Active)  
		values (';
	$values = "'" . $insid . "'," .
			"'" .  $subject . "'," .
			"'" .  $remarks . "'," .
			"'" . $active ."')";
	$query = $query . $values;
	if (!$conn->query($query)) {
		
		return $conn->error;
	}
	$conn->close();
    }
    public function UpdateRecord($id,$instid,$subject,$remarks,$active)
    {
	$conn  = $this->CreateDBConnection();
	$query="Update Subject_Master
		set subjectname =" . "'" . $subject . "',  
		 Remarks =" . "'" . $remarks . "',  
		 Active = " . "'" . $active . "' where id=" . $id . " and insid =". $instid;  
	if (!$conn->query($query)) {
		
		return $conn->error;
	}
	$conn->close();
    }
    public function GetSubjectList($insid)
    {
	$conn  = $this->CreateDBConnection();
	$query= "select subjectname, active,id from Subject_Master where insid ='" . $insid . "' order by upper(subjectname)";
	$result=$conn->query($query);
	$namelist=array();
	while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
    		$namelist[]= array($row[0],$row[1],$row[2]);
	}
	return $namelist;

    }
   public function GetSubject($id,$insid)
    {
	$conn  = $this->CreateDBConnection();
	$query= "select subjectname,remarks,active from Subject_Master where id =" . $id . " and insid =". $insid; 
	$result=$conn->query($query);
	$name=array();
	while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
    		$name[]= array($row[0],$row[1],$row[2]);
	}
	return $name;

    }
    public function SimpleEcho()
    {
  
         echo "test";

    }
    
}
?>