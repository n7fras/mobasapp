<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobeng";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data karyawan dari database
$sql = "SELECT NK,Nama,jabatan,no_Hp from karyawan";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}

// Mengembalikan data dalam format JSON
echo json_encode($data);

$conn->close();
?>
