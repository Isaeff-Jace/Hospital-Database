<?php
include("database.php");

$search = $_POST['search'];
$column = $_POST['column'];


$sql = "select * from PATIENTS where $column like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
    echo "<head><link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css' integrity='sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu' crossorigin='anonymous'></head>";
    echo "<body><table class='table table-striped'>";
    echo "<tr><td>Patient ID</td><td>First Name</td><td>Last Name</td><td>SSN</td></tr>";
    while($row = $result->fetch_assoc() ){
        $id = $row['pid'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $ssn = $row['SSN'];
        echo "<tr><td>".$id."</td><td>".$fname."</td><td>".$lname."</td><td>".$ssn."</td></tr>";
    }
    echo "</table><br><br><a href='index.html'><button class='btn'>Back Home</button></a></body>";

} else {
	echo "0 records";
}

$conn->close();