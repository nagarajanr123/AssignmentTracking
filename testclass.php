<?php
include('classes/institutionmaster.php');
$im=new InstitutionMaster();
//$im->InsertRecord('test','test','test','test','test','test','test','test','test','A');
$im->GetInstitutionList();
// $im->SimpleEcho();
echo "here";


/*
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
