    <?php
    require_once '../connect_db.php';
    session_start();
    // $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];

    $isLoggedIn = isset($_SESSION['user_id']);

    $verf_id = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$user_id'");

    $history_query = mysqli_query($conn, "SELECT tours.tour_id, tourists.tourist_id, tourists.jumlah_beli, tourists.total_harga, tourists.tanggal_beli, tours.tour_name, tours.start_date, tours.end_date, tours.price
                                    FROM tourists
                                    INNER JOIN tours ON tourists.tour_id = tours.tour_id
                                    WHERE tourists.user_id = '$user_id'
                                    ORDER BY tourists.tourist_id DESC");

    $history_data = array();
    while ($row = mysqli_fetch_assoc($history_query)) {
        $history_data[] = $row;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Profile|FunTour</title>
    </head>

    <body>
        <?php

        while ($row = mysqli_fetch_assoc($verf_id)) :
        ?>
            <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light-subtle shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/FunTour/">FunTour</a>
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

                        <button class="btn btn-dark ms-auto" type="button">
                            <a href="../logout.php" class="link-light text-decoration-none">
                                Log out
                            </a>
                        </button>
                    </div>
                </div>
            </nav>

            <section style="background-color: #eee;">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src="/FunTour/assets/profileplcholder.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3">
                                        <?= $row["username"] ?>
                                    </h5>
                                    <p class="text-muted mb-1"></p>
                                    <p class="text-muted mb-4"><?= $row['email'] ?></p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <button type="button" class="btn btn-outline-dark ms-1">
                                            <a href="../logout.php" class=" text-decoration-none text-black">Logout</a>
                                        </button>
                                        <!-- <button type="button" class="btn btn-dark ms-1 w-25">
                                            <a href="" class=" text-decoration-none text-white">Edit</a>
                                        </button> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4 mb-lg-0">
                                <div class="card-body p-0">
                                    <!-- <ul class="list-group list-group-flush rounded-3">
                                        <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                                            <a href="../tambah_tour/" class=" stretched-link"></a>
                                            tambah Tour
                                        </li>
                                        <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                                            <a href="../tambah_artikel/" class=" stretched-link"></a>
                                            tambah artikel
                                        </li>
                                        <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                                            <a href="" class=" stretched-link"></a>
                                            History Perjalanan
                                        </li>
                                    </ul> -->
                                    <div class="accordion" id="accordionExample">
                                        <?php if ($_SESSION['user_type'] === 'admin') { ?>
                                            <!-- tour -->
                                            <div class="accordion-item ">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        Tour
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item d-flex justify-content-center align-items-center ">
                                                                <a href="../tambah_tour/" class=" stretched-link"></a>
                                                                tambah Tour
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-center align-items-center ">
                                                                <a href="../edit_tour/" class=" stretched-link"></a>
                                                                Edit dan hapus Tour
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- artikel -->
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Artikel
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <ul class="list-group list-group-flush">

                                                            <li class="list-group-item d-flex justify-content-center align-items-center ">
                                                                <a href="../tambah_artikel/" class=" stretched-link"></a>
                                                                tambah Artikel
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-center align-items-center ">
                                                                <a href="../edit_artikel/" class=" stretched-link"></a>
                                                                Edit dan hapus Artikel
                                                            </li>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <ul class="list-group list-group-flush rounded-3">
                                            <li class="list-group-item  p-3">
                                                <a href="history.php" class=" stretched-link"></a>
                                                History Perjalanan
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $row["first_name"] ?> <?= $row["last_name"] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $row['email'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $row['phone'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $row['address'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <!-- history tour -->
                        <div class="row row-cols-2">
                            <?php
                            $tour_count = 0;
                            foreach ($history_data as $tour) :

                                if ($tour_count >= 2) {
                                    break;
                                }
                            ?>
                                <div class="col-md-6">
                                    <div class="card mb-4 mb-md-0 h-100">
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $tour['tour_name'] ?></h4>
                                            <p class=" card-text ">tanggal : <br> <?= $tour['start_date'] ?> s.d. <?= $tour['end_date'] ?></p>
                                            <p class=" card-text ">harga : <br> Rp. <?= number_format($tour['total_harga'], 0, ',', ',')  ?></p>
                                            <p class=" card-text ">Tiket : <br> <?= $tour['jumlah_beli'] ?> orang</p>
                                            <p class=" card-text ">tanggal beli : <br> <?= $tour['tanggal_beli'] ?></p>
                                            <div class="d-flex ms-auto">
                                                <button class=" btn btn-dark ms-auto m-3" style="position: absolute; bottom: 0; right: 0;">
                                                    <a href="../tour/tour_details.php?id=<?= $tour['tour_id'] ?>" class="link-light text-decoration-none">lihat tour</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $tour_count++;
                            endforeach;
                            ?>
                        </div>
                        </div>
                    </div>
                </div>
            </section>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <script>
                $(".dropdown-toggle").on("click", function() {
                    $(".collapse.show").removeClass("show");
                });
            </script>


    </body>

    </html>