<script>
document.addEventListener("DOMContentLoaded", function() {
  const currentUrl = window.location.pathname;
  const isMobile = window.innerWidth <= 768; // Memeriksa apakah lebar layar <= 768px

  // Cek apakah perangkat dalam ukuran mobile dan berada di halaman detail buku
  if (isMobile && currentUrl.includes('/book/')) {
    document.getElementById('navbar-home-top').style.display = 'none'; 
    document.getElementById('navbar-home-bottom').style.display = 'none'; 
    document.getElementById('navbar-detail-top').style.display = 'block'; 
    document.getElementById('navbar-detail-bottom').style.display = 'block'; 
  } else if (isMobile) {
    // Jika di halaman lain dan perangkat mobile
    document.getElementById('navbar-detail-top').style.display = 'none'; 
    document.getElementById('navbar-detail-bottom').style.display = 'none'; 
  } else {
    // Untuk layar lebih besar dari 768px (desktop atau tablet)
    document.getElementById('navbar-home-top').style.display = 'block'; // Tampilkan navbar top
    document.getElementById('navbar-home-bottom').style.display = 'none'; // Sembunyikan navbar bottom
    document.getElementById('navbar-detail-top').style.display = 'none'; // Sembunyikan navbar detail top
    document.getElementById('navbar-detail-bottom').style.display = 'none'; // Sembunyikan navbar detail bottom
  }
});


</script>