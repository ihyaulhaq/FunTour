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
    <?php
    if (isset($_SESSION['berhasil_reservasi'])) {
        echo $_SESSION['berhasil_reservasi'];
        unset($_SESSION['berhasil_reservasi']); // Remove the session variable after displaying the message
    }
    ?>
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



    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <img src="<?= $row['image_url'] ?>" alt="<?= $row['tour_name'] ?>" class="rounded-5 h-100 w-100 object-fit-cover p-2">
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
                <!-- detail -->
                <div class="product-details mt-3">
                    <p class=" card-text "><b>tanggal :</b><br>
                        <?= $row['start_date'] ?> <b>s.d.</b> <?= $row['end_date'] ?></p>
                    <p><strong>Harga:</strong><br> Rp.
                        <?= number_format($row['price'], 0, ',', ',') ?>
                    </p>
                    <p><strong>kapasitas orang:</strong><br>
                        <?= $row['max_capacity'] ?> orang
                    </p>
                    <p><strong> Terisi:</strong><br>
                        <?= $row['current_capacity'] ?> orang
                    </p>
                </div>

                <div class="d-flex">
                    <button class="btn btn-outline-dark" onclick="decrease()" title="Decrease">-</button>
                    <input type="number" class="form-control w-25" name="quantity" id="quantity" value="0" oninput="updateQuantity(<?= $row['max_capacity'] ?>)">
                    <button class="btn btn-outline-dark" onclick="increase(<?= $row['max_capacity'] - $row['current_capacity'] ?>)" title="Increase">+</button>
                </div>

                <form method="POST" action="reservasi.php">
                    <!-- Add hidden fields to store information -->
                    <input type="hidden" name="tour_id" value="<?= $tour_id ?>">
                    <input type="hidden" name="price" value="<?= $row['price'] ?>">
                    <input type="hidden" name="tanggal_beli" value="<?= date('Y-m-d H:i:s') ?>">
                    <input type="hidden" name="hidden_quantity" value="0">


                    <!-- Action Buttons -->
                    <div class="action-buttons mt-4">
                        <?php if ($isLoggedIn) : ?>
                            <button type="submit" class="btn btn-dark" name="reservasi">Reservasi sekarang</button>

                        <?php else : ?>
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Reservasi sekarang</button>

                        <?php endif; ?>
                    </div>
                </form>

                <!-- modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center fs-5 ">
                                Anda harus login
                            </div>
                            <div class="modal-footer border-0 ">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-dark"> <a href="../login/login-page.php" class="link-light text-decoration-none">Login</a></button>
                            </div>
                        </div>
                    </div>
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
                updateQuantity(limit); // Update hidden input field value
                updateButtonState();
            } else {
                quantityInput.value = limit;
                updateQuantity(limit); // Update hidden input field value
                updateButtonState();
            }
        }

        function decrease() {
            var quantityInput = document.getElementById("quantity");
            var currentVal = parseInt(quantityInput.value);

            if (!isNaN(currentVal) && currentVal > 0) {
                quantityInput.value = currentVal - 1;
                updateQuantity(); // Update hidden input field value
                updateButtonState();
            } else {
                quantityInput.value = 0;
                updateQuantity(); // Update hidden input field value
                updateButtonState();
            }
        }

        function updateQuantity(limit) {
            var quantityInput = document.getElementById("quantity");
            var hiddenQuantityInput = document.querySelector('input[name="hidden_quantity"]');
            var currentVal = parseInt(quantityInput.value);

            if (!isNaN(currentVal)) {
                if (currentVal > limit) {
                    quantityInput.value = limit;
                    hiddenQuantityInput.value = limit; // Update hidden input field value
                } else if (currentVal < 0) {
                    quantityInput.value = 0;
                    hiddenQuantityInput.value = 0; // Update hidden input field value
                } else {
                    hiddenQuantityInput.value = currentVal; // Update hidden input field value
                }
            } else {
                quantityInput.value = 0;
                hiddenQuantityInput.value = 0; // Update hidden input field value
            }
        }

        function updateButtonState() {
            var quantity = parseInt(document.getElementById("quantity").value);
            var reservasiButton = document.querySelector('button[name="reservasi"]');

            if (quantity === 0) {
                reservasiButton.disabled = true; // Disable button
            } else {
                reservasiButton.disabled = false; // Enable button
            }
        }

        // Initial button state check on page load
        window.onload = function() {
            updateButtonState();
        };
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