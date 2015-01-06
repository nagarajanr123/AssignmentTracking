<?php

include('classes/instructormaster.php');
$im=new InstructorMaster();

// echo $im->InsertRecord('13','test123','test123','testfirst','testlast','testadd1','testadd2','testcity','teststate','testzip',
// $id,$userid,$password,$firstname,$lastname,$add1,$add2,$city,$state,$zip,$country,$remarks,$active
//echo $im->UpdateRecord(7,13,'mytest1','mytest1','mytest1','mytest1','mytest1','mytest1','mytest1','mytest1','mytest1','mytest1','mytest1','A');
 $res=$im->GetInstructor(7,13);

echo "here";


/*
include('classes/loginmaster.php');
$im=new LoginMaster();
//$im->InsertRecord('test','test','test','test','test','test','test','test','test','A');
//echo $im->Login("admin","admin","American Institute","Admin");
//$im->LandingPage();
//$im->ResetSession();
// $im->SimpleEcho();
echo "here";



include('classes/institutionmaster.php');
$im=new InstitutionMaster();
//$im->InsertRecord('test','test','test','test','test','test','test','test','test','A');
$im->GetInstitutionList();
// $im->SimpleEcho();
echo "here";



include('classes/dbparent.php');
$db= new DBParent();
$conn  = $db->CreateDBConnection();
if ($conn->connect_errno) {
      echo "connection error";
    }

$sql = "SELECT * FROM Institution_Master";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
*/







?>
