
<?php 
$title = "Beranda MOBAS";
require_once 'template/header.php';
require_once 'functions.php';
require_once 'template/sidebare.php';

?>
<div class='content-wrapper' id='main-content'>
    
        <div class="box" id="box1">
        <div id='gmbr'><img src="./Gambar/Logofix.png" alt="" class="gmbr">
        </div>
            
        <h3>Selamat Datang Di Mobile Bengkel Administrator </h3>
                <?php
       
        if(isset($_SESSION['login_user'])) {
            $uname = $_SESSION['login_user'];
            echo "<a href='#' class='login'>$uname</a>";
        }

        ?>
       
        
           
            
         </div>
        <div class=box2>
          <img src="./Gambar/Mobeng Administrator.png" class="img" alt="">

             
      </div>
  
</div>
    <?php require_once 'template/footer.php'; ?>
