<?php
include 'koneksi.php';
$title = "Data Barang";
include 'template/header.php';
include 'template/sidebare.php';
require_once 'functions.php';


// Ambil data barang dari database
$sql = mysqli_query($koneksi, "SELECT * FROM Barang WHERE kd_brg = '$_GET[kode]'");
$data = mysqli_fetch_array($sql);

// Proses form submission
if (isset($_POST['simpan'])) {
    // Ambil nilai dari form
    $kd_brg = $_POST['kd_brg'];
    $Nama = $_POST['Nama'];
    $Merk = $_POST['Merk'];
    $harga = $_POST['harga'];


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
                        <td><input type="text" id="Nama" name="Nama" class="input" value='<?php echo $data['Nama_Brg']; ?>' ></td>
                    </tr>
                    <tr>
                        <td class="label-cell"><label for="Merk">Merk</label></td>
                        <td>:</td>
                        <td>
                            <select name="Merk" id="Merk" style="font-size: larger;">
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
                        <td><input type="number" name="stok" id="stok" class="number" style="font-size: larger;" value='<?php echo $data['stok']; ?>' disabled></td>
                    </tr>
                    <tr>
                        <td class="label-cell"><label for="harga">Harga</label></td>
                        <td>:</td>
                        <td><input type="number" name="harga" id="harga" class="number" style="font-size: larger;" value='<?php echo $data['harga']; ?>'></td>
                    </tr>
                    <tr>
                        <td class="label-cell"><label for="gambar">Gambar</label></td>
                        <td>:</td>
                        <td><input type="file" id="gambar" name="gambar" class="file" style="font-size: larger;"></td>
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
<?php include './template/footer.php'; ?>