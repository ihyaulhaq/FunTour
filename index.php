<?php
require_once './connect_db.php';
session_start();
// $isLoggedIn = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
// $username = $isLoggedIn ? $_SESSION['username'] : 'Guest';
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>FunTour</title>
  <link rel="stylesheet" href="style-home.css">
</head>

<body class="bg-light-subtle">
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light-subtle">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">FunTour</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-4 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/FunTour/about/index.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./tour/">Tour</a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Other
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./tour/">Tour</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> -->
        </ul>
        <!-- <form class="d-flex w-50 mx-auto" role="search">
          <input class="form-control me-2 bg-white border-dark w-100" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-dark " type="submit">Search</button>
        </form> -->
        <!-- <button class="btn btn-dark ms-auto" type="button">
          <a href="./login/login-page.php" class="link-light text-decoration-none">
            Log In
          </a>
        </button> -->
        <?php if ($isLoggedIn) :
          $username = $_SESSION['username'];
          $user_id = $_SESSION['user_id'];
        ?>
          <div class="ms-auto">
            <img src="./assets/profileplcholder.jpg" alt="" class="rounded-circle img-fluid" style="width: 43px;">
            <a href="./profile/" class="text-black ms-auto navbar-text">
              <?= $username ?>
            </a>
          </div>
        <?php else : ?>
          <button class="btn btn-dark ms-auto" type="button">
            <a href="./login/login-page.php" class="link-light text-decoration-none">
              Log In
            </a>
          </button>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <!-- carousel -->
  <div class="text-center">
    <div>
      <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-ride="carousel">
        <div class="carousel-inner" style="height: 650px;">
          <div class="carousel-item active" >
            <img src="assets/brobudur.jpg" class="d-block w-100 gambar-carousel" alt="..." style="height: 650px;">
            <div class=" carousel-caption d-md-block p-5" style="top: 32%; bottom: auto;">
            <h1 class="text-uppercase">Your dream vacation start here</h1>
            <!-- <p>Some representative placeholder content for the first slide.</p> -->
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/carouse_3.jpg" class="d- block w-100 gambar-carousel" alt="..." style="height: 650px;">
          <div class="carousel-caption d-m-grid p-5 text-uppercase display-3 fw-bold" style="top: 16%; bottom: auto;">
            <!-- <h5>bromo</h5> -->
          Mulailah perjalanan tak terlupakan petualangan Anda menanti
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/carousel 2.jpg" class="d-block w-100 gambar-carousel object-fit-cover" alt="..." style="height: 650px;">
            <div class=" carousel-caption d-md-block bg-black-carousel p-5">
          <h3>Temukan petualangan tak terlupakan di destinasi yang menakjubkan dengan kami</h3>
          <!-- <p>Some representative placeholder content for the first slide.</p> -->
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container-fluid">
    <!-- card tengah pilihn destinasi -->
    <div class="col-md-11 container-fluid font-card-tengah justify-content-center">
      <div class="pt-5">
        <h1>Destinasi Wisata</h1>
      </div>
      <div class="row row-cols-2 row-cols-md-5 g-0">
        <?php
        $hasil = mysqli_query($conn, "SELECT * FROM destinations");
        while ($row = mysqli_fetch_array($hasil)) :
        ?>

          <div class="col g-4">
            <div class="card h-100 shadow">
              <img src="<?= $row['image_url'] ?>" class=" rounded-top h-100 w-100 object-fit-cover" style="max-height: 27vw;" alt="assets/bromo.webp">
              <div class="card-body pb-2">
                <h6 class="card-title"><?= $row['destination_name'] ?></h6>
                <p class="card-text"><?= $row['description'] ?></p>
                <a href="#" class="stretched-link"> </a>
              </div>
            </div>
          </div>
        <?php endwhile ?>
      </div>
    </div>
    <!-- card daftar tournya -->
    <div class="container-fluid col-11 mt-5 justify-content-center">
      <div class="mb-5">
        <h1>Jelajahi Indonesia</h1>
      </div>

      <div class="row row-cols-1 row-cols-lg-2 g-0 ">

        <!-- <div class="card mb-4 mx-auto shadow" style="max-width: 543px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="/FunTour/assets/rinjani.jpg" class="rounded-start h-100 w-100 object-fit-cover" alt="...">
            </div>
            <div class="col-md-8 mx-auto text-start">
              <div class="card-body">
                <h4 class="card-title">bromo touring </h4>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                <p class=" card-text ">tanggal : <b>13-12-2023 - 12-1-2024</b></p>
                <p class=" card-text ">harga : <b>Rp. 2 jt</b></p>
                <div class=" d-flex">
                  <button class=" btn btn-dark ms-auto m-3">lihat selengkapnya</button>
                </div>
              </div>
            </div>
          </div>
        </div> -->

        <?php
        $hasil_t = mysqli_query($conn, "SELECT * FROM tours ORDER BY tours.tour_id DESC");
        $count = 0; // Variabel hitung
        while ($row = mysqli_fetch_array($hasil_t)) :
        ?>
          <div class="card mb-4 mx-auto shadow" style="max-width: 543px; ">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?= $row['image_url'] ?>" class="rounded-start h-100 w-100 object-fit-cover d-block" style="height: auto;" alt="...">
              </div>
              <div class="col-md-8 mx-auto text-start">
                <div class="card-body">
                  <h4 class="card-title"> <?= $row['tour_name'] ?> </h4>
                  <p class="card-text"><?= substr($row['description'], 0, 100) . (strlen($row['description']) > 100 ? '...' : '') ?></p>
                  <p class=" card-text ">tanggal : <b><?= $row['start_date'] ?> s.d. <?= $row['end_date'] ?></b></p>
                  <p class=" card-text ">harga : <b>Rp.<?= $row['price'] ?></b></p>
                  <div class=" d-flex">
                    <button class=" btn btn-dark ms-auto m-3">
                      <a href="./tour/tour_details.php?id=<?= $row['tour_id'] ?>" class="link-light text-decoration-none">lihat selengkapnya</a>
                    </button>
                  </div>

                </div>
              </div>
            </div>
          </div>
        <?php
          $count++; // Increment hitung setiap kali iterasi
          if ($count >= 4) {
            break; // Berhenti setelah 4 iterasi
          }
        endwhile;
        ?>


        <!-- <div class="card mb-4 mx-auto shadow" style="max-width: 543px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="/FunTour/assets/bromo.webp" class="rounded-start h-100 w-100 object-fit-cover" alt="...">
            </div>
            <div class="col-md-8 mx-auto text-start">
              <div class="card-body">
                <h4 class="card-title">bromo touring </h4>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                <p class=" card-text ">tanggal : <b>13-12-2023 - 12-1-2024</b></p>
                <p class=" card-text ">harga : <b>Rp. 2 jt</b></p>
                <div class=" d-flex">
                  <button class=" btn btn-dark ms-auto m-3">lihat selengkapnya</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-4 mx-auto shadow" style="max-width: 543px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="/FunTour/assets/brobudur.jpg" class="rounded-start h-100 w-100 object-fit-cover" alt="...">
            </div>
            <div class="col-md-8 mx-auto text-start">
              <div class="card-body">
                <h4 class="card-title">bromo touring </h4>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                <p class=" card-text ">tanggal : <b>13-12-2023 - 12-1-2024</b></p>
                <p class=" card-text ">harga : <b>Rp. 2 jt</b></p>
                <div class=" d-flex">
                  <button class=" btn btn-dark ms-auto m-3">lihat selengkapnya</button>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <div class="m-auto mb-5 mt-5">
          <button class="btn btn-dark btn-lg">
            <a href="./tour/" class=" text-decoration-none text-white">See More</a>
          </button>
        </div>

      </div>
    </div>
    <!-- artikel -->
    <div class="container-fluid col-md-11 mt-5 justify-content-center">
      <div class="mb-5">
        <h1>Panduan Perjalanan</h1>
      </div>

      <div class="row row-cols-1 row g-0 ">
        <?php
        $hasil_t = mysqli_query($conn, "SELECT * FROM articles");
        while ($row = mysqli_fetch_array($hasil_t)) :
        ?>
          <div class="card mb-3 shadow" style="width: 90vw;">
            <div class="row g-0 ">
              <div class="col-md-4">
                <img src="<?= $row['image_url'] ?>" class="h-100 w-100 rounded-start object-fit-cover object-position-center center"  style="max-height: 300px;" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body text-start">
                  <h2 class="card-title"><?= $row['title'] ?></h2>
                  <p class="card-text"><?= substr($row['content'], 0, 400) . (strlen($row['content']) > 400 ? '...' : '') ?></p>
                  <a href="./artikel/artikel_details.php?id=<?= $row['article_id']?>" class="stretched-link"></a>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile ?>
        <!-- <div class="card mb-3 shadow" style="width: 90vw;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="assets/rumah.jpeg" class="h-100 w-100 rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3 shadow" style="width: 90vw;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="assets/rumah.jpeg" class="h-100 w-100 rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
          </div>
        </div> -->

      </div>
    </div>

  </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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