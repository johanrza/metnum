<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login");
  exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    #hasil {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #hasil td,
    #hasil th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #hasil tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #hasil tr:hover {
      background-color: #ddd;
    }

    #hasil th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
  </style>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gauss Jordan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact - v1.1.1
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<?php
ob_start();
$koefisien = array(array());
function kesimpulan($jumlah_persamaan)
{
  global $koefisien;
  echo 'Sehingga: <br>';
  $persediaan = ['Kijing Besar = ', 'Kijing Sedang = ', 'Kijing Kecil = '];
  for ($i = 0; $i < $jumlah_persamaan; $i++) {
    echo "$persediaan[$i]";
    for ($j = 0; $j < $jumlah_persamaan + 1; $j++) {
      if ($j == $jumlah_persamaan) {
        echo $koefisien[$i][$j] . "<br>";
      }
    }
  }
}

function buatArray($jumlah_persamaan)
{
  global $koefisien;
  for ($i = 0; $i < $jumlah_persamaan; $i++) {
    for ($j = 0; $j < $jumlah_persamaan + 1; $j++) {
      if (isset($_GET['var' . $i . $j])) {
        $koefisien[$i][$j] = $_GET['var' . $i . $j];
      }
    }
  }
}

function tampilkanMatrik($koefisien)
{
  echo '<table class="w-25" id="hasil">';
  $rows = count($koefisien);

  for ($i = 0; $i < $rows; $i++) {
    $cols = count($koefisien[$i]);
    echo '<tr>';
    for ($j = 0; $j < $cols; $j++) {
      echo '<td>';
      echo str_replace('-0', '0', $koefisien[$i][$j]);

      echo '</td>';
    }
    echo '</tr>
';
  }
  echo '</table>
';
  echo '<hr>
';
}

function ubah($persamaan)
{
  global $koefisien;
  for ($i = 0; $i < $persamaan; $i++) {
    $persamaan_pivot = $i + 1;
    echo 'Persamaan ' . $persamaan_pivot . ' menjadi pivot dan ';
    $pivot = $koefisien[$i][$i];
    for ($j = 0; $j < $persamaan + 1; $j++) {
      $koefisien[$i][$j] = $koefisien[$i][$j] / $pivot;
    }

    for ($k = 0; $k < $persamaan; $k++) {
      if ($k != $i) {
        $pivot = $koefisien[$k][$i];
        for ($l = 0; $l < $persamaan + 1; $l++) {
          $koefisien[$k][$l] = $koefisien[$k][$l] - $pivot * $koefisien[$i][$l];
        }
      }
      $persamaan_ubah = $k + 1;
      echo 'Persamaan ' . $persamaan_ubah . ' telah dirubah';
      tampilkanMatrik($koefisien);
    }
  }
}
?>

