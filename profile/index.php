    <?php
    require_once '../connect_db.php';
    session_start();
    // $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];

    $verf_id = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$user_id'");
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
            <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light-subtle">
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
            <!-- <div class=" container-fluid row ">
        <div class=" col-3 border-black border">
            <div class=" ">
                <img src="/FunTour/assets/profileplcholder.jpg" alt="" class=" rounded-5 rounded-circle" style="max-height: 100px; max-width: 100px;">
            </div>
        </div>
        <div class="col-9 border border-black">
            nobcq

        </div>
    </div> -->
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
                                    <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <button type="button" class="btn btn-outline-dark ms-1">
                                            <a href="../logout.php" class=" text-decoration-none text-black">Logout</a>
                                        </button>
                                        <button type="button" class="btn btn-dark ms-1 w-25">
                                            <a href="" class=" text-decoration-none text-white">Edit</a>
                                        </button>
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
                                        <div class="accordion-item ">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Tour
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
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
                                                            <a href="#" class=" stretched-link"></a>
                                                            Edit Artikel
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-center align-items-center ">
                                                            <a href="#" class=" stretched-link"></a>
                                                            Hapus Artikel
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-flush rounded-3">
                                        <li class="list-group-item  p-3">
                                            <a href="" class=" stretched-link"></a>
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
                        <div class="row">
                            <div class="col-md-6">
                                <!-- <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                                    </p>
                                    <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                    <div class="progress rounded mb-2" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div> -->

                                <div class="card mb-4 md mb-md-0">
                                    <div class="card-body">
                                        <h4 class="card-title">bromo touring </h4>
                                        <p class=" card-text ">tanggal : <b>13-12-2023 - 12-1-2024</b></p>
                                        <p class=" card-text ">harga : <b>Rp. 2 jt</b></p>
                                        <p class=" card-text ">Tiket : <b> 2 orang</b></p>
                                        <!-- <div class=" d-flex">
                                        <button class=" btn btn-dark ms-auto m-3">lihat selengkapnya</button>
                                    </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                                    </p>
                                    <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                    <div class="progress rounded mb-2" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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