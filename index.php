<?php
require_once 'C:/xampp/htdocs/FunTour/connect_db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Document</title>
  <link rel="stylesheet" href="style-home.css">
</head>

<body class="bg-light-subtle">
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light-subtle">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">FunTour</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Tour
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex w-50 mx-auto" role="search">
          <input class="form-control me-2 bg-white border-dark w-100" type="search" placeholder="Search"
            aria-label="Search">
          <button class="btn btn-outline-dark " type="submit">Search</button>
        </form>
        <button class="btn btn-dark ms-auto" type="button">
          <a href="/FunTour/login/login.html" class="link-light text-decoration-none">
            Log In
          </a>
        </button>
      </div>
    </div>
  </nav>

  <div class="text-center">
    <!-- carousel -->
    <div>
      <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/latar.jpg" class="d-block w-100 gambar-carousel" alt="...">
            <div class="carousel-caption d-md-block bg-black-carousel">
              <h5>bromo</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/brobudur.jpg" class="d-block w-100" alt="..." style=" object-fit: cover;  height: 500px;">
            <div class="carousel-caption d-md-block bg-black-carousel">
              <h5>Sumeru</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/rinjani.jpg" class="d-block w-100" alt="..." style="object-fit: cover; height: 500px;">
            <div class="carousel-caption d-md-block bg-black-carousel">
              <h5>rinjani</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <!-- card tengah pilihn destinasi -->
    <div class="col-md-9 col-sm-4 container-fluid font-card-tengah justify-content-center">
      <div class="pt-5">
        <h1>Destinasi Wisata</h1>
      </div>
      <div class="row row-cols-2 row-cols-md-4 g-0">
      <?php
      $hasil = mysqli_query($conn,"SELECT destination_name,description FROM destinations");
      while ($row = mysqli_fetch_array($hasil)):
        ?>
        
        <div class="col g-4">
          <div class="card h-100 shadow">
            <img src="assets/bromo.webp" class="card-img-top" alt="assets/bromo.webp">
            <div class="card-body pb-2">
              <h5 class="card-title"><?= $row['destination_name'] ?></h5>
              <p class="card-text"><?= $row['description']?></p>
                <a href="#" class="stretched-link"> </a>
            </div>
          </div>
        </div>
        <?php endwhile ?>
      </div>
    </div>

    
    <!-- card daftar tournya -->
    <div class="container mt-5">
      <div class="mb-5">
        <h1>Jelajahi Indonesia</h1>
      </div>

      <div class="row row-cols-1 row-cols-md-2 g-0 ">
        <div class="card mb-4  mx-lg-auto shadow" style="max-width: 510px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="/FunTour/assets/rumah.jpeg" class="h-100 w-100 rounded-start" alt="...">
            </div>
            <div class="col-md-8 mx-auto">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-4 mx-lg-auto shadow" style="max-width: 510px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="/FunTour/assets/rumah.jpeg" class=" h-100 w-100 rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body mx-auto">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-4 mx-lg-auto shadow" style="max-width: 510px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="/FunTour/assets/bromo.webp" class="h-100 w-100 rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title mx-auto">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-4 mx-lg-auto shadow" style="max-width: 510px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="/FunTour/assets/rumah.jpeg" class="h-100 w-100 rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- artikel -->
    <div class="container mt-5">
      <div class="mb-5">
        <h1>Panduan Perjalanan</h1>
      </div>

      <div class="row row-cols-1 row g-0 ">
        <div class="card mb-3 shadow" style="max-width: 510 px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="assets/rumah.jpeg" class="h-100 w-100 rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3 shadow" style="max-width: 510 px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="assets/rumah.jpeg" class="h-100 w-100 rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3 shadow" style="max-width: 510 px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="assets/rumah.jpeg" class="h-100 w-100 rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</body>

<footer >
  <div class="text-center bg-black text-light pt-5 pb-3">
    <div class="container-fluid">
      <div>
        <div class="col-lg-12">
          <h6>  FUNTOUR</h6>
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