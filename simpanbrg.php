<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kd_brg = htmlspecialchars( $_POST['kd_brg']);
    $Nama_brg =htmlspecialchars( $_POST['Nama']);
    $merek = htmlspecialchars($_POST['Merk']);  // Perbaiki nama field sesuai dengan form
    $stok = htmlspecialchars($_POST['stok']);
    $harga = htmlspecialchars($_POST['harga']);
    $gambar = '';

    // Menangani upload file jika ada
    if (!empty($_FILES["gambar"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek apakah file benar-benar gambar
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "<script>alert('File bukan gambar.');window.location='databrg.php';</script>";
            $uploadOk = 0;
        }

        // Cek jika file sudah ada
        if (file_exists($target_file)) {
            echo "<script>alert('Maaf, file sudah ada.');window.location='databrg.php';</script>";
            $uploadOk = 0;
        }

        // Cek ukuran file
        if ($_FILES["gambar"]["size"] > 500000) {  // Batas ukuran file 500KB
            echo "<script>alert('Maaf, file terlalu besar.');window.location='+brg.php';</script>";
            $uploadOk = 0;
        }

        // Hanya izinkan format tertentu
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "<script>alert('Maaf, hanya file JPG, JPEG, PNG yang diperbolehkan.');window.location='beranda.php';</script>";
            $uploadOk = 0;
        }

        // Cek jika $uploadOk bernilai 0
        if ($uploadOk == 0) {
            echo "<script>alert('Maaf, file tidak terupload.');window.location='sidebare.php';</script>";
        } else {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                $gambar = basename($_FILES["gambar"]["name"]);
            } else {
                echo "<script>alert('Maaf, terjadi kesalahan saat mengupload file.');window.location='beranda.php';</script>";
            }
        }
    }

    // Validate input data
    if (!empty($kd_brg) && !empty($Nama_brg) && !empty($merek) && !empty($stok) && !empty($harga)) {
        // Execute SQL query to save data to database
        $sql = "INSERT INTO Barang (kd_brg, Nama_Brg, Merek, stok, harga, Gambar) VALUES ('$kd_brg', '$Nama_brg', '$merek', '$stok', '$harga', '$gambar')";
        $query = mysqli_query($koneksi, $sql);

        // Provide feedback to the user
        if ($query) {
            echo "<script>alert('Data Tersimpan'); window.location='databrg.php';</script>";
        } else {
            echo "<script>alert('Data Tidak Tersimpan: " . mysqli_error($koneksi) . "');</script>";
        }
    } else {
        echo "<script>alert('Semua data harus diisi');window.location='+brg.php';</script>";
    }
}
?>
