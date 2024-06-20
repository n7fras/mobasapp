<?php
include 'koneksi.php';
$title = "Data Barang";
include 'template/header.php';
require_once 'functions.php';
include 'template/sidebare.php';
?>

<div class="content-wrapper" id="main-content">
    <div class="box" id="boxbrg">
        <div><h1>Data Barang</h1></div>
        <div class="Cari" id="search">
            <form method="GET">
                <input type="text" name="cari" placeholder="Cari..." class="text-cari" value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
                <button type="submit" class="Button_Cari">Cari</button>
            </form>
        </div>

        <div class="table-container">
            <table border=1 class="table">
                <tr>
                    <th class="kolom" id="kd_brg">Kode Barang</th>
                    <th class="kolom" id="nama_brg">Nama Barang</th>
                    <th class="kolom">Merk</th>
                    <th class="kolom">Stok</th>
                    <th class="kolom">Harga</th>
                    <th colspan="2" style="text-align:center">Aksi</th>
                </tr>
                <?php
                // Inisialisasi variabel pencarian
                $whereClause = "";

                if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    // Bangun kondisi WHERE untuk query
                    $whereClause = "WHERE kd_brg LIKE '%$cari%' OR Nama_Brg LIKE '%$cari%' OR Merek LIKE '%$cari%' OR stok LIKE '%$cari%'";
                }

                $query = "SELECT * FROM Barang $whereClause";
                $ambildata = mysqli_query($koneksi, $query);
                while ($tampil = mysqli_fetch_array($ambildata)) {
                    echo "
                    <tr>
                        <td>$tampil[kd_brg]</td>
                        <td>$tampil[Nama_Brg]</td>
                        <td>$tampil[Merek]</td>
                        <td>$tampil[stok]</td>
                        <td>$tampil[harga]</td>
                        
                        <td>
                        <div class='edit'><button><i class='bi bi-three-dots-vertical'></i></button>
                        <div class='dropdown-edit'>
                         <a href='editbrg.php?kode=$tampil[kd_brg]'>Edit</a>
                        <a href='tambahstok.php?kode=$tampil[kd_brg]'>Tambah Stok</a>
                        </div>
                        </td>
                    </tr>";
                }
                ?>
            </table>
        </div>

      


        <script>
          
            //fungsi untuk mengelola dropdown edit
  function dropdownedit(event) {
    event.stopPropagation();
      const dropdownEdit = event.currentTarget.nextElementSibling;
      dropdownedit.style.display = dropdownedit.style.display ===  "block" ? "none" : "block";    
  }
  function clossalldropdownedit() {
    const dropdowns = document.querySelectorAll(".dropdown-edit");
    dropdowns.forEach(edit => {
      edit.style.display = "none";
    });
  }
  document.querySelectorAll(".edit").forEach(edit => {
      button.addEventListener("click", dropdownedit);
  });
  window.addeventlistener("click",function(){;
   clossalldropdownedit();
  });

  document.querySelectorAll(".dropdown-edit").forEach(content => {
      content.addEventListener("click",function(event) {
        event.stopPropagation();
      });
  });
        </script>

<?php include 'template/footer.php'; ?>
