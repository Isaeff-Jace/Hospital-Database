<?php
include("database.php");

$status = $_POST['status'];
$pid = $_POST['pid'];
$docid = $_POST['docid'];
$date = $_POST['date'];
$diagnosis = $_POST['diagnosis'];
$treatment = $_POST['treatment'];

if ($status == "INSERT"){
    $sql = "INSERT INTO RECORD (pid, docid, date, diagnosis, treatment) VALUES ('$pid', '$docid', '$date', '$diagnosis', '$treatment')";
}
elseif ($status == "DELETE") {
    $sql = "DELETE FROM RECORD WHERE pid like '$pid' and docid like '$docid'";
}
else{
    echo "action failed...";
}

$result = $conn->query($sql);

echo "<h1>Action Completed</h1>";
echo "<a href='index.html'><button class='btn'>Return Home</button></a>";

$conn->close();
?>