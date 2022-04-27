<?php
include("database.php");

$search = $_POST['search'];
$column = $_POST['column'];


$sql = "select * from RECORD where $column like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
    echo "<head><link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css' integrity='sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu' crossorigin='anonymous'></head>";
    echo "<body><table class='table table-striped'>";
    echo "<tr><td>Encounter ID</td><td>Patient ID</td><td>Doctor ID</td><td>Date</td><td>Diagnosis</td><td>Treatment</td></tr>";
    while($row = $result->fetch_assoc() ){
        $eid = $row['encounterid'];
        $pid = $row['pid'];
        $docid = $row['docid'];
        $date = $row['date'];
        $diagnosis = $row['diagnosis'];
        $treatment = $row['treatment'];
        echo "<tr><td>".$eid."</td><td>".$pid."</td><td>".$docid."</td><td>".$date."</td><td>".$diagnosis."</td><td>".$treatment."</td></tr>";
    }
    echo "</table><br><br><a href='index.html'><button class='btn'>Back Home</button></a></body>";

} else {
	echo "0 records";
}

$conn->close();