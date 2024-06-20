
<?php include './login.php'?>
    <div class="notifikasi">
      <i class="bi bi-bell "style="font-size: 30px;color:black;"></i>
    </div>

    <div class="container">
  
      <div class="sidebar">
        
      <div class="menu" id="menu-button">
          <input type="checkbox" id="menu-checkbox" />
          <label for="menu-checkbox" id="menu-label">
            <div class="Hamburger" id="Humburger"></div>
          </label>
        </div>
        <div class="header">
          <div class="logo">
            <img src="./Gambar/Logofix.png" alt="" class="gambar" /><br />
          </div>
        </div>
        <div class="main" id="main">
         <div id='login'>
          <i class="bi bi-person-circle admin" style="font-size: 50px; color: black"></i>
          <div class="login">
          <?php
      
        if(isset($_SESSION['login_user'])) {
            $uname = $_SESSION['login_user'];
            echo "<a href='#' class='login'>$uname</a>";
        }
        ?>
          </div>
         
          </div>
          <div class="listitem" id="item">
            <a href="beranda.php" class="item" >
            <i class= "bi bi-house icon" style="font-size: 30px;color:black; " ></i>

              <span class="description" href="#" oncclick="loadContent('beranda.php')">Beranda</span>
            </a>
          </div>
        
          <div
            class="listitem dropdown-toggle"
            data-target="dropdown-1"
            id="item"
          >
            <a href="#" class="item">
                <i class="bi bi-person-video2 icon "style="font-size: 30px;color: black"></i>
              <span class="description">Karyawan</span>
              <div class="dropdown-symbol1"></div>
            </a>
            <div class="dropdown" id="dropdown-1">
              <ul>
                <li>
                  <a class="dropdown-item" href="datakry.php">Data Karyawan</a>
                </li>
                <li><a class="dropdown-item" href="tambahkry.php">Tambah karyawan</a></li>
              </ul>
            </div>
          </div>
          <div
            class="listitem dropdown-toggle"
            data-target="dropdown-2"
            id="item"
          >
            <a href="#" class="item">
                <i class="bi bi-cart icon" style="font-size: 30px;color: black"></i>
              <span class="description">Barang</span>
              <div class="dropdown-symbol2"></div>
            </a>
            <div class="dropdown" id="dropdown-2">
              <ul>
                <li>
                  <a class="dropdown-item" href="databrg.php">Data Barang</a>
                </li>
                <li><a class="dropdown-item" href="+brg.php">Tambah Barang</a></li>
              </ul>
            </div>
          </div>
          <div class="listitem" id="item">
            <a href="#" class="item">
                <i class="bi bi-people icon" style='font-size: 30px;color: black'></i>
              <span class="description">Pelanggan</span>
            </a>
            <div class="dropdown"></div>
          </div>
          <div class="listitem" id="item">
            <a href="#" class="item">
                <i class="bi bi-file-earmark icon" style='font-size: 30px; color: black'></i>
              <span class="description">Laporan</span>
            </a>
            <div class="dropdown"></div>
          </div>
          <div class="listitem" id="item">
          <a href="MOBAS.php" class="item" onclick="return confirm('Apakah Anda yakin ingin logout?');">
  <i class="bi bi-power icon" style="font-size: 30px; color: black;"></i>
  <span class="description">Logout</span>
</a>

    
          </div>
        </div>
      </div>
  </div>

</div>
    

