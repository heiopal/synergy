<?php
session_start();

$isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css"
      rel="stylesheet"/>

    <link rel="stylesheet" href="styles.css" />
    <title>Echo Track</title>
  </head>
  <body>
    <header class="header">
        <!-- home -->
      <nav>
        <div class="nav__bar">
          <div class="logo">
            <a href="#"><img src="assets\LogoEchoTrack.png" alt="logo"/></a>
          </div>
          <div class="nav__menu__btn" id="menu-btn">
            <i class="ri-menu-line"></i>
          </div>
        </div>
        <ul class="nav__links" id="nav-links">
          <li><a href="#home">Home</a></li>
          <li><a href="#jadwalsampah">Jadwal Pengambilan Sampah</a></li>
          <li><a href="#edukasi">Edukasi</a></li>
          <li><a href="#laporan">Laporan</a></li>
        </ul>
        <?php if (!$isLoggedIn): ?>
          <a href="login.php" class="btn nav__btn">LOGIN</a>
        <?php else: ?>
          <a href="logout.php" class="btn nav__btn">LOGOUT</a>
        <?php endif; ?>
      </nav>
      <div class="section__container header__container" id="home">
        <p>Echo Track - SYNERGY</p>
        <h1> Layanan Publik Pelaporan Sampah Sistematis Yang Terintegrasi<br /><span>Melalui Website</span>.</h1>
      </div>
    </header>

    


    <!-- button jadwal sampah -->
    <section class="section__container" id="jadwalsampah">
      <div class="about__content">
        <h2 class="section__header">Jadwal Pengambilan Sampah</h2>
        <p class="section__description">Berikut adalah jadwal pengambilan sampah</p>
        <table class="schedule-table">
          <thead>
            <tr>
              <th>Hari</th>
              <th>Waktu</th>
              <th>Tujuan Pembuangan Sampah Akhir</th>
             </tr>
          </thead>
          <tbody>
            <tr>
              <td><span class="day">Senin</span></td>
              <td><span class="time">07:00 - 15:00</span></td>
              <td><span class="Tujuan Pembuangan Akhir">TPS-T SINDU MANDIRI</span></td>
            </tr>
            <tr>
              <td><span class="day">Rabu</span></td>
              <td><span class="time">09:00 - 15:00</span></td>
              <td><span class="Tujuan Pembuangan Akhir">TPS 3R Asmaina</span></td>
            </tr>
            <tr>
              <td><span class="day">Jumat</span></td>
              <td><span class="time">09:00 - 18:00</span></td>
              <td><span class="Tujuan Pembuangan Akhir">TPS 3R Brama Muda</span></td>
            </tr>
          </tbody>
        </table>

        <!-- button download jadwal pengambilan sampah -->
        <div class="schedule-image-container">
          <a href="assets\Jadwal Sampah.png" download class="btn btn-primary">Download Jadwal</a>
        </div>
      </div>
    </section>

    <!-- button edukasi -->
    <section class="section__container room__container" id="edukasi">
      <p class="section__subheader">EDUKASI</p>
      <h2 class="section__header">Edukasi Tentang Sampah.</h2>
      <div class="room__grid">

        <!-- 1 -->
          <div class="room__card" onclick="window.location.href='https:/www.kompas.id/baca/humaniora/2023/01/05/edukasi-pengelolaan-sampah-terus-dijalankan';" style="cursor: pointer;">
            <div class="room_card_image">
              <img src="assets/pp.jpg" alt="room" />
            
            </div>
            <div class="room_card_details">
              <h4>Edukasi Pengelolaan Sampah Mesti Terus Dijalankan sejak Usia Dini</h4>
            </div>
          </div>
  
          <!-- 2 -->
          <div class="room__card" onclick="window.location.href='https:/dlh.bulelengkab.go.id/informasi/detail/artikel/pengertian-dan-pengelolaan-sampah-organik-dan-anorganik-13';" style="cursor: pointer;">
            <div class="room_card_image">
              <img src="assets/sampah.jpg" alt="room" />
  
            </div>
            <div class="room_card_details">
              <h4>PENGERTIAN DAN PENGELOLAAN SAMPAH ORGANIK DAN ANORGANIK</h4>
            </div>
          </div>
  
          <!-- 3 -->
          <div class="room__card" onclick="window.location.href='https:/mutucertification.com/pengertian-contoh-reduce-reuse-recycle/';" style="cursor: pointer;">
            <div class="room_card_image">
              <img src="assets/organik.jpg" alt="room" />
              
            </div>
            <div class="room_card_details">
              <h4>Pengertian Reduce, Reuse, Recycle dan Contohnya</h4>
            </div>
          </div>
        </div>
    </section>

    
    <!-- button laporan -->
    <section class="" id="laporan">
      <div class="container">
        <div class="row mx-0 justify-content-center">
          <div class="col-md-7 col-lg-5 px-lg-2 col-xl-4 px-xl-0 px-xxl-3">
            <h2 class="section__header">Laporan tentang Sampah</h2>
            <form
              method="POST"
              class="w-100 rounded-1 p-4 border bg-white"
              action="laporan.php"
              enctype="multipart/form-data"
            >
              <label class="d-block mb-4">
                <span class="form-label d-block">Nama</span>
                <input
                  name="name"
                  type="text"
                  class="form-control"
                  required
                />
              </label>

              <label class="d-block mb-4">
                <span class="form-label d-block">Alamat Email</span>
                <input
                  name="email"
                  type="email"
                  class="form-control"
                  required
                />
              </label>

              <label class="d-block mb-4">
                <span class="form-label d-block">Upload Bukti Laporan</span>
                <input name="gambar" type="file" class="form-control" required />
              </label>

              <label class="d-block mb-4">
                <span class="form-label d-block">Deskripsi Laporan</span>
                <textarea
                  name="message"
                  class="form-control"
                  rows="3"
                  required
                ></textarea>
              </label>

              <div class="mb-3">
                <button type="submit" class="btn btn-primary px-3 rounded-3">
                  Submit
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer" id="contact">
      <div class="section__container footer__container">
        <div class="footer__col">
          <div class="logo">
            <a href="#home"><img src="assets\LogoEchoTrack.png" alt="logo" /></a>
          </div>
          <p class="echo-track-text">
            Echo Track adalah platform yang memudahkan masyarakat dalam mengelola sampah secara efisien. Kami menyediakan informasi jadwal pengambilan sampah dan layanan pengaduan untuk meningkatkan kebersihan lingkungan.
          </p>
        </div>
        <div class="footer__col">
          <h4>MENU PILIHAN</h4>
          <ul class="footer__links">
            <li><a href="#home">Beranda</a></li>
            <li><a href="#jadwalsampah">Jadwal Pengambilan</a></li>
            <li><a href="#edukasi">Edukasi</a></li>
            <li><a href="#laporan">Laporan</a></li>
          </ul>
        </div>
      
        <div class="footer__col">
          <h4>CONTACT US</h4>
          <ul class="footer__links">
            <li>synergy8@gmail.com</li>
          </ul>
         
        </div>
      </div>
      <div class="footer__bar">
        Copyright © 2024 Echo Track - SYNERGY 8.
      </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="main.js"></script>
  </body>
</html>
