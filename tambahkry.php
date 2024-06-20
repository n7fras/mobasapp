
<?php
  
  include 'koneksi.php';
  $title="Tambah Karyawan";
  include 'template/header.php';

  require_once 'functions.php';
  include 'template/sidebare.php';
  
  

// Generate unique NK code
$auto = mysqli_query($koneksi, "SELECT MAX(NK) AS max_code FROM karyawan");
$data = mysqli_fetch_array($auto);
$code = $data['max_code'];
$urutan = (int) substr($code, 3, 3);
$urutan++;
$huruf = "KRY";
$code = $huruf . sprintf("%03s", $urutan);
//pembuatan password

$password="mobeng!@#"
?>
 <div class="content-wrapper" id="main-content">
        <!-- Konten utama akan dimuat di sini -->
         
<div class="boxplus" id="box">
    <div><h1>Tambah Karyawan</h1></div>
    <div>
        <form action="simpankry.php" method="post">
            <table border="0" class="table">
                <tr>
                    <td class="label-cell" ><label for="NIK">NIK</label></td>
                    <td>:</td>
                    <td><input type="text" id="NIK" name="NIK" value="<?= $code ?>" class="input" readonly ></td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="Nama">Nama Karyawan </label></td>
                    <td>:</td>
                    <td><input type="text" id="Nama" name="Nama" class="input" placeholder="Masukkan Nama Karyawan" required></td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="Jabatan">Jabatan</label></td>
                    <td>:</td> 
                    <td>
                        <select name="Jabatan" id="Jabatan">
                            <option value="0">---Pilih Jabatan---</option>
                            <option value="Admin">Admin</option>
                            <option value="Mekanik">Mekanik</option>
                            <option value="Kasir">Kasir</option>
                            <option value="Manager">Manager</option>
                            <option value="Super Admin">Super Admin</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="No_Hp">Nomor Hp</label></td>
                    <td>:</td>
                    <td><input type="text" name="No_Hp" id="No_Hp" class="input" placeholder="Masukkan Nomor Hp" required></td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="pw">Password</label></td>
                    <td>:</td>
                    <td><input type="text" name="pw" id="pw" class="input" value="<?= $password ?>" readonly></td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="status">Status</label></td>
                    <td>:</td>
                    <td><select name="status" id="status">
                        <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </td>
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
<?php include 'template/footer.php'; ?>
