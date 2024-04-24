<?php
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
        echo "<script>window.location.href = 'Menu.html';</script>"; // Redirect setelah pesan alert
    } else {
        // Jika pengguna tidak ditemukan, set variabel $error untuk menampilkan pesan kesalahan di halaman
        $error = "Nama pengguna atau kata sandi salah.";
    }

    // Tutup koneksi
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOBAS</title>
    <link rel="stylesheet" href="login.css">
    <!-- Memindahkan kode JavaScript ke atas -->
   
</head>
<body>
    <img src="./Gambar/Logofix.png" alt="Logo">
    <nav class="container_login">
        <div>
            <h1> MOBENG <br> Administrator</h1>
        </div>
        <div>
            <form action="" method="post" class="kotaklogin">
                <label for="uname">Username</label><br>
                <input type="text" placeholder="Enter Your Username" id="uname" name="uname"> <br>
                <label for="pass">Password</label><br>
                <input type="password" placeholder="Enter Your Password" id="pass" name="pass"><br><br>
                <button type="submit">Login</button>
                <?php if(isset($error)) { ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php } ?>
            </form>
        </div>
    </nav>
</body>
</html>
