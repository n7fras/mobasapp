<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim dari formulir
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "mobeng");

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query ke database
    $query = "SELECT * FROM karyawan WHERE Nama='$username' AND pw_kry='$password'";
    $result = $conn->query($query);

    // Periksa apakah pengguna ditemukan
    if ($result->num_rows > 0) {
        // Pengguna ditemukan, buat sesi
        $_SESSION['login_user'] = $username;
        echo "<script>alert('Login Berhasil')</script>";
        echo "<script>window.location.href ='beranda.php';</script>"; // Redirect setelah pesan alert
    } else {
        // Jika pengguna tidak ditemukan, set variabel $error untuk menampilkan pesan kesalahan di halaman
        $error = "Nama pengguna atau kata sandi salah.";
    }

    // Tutup koneksi
    $conn->close();
}
?>