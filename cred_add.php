<?php
include("database.php");

$status = $_POST['status'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$cred = $_POST['certification'];

if ($status == "INSERT"){
    $sql = "INSERT INTO CREDENTIALS (fname, lname, certification) VALUES ('$fname', '$lname', '$cred')";
}
elseif ($status == "DELETE") {
    $sql = "DELETE FROM CREDENTIALS WHERE fname like '%$fname%' and lname like '%$lname%' and certification like '%$cred%'";
}
else{
    echo "action failed...";
}

$result = $conn->query($sql);

echo "<h1>Action Completed</h1>";
echo "<a href='index.html'><button class='btn'>Return Home</button></a>";

$conn->close();
?>