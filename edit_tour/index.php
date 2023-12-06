<?php
require_once '../connect_db.php';
session_start();
// $username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$hasil_t = mysqli_query($conn, "SELECT * FROM tours WHERE author_id = '$user_id'");

// $verf_id = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$user_id'");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Edit|FunTour</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light-subtle shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="/FunTour/">FunTour</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mb-4 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/FunTour/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="">History</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Other
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Tambah konten</a></li>
                            <li><a class="dropdown-item" href="#"></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>

                <button class="btn btn-dark ms-auto" type="button">
                    <a href="../logout.php" class="link-light text-decoration-none">
                        Log out
                    </a>
                </button>
            </div>
        </div>
    </nav>
    <div class="container-fluid col-11 mt-5 ">
        <div class="mb-5">
            <h1>Tour milik anda</h1>
        </div>

        <div class="row row-cols-1 row-cols-lg-2 g-0 ">
            <?php
            while ($row = mysqli_fetch_array($hasil_t)) :
            ?>
                <div class="card mb-4 mx-auto shadow" style="max-width: 543px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src=".<?= $row['image_url'] ?>" class="rounded-start h-100 w-100 object-fit-cover" alt="...">
                        </div>
                        <div class="col-md-8 mx-auto text-start">
                            <div class="card-body">
                                <h4 class="card-title"> <?= $row['tour_name'] ?> </h4>
                                <p class="card-text"><?= substr($row['description'], 0, 100) . (strlen($row['description']) > 100 ? '...' : '') ?></p>
                                <p class=" card-text ">tanggal : <b><?= $row['start_date'] ?> sd <?= $row['end_date'] ?></b></p>
                                <p class=" card-text ">harga : <b>Rp.<?= $row['price'] ?></b></p>
                                <div class=" d-flex">
                                    <button class=" btn btn-dark ms-auto m-3 w-25">
                                        <a href="edit_tour.php?id=<?= $row['tour_id'] ?>" class=" link-light text-decoration-none">Edit</a>
                                    </button>
                                    <form action="" method="post" class="m-3">
                                        <input type="hidden" name="tour_id" value="<?= $row['tour_id'] ?>">
                                        <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- pop up konfirmasi  -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda ingin menghapus produk ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <form action="hapus_tour.php" method="post">

                                    <button type="submit" class="btn btn-danger" name="tour_id" value="<?= $row['tour_id'] ?>">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>




        </div>
    </div>
    <?php
    if (isset($_SESSION['berhasil'])) {
        echo $_SESSION['berhasil'];
        unset($_SESSION['berhasil']); // Remove the session variable after displaying the message
    }
    ?>

</body>

</html>