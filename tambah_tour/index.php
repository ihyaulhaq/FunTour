<?php
require_once '../connect_db.php';
session_start();
// $isLoggedIn = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
// $username = $isLoggedIn ? $_SESSION['username'] : 'Guest';
$isLoggedIn = isset($_SESSION['user_id']);
$sql_d = "SELECT destination_id, destination_name FROM destinations";
$result_d = mysqli_query($conn, $sql_d);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Tambah|FunTour</title>
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
                        <a class="nav-link active" href="../tour/">About</a>
                    </li>
                </ul>

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

    <div class="container justify-content-center mt-5">
        <div class=" text-center">
            <h2> Tambah Tour</h2>
        </div>
        <form action="tambah_tour.php" class="row need" method="post" enctype="multipart/form-data" novalidate>
            <!-- judul tournya -->
            <div class="col-12 mt-2">
                <label for="tour_name" class="form-label ms-3">Nama tour</label>
                <input type="text" class="form-control border-black rounded-5 shadow-sm" id="tour_name" name="tour_name" placeholder="Nama tour anda" required>
                <?php if (isset($_SESSION['message'])) : ?>
                    <p class=" "> <?php echo $_SESSION['message']; ?> </p>
                <?php
                    session_destroy();
                endif;
                ?>
            </div>
            <!-- detinasi -->
            <div class="col-6 mt-2">
                <label for="destinations" class="form-label ms-3">Destinasi Wisata</label>
                <div class="input-group">
                    <select class="form-select rounded-5 border-black" id="destination_id" name="destination_id">
                        <option selected>Choose...</option>

                        <?php
                        // Loop through the results and populate the dropdown
                        if (mysqli_num_rows($result_d) > 0) {
                            while ($row = mysqli_fetch_assoc($result_d)) {
                                echo "<option value='" . $row["destination_id"] . "'>" . $row["destination_name"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No destinations found</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!-- kapasitas -->
            <div class="col-6 mt-2">
                <label for="max_capacity" class="form-label ms-3">Kapasitas orang</label>
                <input type="number" class="form-control border-black rounded-5 shadow-sm" id="max_capacity" name="max_capacity" required>
            </div>
            <!--tgl mulai  -->
            <div class="col-6 mt-2">
                <label for="start_date" class="form-label ms-3">Tanggal mulai</label>
                <input type="date" class="form-control border-black rounded-5 shadow-sm" id="start_date" name="start_date">
            </div>
            <!-- tanggal kelar -->
            <div class="col-6 mt-2">
                <label for="end_date" class="form-label ms-3">Tanggal selesai</label>
                <input type="date" class="form-control border-black rounded-5 shadow-sm" id="end_date" name="end_date">
            </div>
            <!-- harganya -->
            <div class="col-12 mt-2">
                <label for="price" class="form-label ms-3">Harga</label>
                <div class="input-group mb-3">
                    <span class="input-group-text rounded-start-5 border-black">Rp.</span>
                    <input type="number" class="form-control rounded-end-5 border-black" id="price" name="price">
                </div>
            </div>
            <!-- penjelasan -->
            <div class="col-12 mt-2">
                <label for="description" class="form-label ms-3">Deskripsi</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control border-black rounded-5 shadow-sm" placeholder="penjelasan singkat"></textarea>
            </div>
            <!-- gambar -->
            <div class="col-12 mt-2">
                <label for="image_url" class="form-label ms-3">Gambar</label>
                <input type="file" class="form-control border-black rounded-5 shadow-sm" id="image_url" name="image_url" accept="image/*">
            </div>
            <div class="col-3 mx-auto mt-5">
                <button type="submit" class="form-control btn btn-dark">Submit</button>
            </div>
            <script>
                // Check if the PHP variable $message is set and not empty
                <?php if (isset($message)): ?>
                    // Display the message in a JavaScript alert
                    alert("<?= $_SESSION['message']; ?>");
                <?php endif; ?>
            </script>
        </form>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

<footer>
    <div class="text-center bg-black text-light mt-5 pt-5 pb-3">
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