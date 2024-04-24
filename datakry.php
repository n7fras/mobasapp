
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="table.css">
    
</head>
<body >
    <table border=1 class="table">
    <tr>
        <th>Nomor Karyawan</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>no. Handphone</th>
    </tr>
    <?php
    include 'koneksi.php';
    $ambildata = mysqli_query($koneksi, "SELECT NK, Nama, Jabatan, no_hp from karyawan");
    while ($tampil = mysqli_fetch_array($ambildata)) {
        echo "
        <tr>
        <td>$tampil[NK]</td>
        <td>$tampil[Nama]</td>
        <td>$tampil[Jabatan]</td>
        <td>$tampil[no_hp]</td>
        
        </tr>";    
    }
    
    ?>
    </table>
    <script src="script.js"></script>
</body>


</html>
