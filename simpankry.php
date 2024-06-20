<?php
include 'koneksi.php';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
    $NoKry = htmlspecialchars($_POST['NIK']);
    $Nama = htmlspecialchars($_POST['Nama']);
    $Jabatan = htmlspecialchars($_POST['Jabatan']);
    $NoHp = htmlspecialchars($_POST['No_Hp']);
    $pw = htmlspecialchars($_POST['pw']);
    $status=htmlspecialchars($_POST['status']);

    // Validate input data
    if (!empty($NoKry) && !empty($Nama) && !empty($Jabatan) && !empty($NoHp) && !empty($pw)) {
        // Execute SQL query to save data to database
        $sql = "INSERT INTO karyawan (NK, Nama, Jabatan, no_HP, pw_kry, status_kry) VALUES ('$NoKry', '$Nama', '$Jabatan', '$NoHp', '$pw', '$status')";
        $query = mysqli_query($koneksi, $sql);

        // Provide feedback to the user
        if ($query) {
            echo "<script>alert('Data Tersimpan'); window.location='datakry.php';</script>";
        } else {
            echo "<script>alert('Data Tidak Tersimpan: " . mysqli_error($koneksi) . "');</script>";
        }
    } else {
        echo "<script>alert('Semua data harus diisi');window.location='sidebare.php';</script>";
        
    }
}

?>