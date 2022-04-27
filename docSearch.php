<?php
include("database.php");

$search = $_POST['search'];
$column = $_POST['column'];


$sql = "select * from MEDICAL_STAFF where $column like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
    echo "<head><link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css' integrity='sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu' crossorigin='anonymous'></head>";
    echo "<body><table class='table table-striped'>";
    echo "<tr><td>Doc ID</td><td>First Name</td><td>Last Name</td><td>Specality</td><td>Hours Worked</td></tr>";
    while($row = $result->fetch_assoc() ){
        $id = $row['docid'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $specalty = $row['primary_field'];
        $hours = $row['hours_worked'];
        echo "<tr><td>".$id."</td><td>".$fname."</td><td>".$lname."</td><td>".$specalty."</td><td>".$hours."</td></tr>";
    }
    echo "</table><br><br><a href='index.html'><button class='btn'>Back Home</button></a></body>";

} else {
	echo "0 records";
}

$conn->close();