<body>

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="./" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Kijing<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="./#home">Home</a></li>
          <li><a href="./#objek">Objek Permasalahan</a></li>
          <li><a href="./#petunjuk">Petunjuk Penggunaan</a></li>
          <li><a href="./#hasil">Hasil Produk</a></li>
          <li><a href="./#team">Pengembang</a></li>
          <li><a href="keluar"><svg xmlns="http://www.w3.org/2000/svg" class="pe-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
              </svg>Keluar</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Metode Gauss Jordan</h2>
              <p>Kijing dengan ukuran besar (150 x 60) membutuhkan 15 buah keramik, 12 meter besi, dan 12 total campuran bahan cor (2 : 4 : 6).</p>
              <p>
                Kijing dengan ukuran sedang (120 x 40) membutuhkan 10 buah keramik, 6 meter besi, dan 6 total campuran bahan cor (1 : 2 : 3).
              </p>
              <p>
                Kijing dengan ukuran kecil (80 x 40) membutuhkan 6 buah keramik, 2 meter besi, dan 3 total campuran bahan cor (0,5 : 1 : 1,5)
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="./">Home</a></li>
            <li>Gauss Jordan</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-between gy-4">

          <div class="col-lg-8">
            <div class="portfolio-description">
              <h2>Perhitungan Gauss Jordan</h2>
              <h6 class="mb-3">Masukan jumlah bahan</h6>
              <form action="<?php $_SERVER['PHP_SELF'] ?>#hasil-hitung" method="GET">
                <!-- ini yang Baru -->
                <div class="d-grid gap-3">

                  <div class="row g-3 align-items-center">
                    <!-- Persamaan 1 -->
                    <div class="col-auto">
                      <label for="b1k1" class="col-form-label">Pers 1</label>
                    </div>
                    <div class="col-auto">
                      <input type="text" name="var00" class="form-control text-center" size="1" value="15" aria-describedby="KijingBesar" readonly>
                    </div>
                    <div class="col-auto">
                      <span id="KijingBesar" class="form-text">
                        Uk. Besar
                      </span>
                    </div>
                    <div class="col-auto">
                      <span class="form-text fs-5">
                        +
                      </span>
                    </div>
                    <div class="col-auto">
                      <input type="text" name="var01" class="form-control text-center" size="1" value="10" aria-describedby="KijingSedang" readonly>
                    </div>
                    <div class="col-auto">
                      <span id="KijingSedang" class="form-text">
                        Uk. Sedang
                      </span>
                    </div>
                    <div class="col-auto">
                      <span class="form-text fs-5">
                        +
                      </span>
                    </div>
                    <div class="col-auto">
                      <input type="text" name="var02" class="form-control text-center" size="1" value="6" aria-describedby="KijingKecil" readonly>
                    </div>
                    <div class="col-auto">
                      <span id="KijingKecil" class="form-text">
                        Uk. Kecil
                      </span>
                    </div>
                    <div class="col-auto">
                      <span class="form-text fs-5">
                        =
                      </span>
                    </div>
                    <div class="col-auto">
                      <input type="text" id="b1k1" name="var03" class="form-control text-center" size="1" autocomplete="off" required>
                    </div>
                    <div class="col-auto">
                      <span class="form-text">
                        Keramik
                      </span>
                    </div>
                  </div>

                  <!-- Persamaan 2 -->
                  <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <label for="b2k1" class="col-form-label">Pers 2</label>
                    </div>
                    <div class="col-auto">
                      <input type="text" name="var10" class="form-control text-center" size="1" value="12" aria-describedby="KijingBesar" readonly>
                    </div>
                    <div class="col-auto">
                      <span id="KijingBesar" class="form-text">
                        Uk. Besar
                      </span>
                    </div>
                    <div class="col-auto">
                      <span class="form-text fs-5">
                        +
                      </span>
                    </div>
                    <div class="col-auto">
                      <input type="text" name="var11" class="form-control text-center" size="1" value="6" aria-describedby="KijingSedang" readonly>
                    </div>
                    <div class="col-auto">
                      <span id="KijingSedang" class="form-text">
                        Uk. Sedang
                      </span>
                    </div>
                    <div class="col-auto">
                      <span class="form-text fs-5">
                        +
                      </span>
                    </div>
                    <div class="col-auto">
                      <input type="text" name="var12" class="form-control text-center" size="1" value="2" aria-describedby="KijingKecil" readonly>
                    </div>
                    <div class="col-auto">
                      <span id="KijingKecil" class="form-text">
                        Uk. Kecil
                      </span>
                    </div>
                    <div class="col-auto">
                      <span class="form-text fs-5">
                        =
                      </span>
                    </div>
                    <div class="col-auto">
                      <input id="b2k1" type="text" name="var13" class="form-control text-center" size="1" autocomplete="off" required>
                    </div>
                    <div class="col-auto">
                      <span class="form-text">
                        Besi
                      </span>
                    </div>
                  </div>

                  <!-- Persamaan 3 -->
                  <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <label for="b3k1" class="col-form-label">Pers 3</label>
                    </div>
                    <div class="col-auto">
                      <input type="text" name="var20" class="form-control text-center" size="1" value="12" aria-describedby="KijingBesar" readonly>
                    </div>
                    <div class="col-auto">
                      <span id="KijingBesar" class="form-text">
                        Uk. Besar
                      </span>
                    </div>
                    <div class="col-auto">
                      <span class="form-text fs-5">
                        +
                      </span>
                    </div>
                    <div class="col-auto">
                      <input type="text" name="var21" class="form-control text-center" size="1" value="6" aria-describedby="KijingSedang" readonly>
                    </div>
                    <div class="col-auto">
                      <span id="KijingSedang" class="form-text">
                        Uk. Sedang
                      </span>
                    </div>
                    <div class="col-auto">
                      <span class="form-text fs-5">
                        +
                      </span>
                    </div>
                    <div class="col-auto">
                      <input type="text" name="var22" class="form-control text-center" size="1" value="3" aria-describedby="KijingKecil" readonly>
                    </div>
                    <div class="col-auto">
                      <span id="KijingKecil" class="form-text">
                        Uk. Kecil
                      </span>
                    </div>
                    <div class="col-auto">
                      <span class="form-text fs-5">
                        =
                      </span>
                    </div>
                    <div class="col-auto">
                      <input id="b3k1" type="text" name="var23" class="form-control text-center" size="1" required autocomplete="off">
                    </div>
                    <div class="col-auto">
                      <span class="form-text">
                        Bahan Cor
                      </span>
                    </div>
                  </div>
                  <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <input type="submit" value="Hitung" name="submit" class="btn btn-success">
                    </div>
                  </div>
                </div>

                <!-- ini yang Lama -->
                <!-- <ul>
                  Persamaan 1:
                  <input type="text" name="var00" size="1" value="15" readonly> Keramik +
                  <input type="text" name="var01" size="1" value="10" readonly> Besi +
                  <input type="text" name="var02" size="1" value="6" readonly> Bahan cor =
                  <input type="text" name="var03" size="1" required>
                </ul>
                <ul>
                  Persamaan 2:
                  <input type="text" name="var10" size="1" value="12" readonly> Keramik +
                  <input type="text" name="var11" size="1" value="6" readonly> Besi +
                  <input type="text" name="var12" size="1" value="2" readonly> Bahan cor =
                  <input type="text" name="var13" size="1" required>
                </ul>
                <ul>
                  Persamaan 3:
                  <input type="text" name="var20" size="1" value="12" readonly> Keramik +
                  <input type="text" name="var21" size="1" value="6" readonly> Besi +
                  <input type="text" name="var22" size="1" value="3" readonly> Bahan cor =
                  <input type="text" name="var23" size="1" required>
                </ul>
                <input type="submit" value="Submit" name="submit" class="btn btn-success">
                <hr> -->
              </form>

              <?php
              if (isset($_GET['submit'])) {
                echo '<hr id="hasil-hitung"><h2>Hasil dalam bentuk matriks</h2>';

                if (isset($_COOKIE['jumlah_persamaan'])) {
                  $jumlah_persamaan = $_COOKIE['jumlah_persamaan'];
                  buatArray($jumlah_persamaan);
                  echo '<h3 class="text-muted">Tampilan Matrik Pertama</h3>';
                  tampilkanMatrik($koefisien);
                  ubah($jumlah_persamaan);
                  kesimpulan($jumlah_persamaan);
                }
              }
              ?>
              <!-- <p>
                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia.
                Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia
                accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt
                eius.
              </p>
              <p>
                Amet consequatur qui dolore veniam voluptatem voluptatem sit. Non aspernatur atque natus ut cum nam et.
                Praesentium error dolores rerum minus sequi quia veritatis eum. Eos et doloribus doloremque nesciunt
                molestiae laboriosam.
              </p>

              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis
                  quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <div>
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                </div>
              </div>

              <p>
                Impedit ipsum quae et aliquid doloribus et voluptatem quasi. Perspiciatis occaecati earum et magnam
                animi. Quibusdam non qui ea vitae suscipit vitae sunt. Repudiandae incidunt cumque minus deserunt
                assumenda tempore. Delectus voluptas necessitatibus est.

              <p>
                Sunt voluptatum sapiente facilis quo odio aut ipsum repellat debitis. Molestiae et autem libero.
                Explicabo et quod necessitatibus similique quis dolor eum. Numquam eaque praesentium rem et qui
                nesciunt.
              </p> -->

            </div>
          </div>

          <div class="col-lg-3">
            <div class="portfolio-info">
              <h3>Data Diri</h3>
              <ul>
                <li><strong>Nama Lengkap</strong><span><?= $_COOKIE['__nn__']; ?></span></li>
                <li><strong>Alamat</strong><span><?= $_COOKIE['_adss__']; ?></span></li>
                <li><strong>Nomor HP</strong><span><?= $_COOKIE['p']; ?></span></li>
                <li><strong>Pekerjaan</strong><span><?= $_COOKIE['_jbjb_']; ?></span>
                </li>
                <!-- <li><a href="#" class="btn-visit align-self-start">Visit Website</a></li> -->
              </ul>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="./" class="logo d-flex align-items-center">
            <span>Kijing</span>
          </a>
          <p>Menurut bahasa, kijing adalah batu penutup makam dipadukan dengan lempengan makam (dari marmer, ubin atau
            semen).</p>
          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Navigasi</h4>
          <ul>
            <li><a href="#hero">Home</a></li>
            <li><a href="#objek">Objek Permasalahan</a></li>
            <li><a href="#petunjuk">Petunjuk Penggunaan</a></li>
            <li><a href="#hasil">Hasil Produk</a></li>
            <li><a href="#team">Pengembang</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Get Started</h4>
          <ul>
            <li><a href="login">Login</a></li>
            <li><a href="g">Gauss Jordan</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Universitas Janabadra</h4>
          <p>
            Jl. Tentara Rakyat Mataram No.58,<br>
            Bumijo, Kec. Jetis, <br>
            Kota Yogyakarta, Daerah Istimewa Yogyakarta <br>
            55231<br><br>
            <strong>Phone:</strong> +1 5589 55488 55<br>
            <strong>Email:</strong> info@example.com<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright 2022 <strong><span>Kijing</span></strong>. All Rights Reserved
      </div>
      <!-- <div class="credits"> -->
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
      <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>