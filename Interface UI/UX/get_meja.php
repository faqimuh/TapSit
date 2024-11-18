<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = "TapSit"; // Ganti dengan password database Anda
$dbname = "projiot"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data meja
$sql = "SELECT meja, rfid FROM test2";
$result = $conn->query($sql);

$mejaData = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $mejaData[] = $row;
    }
}

$conn->close();

// Mengirim data dalam format JSON
header('Content-Type: application/json');
echo json_encode($mejaData);
?>
