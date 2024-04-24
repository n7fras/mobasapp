document.addEventListener("DOMContentLoaded", function () {
  const dropdownToggles = document.querySelectorAll(".dropdown-toggle");
  const menu = document.getElementById("menu-checkbox");
  const sidebar = document.querySelector(".sidebar");

  dropdownToggles.forEach(function (toggle) {
    toggle.addEventListener("click", function () {
      const targetId = this.getAttribute("data-target");
      const dropdown = document.getElementById(targetId);
      dropdown.classList.toggle("active");
    });
  });

  menu.addEventListener("click", function () {
    sidebar.classList.toggle("hide");
  });

  // Event listener untuk link data karyawan
  var dataKaryawanLink = document.querySelector('a[href="datakry.php"]');

  if (dataKaryawanLink) {
    dataKaryawanLink.addEventListener("click", function (event) {
      event.preventDefault(); // Mencegah link untuk berpindah ke halaman baru

      // Memuat konten data karyawan ke dalam elemen konten utama
      fetch("datakry.php")
        .then(response => {
          console.log("Response status:", response.status); // Menampilkan status respons
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.text();
        })
        .then(data => {
          document.getElementById("main-content").innerHTML = data;
        })
        .catch(error => {
          console.error("Error fetching data:", error);
        });
    });
  }

  // Fungsi untuk memeriksa ukuran layar dan menyesuaikan kelas sidebar
  function checkScreenWidth() {
    // Ambil lebar layar
    const screenWidth = window.innerWidth;

    // Tentukan nilai ambang batas untuk mengubah kelas sidebar
    const threshold = 768; // Ubah nilai ambang batas sesuai kebutuhan

    // Jika lebar layar kurang dari nilai ambang batas, tambahkan kelas 'hide' pada sidebar
    if (screenWidth < threshold) {
      sidebar.classList.add('hide');
      menu.checked = true;
    } else {
      sidebar.classList.remove('hide');
      menu.checked = false;
    }
  }

  // Panggil fungsi saat halaman dimuat dan saat jendela diubah ukurannya
  checkScreenWidth();
  window.addEventListener('resize', checkScreenWidth);
});
