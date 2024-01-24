<?php
require_once '../connect_db.php';
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>FunTour</title>
  <link rel="stylesheet" href="tentang.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body class="bg-light-subtle">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light-subtle shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="../">FunTour</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-4 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../about/">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../tour/">Tour</a>
          </li>
        </ul>

        <?php if ($isLoggedIn) :
          $username = $_SESSION['username'];
          $user_id = $_SESSION['user_id'];
        ?>
          <div class="ms-auto">
            <img src="../assets/profileplcholder.jpg" alt="" class="rounded-circle img-fluid" style="width: 43px;">
            <a href="../profile/" class="text-black ms-auto navbar-text">
              <?= $username ?>
            </a>
          </div>
        <?php else : ?>
          <button class="btn btn-dark ms-auto" type="button">
            <a href="../login/login-page.php" class="link-light text-decoration-none">
              Log In
            </a>
          </button>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container" data-aos="fade-up">
      <div class="row atas justify-content-center">
        <div class="col-lg-6">
          <h1 class="display-4 text-center p-1">Mengapa <span>FunTOUR</span> 
            <br>
            adalah yang Terbaik?
          </h1>
        </div>
        <div class="col-lg-6 col-md-9">
          <!-- <img src="img/gambar1.jpg" class="img-fluid"> -->
        </div>
      </div>
    </div>
  </div>

  <!-- tengah -->
  <div class="bawahnya" data-aos="fade-up">
    <div class="row tengah justify-content-center">
      <div class="col-lg-6 col-md-6 col-sm-6 ml-1">
        <img src="img/travel1.png" class="img-fluid" style="width: 70%; height: 70%;" width="600px">
      </div>
      <div class="col-lg-4 col-md-4 col-sm-5 kolomteks my-auto mx-auto">
        <h3><strong>FunTour</strong>
          <br>
          Sederhana dan Mudah
        </h3>
        <p>
          Fitur dan tampilan FunTour didesain dengan          
          sederhana dan sebaik mungkin agar
          <br>
          memudahkan pengguna.
        </p>
      </div>
    </div>

    <div class="row bawah" data-aos="fade-up">
      <div class="col-lg-4 col-md-4 col-sm-5 kolomteks2 my-auto mx-auto" data-aos="fade-up">
        <h3>Prioritas<b> FunTour </b> adalah
          <br>
          Travel web
        </h3>
        <p>
          FunTour fokus dalam mempromosikan tour,
          
          dengan berbagai fitur pintar FunTour.

        </p>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 ml-1" data-aos="fade-up">
        <img src="img/travel2.jpg" class="img-fluid" style="width: 70%; height: 70%;">
      </div>
    </div>

    <div class="row bawahBanget" data-aos="fade-up">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <img src="img/travel3.jpg" class="img-fluid" style="width: 76%; height: 70%;">
      </div>
      <div class="col-lg-4 col-md-4 col-sm-5 kolomteks my-auto mx-auto">
        <h3>
          <br>
          banyak tips
        </h3>
        <p>
          FunTour tidak hanya mempromosikan tour tetapi juga 
          
          memyediakan tips untuk perjalanan anda.
        </p>
      </div>
    </div>
  </div>
</body>

<footer>
  <div class="text-center bg-black text-light pt-5 pb-3">
    <div class="container-fluid">
      <div>
        <div class="col-lg-12">
          <h6> FUNTOUR</h6>
        </div>
        <div class="col-lg-12">
          <P>Kebijakan Cookie | Kebijakan Privasi | Syarat dan Ketentuan </P>
        </div>
      </div>
      <div class="col-lg-12 pt-5">
        
        <p>hubungi kami <a href="#" class="link-light">disini</a> </p>
      </div>
    </div>

  </div>
</footer>

</html>