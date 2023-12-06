<?php
require_once '../connect_db.php';
session_start();
// $user_id = $_SESSION['user_id'];
// $verf_id = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$user_id'");
$isLoggedIn = isset($_SESSION['user_id']);

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$tour_id = $_GET['id'];
$query = "SELECT * FROM tours WHERE tour_id = '$tour_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit|FunTour</title>
</head>

<body>

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
                        <img src="../assets/profileplcholder.jpg" alt="" class="rounded-circle img-fluid" style="width: 43px;">
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

    <div class="container justify-content-center mt-5">
        <div class=" text-center">
            <h2> Edit Tour</h2>
        </div>
        <form action="edit_logic.php" class="row need" method="post" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="tour_id" value="<?= $tour_id ?>">

            <!-- judul tournya -->
            <div class="col-12 mt-2">
                <label for="tour_name" class="form-label ms-3">Nama tour</label>
                <input type="text" class="form-control border-black rounded-5 shadow-sm" value="<?= $row['tour_name'] ?>" id="tour_name" name="tour_name" placeholder="Nama tour anda" required>
                <?php if (isset($_SESSION['message'])) : ?>
                    <p class=" "> <?php echo $_SESSION['message']; ?> </p>
                <?php
                    session_destroy();
                endif;
                ?>
            </div>
            <!-- kapasitas -->
            <div class="col-6 mt-2">
                <label for="max_capacity" class="form-label ms-3">Kapasitas orang</label>
                <input type="number" class="form-control border-black rounded-5 shadow-sm" value="<?= $row['max_capacity'] ?>" id="max_capacity" name="max_capacity" required>
            </div>
            <!--tgl mulai  -->
            <div class="col-6 mt-2">
                <label for="start_date" class="form-label ms-3">Tanggal mulai</label>
                <input type="date" class="form-control border-black rounded-5 shadow-sm" value="<?= $row['start_date'] ?>" id="start_date" name="start_date">
            </div>
            <!-- tanggal kelar -->
            <div class="col-6 mt-2">
                <label for="end_date" class="form-label ms-3">Tanggal selesai</label>
                <input type="date" class="form-control border-black rounded-5 shadow-sm" value="<?= $row['end_date'] ?>" id="end_date" name="end_date">
            </div>
            <!-- harganya -->
            <div class="col-12 mt-2">
                <label for="price" class="form-label ms-3">Harga</label>
                <div class="input-group mb-3">
                    <span class="input-group-text rounded-start-5 border-black">Rp.</span>
                    <input type="number" class="form-control rounded-end-5 border-black" value="<?= $row['price'] ?>" id="price" name="price">
                </div>
            </div>
            <!-- penjelasan -->
            <div class="col-12 mt-2">
                <label for="description" class="form-label ms-3">Deskripsi</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control border-black rounded-5 shadow-sm" placeholder="penjelasan singkat"><?= $row['description'] ?> </textarea>
            </div>

            <div class="col-3 mx-auto mt-5">
                <button type="submit" class="form-control btn btn-dark">Submit</button>
            </div>
            <!-- <script>
                // Check if the PHP variable $message is set and not empty
                <?php if (isset($message)) : ?>
                    // Display the message in a JavaScript alert
                    alert("<?= $_SESSION['message']; ?>");
                <?php endif; ?>
            </script> -->
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



</body>

</html>