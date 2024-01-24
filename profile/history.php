<?php
require_once '../connect_db.php';
session_start();
// $isLoggedIn = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
// $username = $isLoggedIn ? $_SESSION['username'] : 'Guest';'
$items_per_page = 10; // Number of items to display per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Get the current page number or default to page 1
$start_from = ($page - 1) * $items_per_page; // Calculate the starting point for fetching data
$isLoggedIn = isset($_SESSION['user_id']);
$user_id = $_SESSION['user_id'];

$status_user = $_SESSION['user_type'];

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



    <div class="container-fluid">

        <div class="container-fluid col-11 mt-5 justify-content-center mb-4">
            <div class="mb-5 ms-2">
                <h1>History </h1>
            </div>

            <div class="row row-cols-1 row-cols-lg-2 g-0 ">
                <table class="table" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID User</th>
                            <th>Nama Tour</th>
                            <th>Tanggal</th>
                            <th>Total Harga</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah Tiket</th>
                            <th>Tanggal Pembelian</th>
                            <th>Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM tourists");
                        $total_row = mysqli_fetch_assoc($total_query);
                        $total_pages = ceil($total_row['total'] / $items_per_page);

                        // $query = "SELECT tours.tour_id, tourists.tourist_id, tourists.jumlah_beli, tourists.total_harga, tourists.tanggal_beli, tours.tour_name, tours.start_date, tours.end_date, tours.price
                        //             FROM tourists
                        //             INNER JOIN tours ON tourists.tour_id = tours.tour_id
                        //             WHERE tourists.user_id = '$user_id'
                        //             ORDER BY tourists.tourist_id DESC LIMIT $start_from, $items_per_page";

                        // $query_admin = "SELECT tours.tour_id, tourists.tourist_id, tourists.jumlah_beli, tourists.total_harga, tourists.tanggal_beli, tours.tour_name, tours.start_date, tours.end_date, tours.price
                        //             FROM tourists
                        //             INNER JOIN tours ON tourists.tour_id = tours.tour_id
                        //             ORDER BY tourists.tourist_id DESC LIMIT $start_from, $items_per_page";
                        $query = ''; // Inisialisasi query kosong

                        if ($status_user === 'admin') {

                            $query = "SELECT tourists.user_id, tours.tour_id, tourists.tourist_id, tourists.jumlah_beli, tourists.total_harga, tourists.tanggal_beli, tours.tour_name, tours.start_date, tours.end_date, tours.price
                            FROM tourists
                            INNER JOIN tours ON tourists.tour_id = tours.tour_id
                            ORDER BY tourists.tourist_id DESC LIMIT $start_from, $items_per_page";

                            $total_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM tourists");
                            $total_row = mysqli_fetch_assoc($total_query);
                            $total_pages = ceil($total_row['total'] / $items_per_page);
                        } else {

                            $query = "SELECT tourists.user_id, tours.tour_id, tourists.tourist_id, tourists.jumlah_beli, tourists.total_harga, tourists.tanggal_beli, tours.tour_name, tours.start_date, tours.end_date, tours.price
                            FROM tourists
                            INNER JOIN tours ON tourists.tour_id = tours.tour_id
                            WHERE tourists.user_id = '$user_id'
                            ORDER BY tourists.tourist_id DESC LIMIT $start_from, $items_per_page";

                            $total_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM tourists WHERE user_id = '$user_id'");
                            $total_row = mysqli_fetch_assoc($total_query);
                            $total_pages = ceil($total_row['total'] / $items_per_page);
                        }

                        $hasil_query = mysqli_query($conn, $query);

                        // $hasil_admin = mysqli_query($conn, $query_admin);
                        // $hasil_t = mysqli_query($conn, $query);
                        ?>

                        <?php
                        $no = $start_from + 1;
                        while ($row = mysqli_fetch_array($hasil_query)) :
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?=$row['user_id'] ?></td>
                                <td><?= $row['tour_name'] ?></td>
                                <td><?= $row['start_date'] ?> s.d. <?= $row['end_date'] ?></td>
                                <td>Rp. <?= number_format($row['total_harga'], 0, ',', ',') ?></td>
                                <td>Rp. <?= number_format($row['price'], 0, ',', ',') ?></td>
                                <td><?= $row['jumlah_beli'] ?> orang</td>
                                <td><?= $row['tanggal_beli'] ?></td>
                                <td>
                                    <a href="../tour/tour_details.php?id=<?= $row['tour_id'] ?>" class="btn btn-dark">Lihat Tour</a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        endwhile
                        ?>
                    </tbody>
                </table>

            </div>

            <!-- pagination -->
            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <!-- sebelum -->
                        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>"">
              <a class=" page-link" href="?page=<?= ($page - 1) ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <!-- halaman -->
                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                            <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                        <!-- next -->
                        <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= ($page + 1) ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
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