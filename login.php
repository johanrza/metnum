<?php
session_start();
if (isset($_SESSION["login"])) {
  header("Location: g");
  exit;
}

// jika button di klik
if (isset($_GET["login"])) {
  $nama = $_GET["nama"];
  $alamat = $_GET["alamat"];
  $noHp = $_GET["hp"];
  $kerjaan = $_GET["pekerjaan"];

  setcookie("__nn__", $nama);
  setcookie("_adss__", $alamat);
  setcookie("p", $noHp);
  setcookie("_jbjb_", $kerjaan);

  $_SESSION["login"] = true;
  header("Location: g");
  exit;
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="login-register-assets/fonts/icomoon/style.css">

  <link rel="stylesheet" href="login-register-assets/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="login-register-assets/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="login-register-assets/css/style.css">

  <title>Login</title>
</head>

<body>

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="login-register-assets/images/login-bro.svg" alt="Image" class="img-fluid" width="400" height="300">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <h3>Form <strong>Login</strong></h3>
                <p class="mb-4">Isi data formulir dibawah ini, untuk lanjut ke perhitungan Metode Gauss Jordan</p>
              </div>
              <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET">
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control" id="nama" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" name="alamat" class="form-control" id="alamat" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="no">Nomor HP</label>
                  <input type="number" name="hp" class="form-control" id="no" autocomplete="off">
                </div>
                <div class="form-group mb-4">
                  <label for="kerja">Pekerjaan</label>
                  <input type="text" name="pekerjaan" class="form-control" id="kerja" autocomplete="off">
                </div>

                <!-- <div class="d-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked" />
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                </div> -->

                <input type="submit" value="Kirim" name="login" class="btn text-white btn-block btn-primary">
              </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


  <script src="login-register-assets/js/jquery-3.3.1.min.js"></script>
  <script src="login-register-assets/js/popper.min.js"></script>
  <script src="login-register-assets/js/bootstrap.min.js"></script>
  <script src="login-register-assets/js/main.js"></script>
</body>

</html>