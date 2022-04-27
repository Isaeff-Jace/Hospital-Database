<?php
include("database.php");

$status = $_POST['status'];
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$ssn = $_POST['SSN'];

if ($status == "INSERT"){
    $sql = "INSERT INTO PATIENTS (fname, lname, SSN) VALUES ('$firstname', '$lastname', '$ssn')";
}
elseif ($status == "DELETE") {
    $sql = "DELETE FROM MEDICAL_STAFF WHERE fname like '%$firstname%' and lname like '%$lastname%'";
}
else{
    echo "action failed...";
}

$result = $conn->query($sql);

echo "<h1>Action Completed</h1>";
echo "<a href='index.html'><button class='btn'>Return Home</button></a>";

$conn->close();
?>