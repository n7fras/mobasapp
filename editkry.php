
<?php
  
  include 'koneksi.php';
  $title="Edit Karyawan";
  include 'template/header.php';


  include 'template/sidebare.php';
  
  $sql=mysqli_query($koneksi, "SELECT * FROM karyawan where NK='$_GET[kode]'");
  $data = mysqli_fetch_array($sql);
  if (isset($_POST['simpan'])) {
    $NIK = $_POST['NIK'];
    $Nama = $_POST['Nama'];
    $Jabatan = $_POST['Jabatan'];
    $NoHp = $_POST['No_Hp'];
    $pw = $_POST['pw'];
    $status = $_POST['status'];
    $query= "UPDATE karyawan SET Nama='$Nama', Jabatan='$Jabatan', no_HP='$NoHp', pw_kry='$pw'WHERE NK='$NIK'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "<script>alert('Data Berhasil Diubah'); window.location='datakry.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data');</script>";
    }
  }


// Generate unique NK code

?>
 <div class="content-wrapper" id="main-content">
        <!-- Konten utama akan dimuat di sini -->
         
<div class="boxplus" id="box">
    <div><h1>Edit Karyawan</h1></div>
    <div>
        <form action="" method="post">
            <table border="0" class="table">
                <tr>
                    <td class="label-cell" ><label for="NIK">NIK</label></td>
                    <td>:</td>
                    <td><input type="text" id="NIK" name="NIK" value="<?php echo $data['NK']; ?>" class="input" readonly ></td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="Nama">Nama Karyawan </label></td>
                    <td>:</td>
                    <td><input type="text" id="Nama" name="Nama" class="input"value="<?php echo $data['Nama']; ?>"  ></td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="Jabatan">Jabatan</label></td>
                    <td>:</td> 
                    <td>
                        <select name="Jabatan" id="Jabatan" value="<?php echo $data['Jabatan']; ?>">
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
                    <td><input type="text" name="No_Hp" id="No_Hp" class="input" placeholder="Masukkan Nomor Hp" value="<?php echo $data['no_HP'];?>" required></td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="pw">Password</label></td>
                    <td>:</td>
                    <td><input type="password" name="pw" id="pw" class="input" value="<?php echo $data['pw_kry']; ?>"></td>
                </tr>
                <tr>
                    <td class="label-cell"><label for="status">Status</label></td>
                    <td>:</td>
                    <td><select name="status" id="status" value="<?php echo $data['status']; ?>">
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
