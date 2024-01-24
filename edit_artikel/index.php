<?php
require_once '../connect_db.php';
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../");
    exit();
}
if ($_SESSION['user_type'] !== 'admin'){
    header("Location: ../");
    exit();
}

$isLoggedIn = isset($_SESSION['user_id']);
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$hasil_t = mysqli_query($conn, "SELECT * FROM articles");

// $verf_id = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$user_id'");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Edit | FunTour</title>
</head>

<body>

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
                        <a href="./login/login-page.php" class="link-light text-decoration-none">
                            Log In
                        </a>
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container-fluid col-11 mt-5 ">
        <div class="mb-5">
            <h1 class="ms-3">Artikel</h1>
        </div>

        <div class="row row-cols-1 row-cols-lg-2 g-0 ">
            <?php
            while ($row = mysqli_fetch_array($hasil_t)) :
            ?>
                <div class="card mb-4 mx-auto shadow" style="max-width: 543px; min-height: 320px">
                    <div class="row g-0 h-100 w-100">
                        <div class="col-md-4">
                            <img src="<?= $row['image_url'] ?>" class="rounded-start w-100 h-100 object-fit-cover" alt="<?= $row['title'] ?>">
                        </div>
                        <div class="col-md-8 mx-auto text-start">
                            <div class="card-body h-100">
                                <h4 class="card-title"> <?= $row['title'] ?> </h4>
                                <p class="card-text"><?= substr($row['content'], 0, 100) . (strlen($row['content']) > 100 ? '...' : '') ?></p>
                                <p class=" card-text ">tanggal dibuat : <?= $row['publication_date'] ?></p>
                                <p class=" card-text ">Author : <?=$username ?></p>
                                <div class=" d-flex justify-content-end" >
                                    <div class="me-0">
                                        <button class=" btn btn-dark m-3 w-75" type="button">
                                            <a href="edit_artikel.php?id=<?= $row['article_id'] ?>" class=" link-light text-decoration-none">Edit</a>
                                        </button>
                                    </div>
                                    <form action="" method="post" class="m-3">
                                        <input type="hidden" name="article_id" value="<?= $row['article_id'] ?>">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
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
                                Apakah anda ingin menghapus artikel ini?
                                <?= $row['article_id'] ?>"
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <form action="hapus_artikel.php" method="post">
                                    <button type="submit" class="btn btn-danger" name="article_id" value="<?= $row['article_id'] ?>">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>




        </div>
    </div>
    <?php
    if (isset($_SESSION['berhasil_artikel'])) {
        echo $_SESSION['berhasil_artikel'];
        unset ($_SESSION['berhasil_artikel']);
    }
    ?>

</body>

</html>