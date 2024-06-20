
    
<?php
include 'koneksi.php';

// Ambil parameter dari URL
$kode = $_GET['kode'];
$action = $_GET['action'];

// Tentukan status berdasarkan action
$status = '';
if ($action == 'deactivate') {
    $status = 'NonAktif'; // atau status lain yang sesuai
} elseif ($action == 'reactivate') {
    $status = 'Aktif'; // atau status lain yang sesuai
}

// Update status di database
if ($status) {
    $query = "UPDATE karyawan SET status_kry = '$status' WHERE NK = '$kode'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Status berhasil diubah'); window.location='datakry.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah status'); window.location='datakry.php';</script>";
    }
} else {
    echo "<script>alert('Aksi tidak valid'); window.location='datakry.php';</script>";
}
?>
