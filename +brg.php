
   <?php
   include 'koneksi.php';
   $title="Tambah Barang";
   include 'template/header.php';
   require_once 'functions.php';
   include 'template/sidebare.php';
   
   // Generate unique NK code
$auto = mysqli_query($koneksi, "SELECT MAX(kd_brg) AS max_code FROM Barang");
$data = mysqli_fetch_array($auto);
$code = $data['max_code'];
$urutan = (int) substr($code, 3, 3);
$urutan++;
$huruf = "BRG";
$code = $huruf . sprintf("%03s", $urutan);
   ?>
    <div class="content-wrapper" id="main-content">
        
        <!-- Konten utama akan dimuat di sini -->
         <div class="boxplus" id="barang">
    <div><h1>Tambah Barang</h1></div>
    <div><form action="simpanbrg.php"method="post" enctype="multipart/form-data">
        <table border="0">
           
            <tr>
                <td class="label-cell"><label for="kd_brg">Kode Barang </label></td>
            <td>:</td>
                <td><input type="text"id="kode_brg" name="kd_brg" value='<?=$code?>'class="input" readonly></td>
            </tr>
            <tr>
                <td class="label-cell"><label for="Nama">Nama Barang</label></td>
                <td >:</td>
                <td><input type="text" id= "Nama"name="Nama" class="input" placeholder="Masukkan Nama Barang" ></td>
            </tr>
            
            <tr>
                <td class="label-cell"><label for="Merk">Merk</label></td>
               <td>:</td> 
               <td>
                <select name="Merk" id="Merk" style="font-size: larger;">
                    <option value="0">---Pilih Merk---</option>
                    <option value="1">Honda</option>
                    <option value="2">Yamaha</option>
                    <option value="3">Suzuki</option>
                    <option value="4">Kawasaki</option>
                </select>
            </td>
            </tr>
            <tr>
                <td class="label-cell"><label for="stok" >Stok</label></td>
                <td>:</td>
                <td><input type="number" name="stok" id="stok" class="number" style="font-size: larger;" ></td>
            </tr>
            <tr>
                <td class="label-cell"><label for="harga">Harga</label></td>
                <td>:</td>
                <td><input type="number" name="harga" id="harga" class="number" style="font-size: larger;"></td>
            </tr>
            <tr>
                <td class="label-cell"><label for="gambar">Gambar</label></td>
                <td >:</td>
                <td><input type="file" id= "gambar"name="gambar" class="file" style="font-size: larger;" ></td>
            </tr>
            <tr>
                <td colspan="3">
        <div class="tombol">
        <input type="reset" name="reset" value="Batal" class="button" id="reset" >
            <input type="submit" name="simpan" value="Simpan" class="button" id="simpan">
            </div> 
    </td>
            
            </tr>
        </table>
        
    </form>
    </div>
    </div>
      </div>

<?php
include 'template/footer.php';
?>

