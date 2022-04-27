<?php
include("database.php");

$status = $_POST['status'];
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$field = $_POST['primary_field'];
$hours = $_POST['hours_worked'];

if ($status == "INSERT"){
    $sql = "INSERT INTO MEDICAL_STAFF (fname, lname, primary_field, hours_worked) VALUES ('$firstname', '$lastname', '$field', $hours)";
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