<?php
require_once '../connect_db.php';
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
  <title>Tour|FunTour</title>
  <link rel="stylesheet" href="style-home.css">
</head>

<body class="bg-light-subtle">
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light-subtle">
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
            <a class="nav-link active" href="/FunTour/about/index.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href=" ">Tour</a>
          </li>
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
            <img src="../assets/profileplcholder.jpg" alt="" class="rounded-circle img-fluid" style="width: 43px;">
            <a href="../profile/" class="text-black ms-auto navbar-text">
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



  <div class="container-fluid">
    <!-- card daftar tournya -->
    <div class="container-fluid col-11 mt-5 justify-content-center">
      <div class="mb-5">
        <h1>Jelajahi Indonesia</h1>
      </div>

      <div class="row row-cols-1 row-cols-lg-2 g-0 ">
        <?php
        $hasil_t = mysqli_query($conn, "SELECT * FROM tours");
        while ($row = mysqli_fetch_array($hasil_t)) :
        ?>
          <div class="card mb-4 mx-auto shadow" style="max-width: 543px; ">
            <div class="row g-0">
              <div class="col-md-4">
                <img src=".<?= $row['image_url'] ?>" class="rounded-start h-100 w-100 object-fit-cover d-block" style="height: auto;" alt="...">
              </div>
              <div class="col-md-8 mx-auto text-start">
                <div class="card-body">
                  <h4 class="card-title"> <?= $row['tour_name'] ?> </h4>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                  <p class=" card-text ">tanggal : <b><?= $row['start_date'] ?> sd <?= $row['end_date'] ?></b></p>
                  <p class=" card-text ">harga : <b>Rp.<?= $row['price'] ?></b></p>
                  <div class=" d-flex">
                    <button class=" btn btn-dark ms-auto m-3">
                      <a href="./tour_details.php?id=<?= $row['tour_id']?>" class="link-light text-decoration-none">lihat selengkapnya</a>
                    </button>
                  </div>

                </div>
              </div>
            </div>
          </div>
        <?php endwhile ?>

       

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