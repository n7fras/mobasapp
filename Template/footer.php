<script>
  document.addEventListener("DOMContentLoaded", function () {
    const dropdownToggles = document.querySelectorAll(".dropdown-toggle");
    const menu = document.getElementById("menu-checkbox");
    const sidebar = document.querySelector(".sidebar");
    const contentWrapper = document.querySelector(".content-wrapper");

    // Fungsi untuk toggle dropdown
    dropdownToggles.forEach(function (toggle) {
      toggle.addEventListener("click", function () {
        const targetId = this.getAttribute("data-target");
        const dropdown = document.getElementById(targetId);
        dropdown.classList.toggle("active");
      });
    });

    // Fungsi untuk toggle sidebar pada klik menu
    if (menu) {
      menu.addEventListener("change", function () {
        if (menu.checked) {
          sidebar.classList.add("hide");
          contentWrapper.style.marginLeft = "200px";
          contentWrapper.style.marginLeft= "150px"; // Sesuaikan dengan lebar sidebar saat disembunyikan
          // Sesuaikan dengan lebar sidebar saat disembunyikan
        } else {
          sidebar.classList.remove("hide");
          contentWrapper.style.marginLeft = "250px";
          contentWrapper.style.marginright = "150px"; // Sesuaikan dengan lebar sidebar normal
          // Sesuaikan dengan lebar sidebar normal
        }
      });
    }

    // Fungsi untuk memeriksa ukuran layar dan menyesuaikan kelas sidebar


    // Panggil fungsi saat halaman dimuat dan saat jendela diubah ukurannya
    checkScreenWidth();
    window.addEventListener("resize", checkScreenWidth);

    // Muat konten beranda secara default
    loadContent("beranda.html");
  });

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
</script>

</body>
</html>
