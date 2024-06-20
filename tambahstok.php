<?php
include 'koneksi.php';
$title = "Data Barang";
include 'template/header.php';
require_once 'functions.php';
include 'template/sidebare.php';

// Ambil data barang dari database
$sql = mysqli_query($koneksi, "SELECT * FROM Barang WHERE kd_brg = '$_GET[kode]'");
$data = mysqli_fetch_array($sql);

// Proses form submission
if (isset($_POST['simpan'])) {
    // Ambil nilai dari form
    $tambahstok= isset($_POST['tambahstok'])?intval($_POST['tambahstok']):0;

    if($tambahstok < 0){
        echo"<script>alert('Stok Tidak Boleh Negatif'); window.location='tambahstok.php';</script>";
        exit;
    }

    $stokbaru=$data['stok']+$tambahstok;
    $query = "UPDATE Barang SET stok = '$stokbaru' WHERE kd_brg = '{$data['kd_brg']}'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
    echo "<script>alert('Stok Berhasil ditambah'); window.location='databrg.php';</script>";    
    }
    else{
        echo "<script>alert('Stok Gagal ditambah'); window.location='databrg.php';</script>";
    }
    


    // UPDATE data barang di database
    $query = "UPDATE Barang SET Nama_Brg = '$Nama', Merek = '$Merk', harga = '$harga' WHERE kd_brg = '$kd_brg'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data Berhasil Diubah'); window.location='databrg.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data');</script>";
    }
}
?>
<style>
#Nama, #Merk, #stok,#harga{
    background-color: #cdcdcd;
    
}
#Merk{
    background-color: #cdcdcd;
}

</style>
<div class="content-wrapper" id="main-content">
    <div class="boxplus" id="barang">
        <div><h1>Edit Barang</h1></div>
        <div>
            <form action="" method="post" enctype="multipart/form-data">
                <table border="0">
                    <tr>
                        <td class="label-cell"><label for="kd_brg">Kode Barang</label></td>
                        <td>:</td>
                        <td><input type="text" id="kode_brg" name="kd_brg" value='<?php echo $data['kd_brg']; ?>' class="input" readonly></td>
                    </tr>
                    <tr>
                        <td class="label-cell"><label for="Nama">Nama Barang</label></td>
                        <td>:</td>
                        <td><input type="text" id="Nama" name="Nama" class="input" value='<?php echo $data['Nama_Brg']; ?>' readonly ></td>
                    </tr>
                    <tr>
                        <td class="label-cell"><label for="Merk">Merk</label></td>
                        <td>:</td>
                        <td>
                            <select name="Merk" id="Merk" style="font-size: larger;" disabled>
                                <option value="1" <?php if ($data['Merek'] == 1) echo 'selected'; ?>>Honda</option>
                                <option value="2" <?php if ($data['Merek'] == 2) echo 'selected'; ?>>Yamaha</option>
                                <option value="3" <?php if ($data['Merek'] == 3) echo 'selected'; ?>>Suzuki</option>
                                <option value="4" <?php if ($data['Merek'] == 4) echo 'selected'; ?>>Kawasaki</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-cell"><label for="stok">Stok</label></td>
                        <td>:</td>
                        <td><input type="number" name="stok" id="stok" class="number" style="font-size: larger;" value='<?php echo $data['stok']; ?>' readonly></td>
                    </tr>
                    <tr>
                        <td class="label-cell"><label for="harga">Harga</label></td>
                        <td>:</td>
                        <td><input type="number" name="harga" id="harga" class="number" style="font-size: larger;" value='<?php echo $data['harga']; ?>' readonly></td>
                    </tr>
                   
                    <tr>
                        <td class="label-cell"><label for="tambahstok">Jumlah Stok</label></td>
                        <td>:</td>
                        <td><input type="number" id="tambahstok" name="tambahstok" class="file" style="font-size: larger;"></td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            <div class="tombol">
                                <input type="reset" name="reset" value="Batal" class="button" id="reset">
                                <input type="submit" name="simpan" value="Simpan" class="button" id="simpan">
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
