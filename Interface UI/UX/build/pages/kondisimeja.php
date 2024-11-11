<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "TapSit";
$dbname = "projiot";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT meja, rfid, batt FROM test2";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
echo json_encode($data);

$conn->close();
?>
