<?php
require_once '../connect_db.php';
session_start();

$isLoggedIn = isset($_SESSION['user_id']);
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
    <title>Details|FunTour</title>
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



    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <img src=".<?= $row['image_url'] ?>" alt="<?= $row['tour_name'] ?>" class="rounded-5 h-100 w-100 object-fit-cover p-2">
            </div>
            <div class="col-lg-6 mt-5">
                <h2>
                    <strong>
                        <?= $row['tour_name'] ?>
                    </strong>
                </h2>
                <p>
                    <?= $row['description'] ?>
                </p>

                <!-- Price and Stock -->
                <div class="product-details mt-3">
                    <p class=" card-text "><b>tanggal :</b><br>
                        <?= $row['start_date'] ?> <b>s.d.</b> <?= $row['end_date'] ?></p>
                    <p><strong>Harga:</strong><br> Rp.
                        <?= $row['price'] ?>
                    </p>
                    <p><strong>kapasitas orang:</strong><br>
                        <?= $row['max_capacity'] ?> orang
                    </p>
                    <p><strong> Terisi:</strong><br>
                        <?= $row['current_capacity'] ?> orang
                    </p>
                </div>

                <!-- Quantity Input -->
                <div class="d-flex">
                    <button class="btn btn-outline-dark" onclick="decrease()" title="Decrease">-</button>
                    <input type="number" class="form-control w-25" name="quantity" id="quantity" value="0" oninput="validateQuantity(<?= $row['max_capacity'] ?>)">
                    <button class="btn btn-outline-dark" onclick="increase(<?= $row['max_capacity'] ?>)" title="Increase">+</button>
                </div>



                <!-- Action Buttons -->
                <div class="action-buttons mt-4">
                    <button class="btn btn-dark">Reservasi sekarang</button>
                </div>
            </div>
        </div>

    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function increase(limit) {
            var quantityInput = document.getElementById("quantity");
            var currentVal = parseInt(quantityInput.value);

            if (!isNaN(currentVal) && currentVal < limit) {
                quantityInput.value = currentVal + 1;
            } else {
                // Jika currentVal lebih dari atau sama dengan limit, atur nilainya menjadi limit
                quantityInput.value = limit;
            }
        }

        function decrease() {
            var quantityInput = document.getElementById("quantity");
            var currentVal = parseInt(quantityInput.value);

            if (!isNaN(currentVal) && currentVal > 0) {
                quantityInput.value = currentVal - 1;
            } else {
                // Jika currentVal kurang dari atau sama dengan 0, atur nilainya menjadi 0
                quantityInput.value = 0;
            }
        }

        function validateQuantity(limit) {
            var quantityInput = document.getElementById("quantity");
            var currentVal = parseInt(quantityInput.value);

            if (!isNaN(currentVal)) {
                if (currentVal > limit) {
                    // Jika nilai lebih besar dari limit, atur nilainya menjadi limit
                    quantityInput.value = limit;
                } else if (currentVal < 0) {
                    // Jika nilai kurang dari 0, atur nilainya menjadi 0
                    quantityInput.value = 0;
                }
            } else {
                // Jika nilai bukan angka, atur nilainya menjadi 0
                quantityInput.value = 0;
            }
        }
    </script>

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