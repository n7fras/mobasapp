<?php
    include 'koneksi.php';
    $title="Data Karyawan";
    include 'template/header.php';
    include 'template/sidebare.php';
    
    ?>
  <div class="content-wrapper" id="main-content">

        <!-- Konten utama akan dimuat di sini -->
        <div class="boxkry" id="boxkry">
            <div><h1>Data Karyawan</h1></div>
            <div class="Cari" id="search">
                <form method="GET">
                    <input type="text" name="cari" placeholder="Cari..." class="text-cari" value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
                    <button type="submit" class="Button_Cari">Cari</button>
                </form>
            </div>
    
            <div class="table-container">
                <table border="0" class="table" >
                    <tr>
                        <th class="kolom" id="nik">NIK</th>
                        <th class="kolom" id="nama">Nama</th>
                        <th class="kolom">Jabatan</th>
                        <th class="kolom">No.HP</th>
                        <th class="kolom">Status</th>
                        <th><i class='bi bi-three-dots-vertical'></i></th>
                    </tr>
                    <?php
                    include 'koneksi.php';

                    // Inisialisasi variabel pencarian
                    $whereClause = "";

                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        // Bangun kondisi WHERE untuk query
                        $whereClause = "WHERE NK LIKE '%$cari%' OR Nama LIKE '%$cari%' OR jabatan LIKE '%$cari%' OR no_HP LIKE '%$cari%' OR status_kry LIKE '%$cari%'";
                    }

                    // Query data karyawan
                    $query = "SELECT * FROM karyawan $whereClause";
                    $ambildata = mysqli_query($koneksi, $query);

                    // Lakukan iterasi untuk menampilkan hasil query
                    while ($tampil = mysqli_fetch_array($ambildata)) {
                        echo "
                        <tr>
                            <td>$tampil[NK]</td>
                            <td>$tampil[Nama]</td>
                            <td>$tampil[jabatan]</td>
                            <td>$tampil[no_HP]</td>
                            <td>$tampil[status_kry]</td>
                          <td>
                        <div class='edit'><button><i class='bi bi-three-dots-vertical'></i></button>
                        <div class='dropdown-edit'>
                         <a href='editkry.php?kode=$tampil[NK]'>Edit</a>
                        <a href='aktifasi.php?kode=$tampil[NK]& action=deactivate'>Deaktivasi Akun</a>
                        <a href='aktifasi.php?kode=$tampil[NK]& action=reactivate'>Reaktivasi Akun</a>
                        </div>
                        </td>
                        </tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
   
        </div>
    
 </div>
<?php
include 'template/footer.php';?>
