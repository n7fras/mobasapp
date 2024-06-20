<?php
session_start();

// Inisialisasi variabel error
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

    // Query ke database untuk memeriksa keberadaan pengguna dengan username dan password yang sesuai
    $query = "SELECT * FROM karyawan WHERE Nama='$username' AND pw_kry='$password'";
    $result = $conn->query($query);

    // Periksa apakah pengguna ditemukan
    if ($result->num_rows > 0) {
        // Pengguna ditemukan, buat sesi login
        $_SESSION['login_user'] = $username;
        // Redirect ke halaman Menu.php
        header("Location: MOBAS.php");
        exit(); // Pastikan untuk menghentikan eksekusi skrip setelah melakukan redirect
    } else {
        // Jika pengguna tidak ditemukan, set variabel error untuk menampilkan pesan kesalahan di halaman
        $error = "Nama pengguna atau kata sandi salah.";
    }

    // Tutup koneksi
    $conn->close();
}
?>
