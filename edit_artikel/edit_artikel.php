<?php
require_once '../connect_db.php';
session_start();
// $user_id = $_SESSION['user_id'];
// $verf_id = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$user_id'");
$isLoggedIn = isset($_SESSION['user_id']);
$sql_d = "SELECT destination_id, destination_name FROM destinations";
$result_d = mysqli_query($conn, $sql_d);

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$article_id = $_GET['id'];
$query = "SELECT * FROM articles WHERE article_id = '$article_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit | FunTour</title>
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
    <!-- form nya -->
    <div class="container justify-content-center mt-5">
        <div class=" text-center">
            <h2>Edit artikel</h2>
        </div>
        <form action="edit_logic.php" class="row" method="post" enctype="multipart/form-data" novalidate>
        <input type="hidden" name="article_id" value="<?= $article_id ?>">
            <!-- judul tournya -->
            <div class="col-12 mt-2">
                <label for="title" class="form-label ms-3">Judul</label>
                <input type="text" class="form-control border-black rounded-5 shadow-sm" id="title" name="title" value="<?= $row['title'] ?>"placeholder="Judul artikel anda" required>

            </div>
            <!-- detinasi -->
            <div class="col-12 mt-2">
                <label for="destinations" class="form-label ms-3">Destinasi Wisata</label>
                <div class="input-group">
                    <select class="form-select rounded-5 border-black" id="destination_id" name="destination_id">
                        <option selected>Choose...</option>
                        <?php
                        // Loop through the results and populate the dropdown
                        if (mysqli_num_rows($result_d) > 0) {
                            while ($rowD = mysqli_fetch_assoc($result_d)) {
                                echo "<option value='" . $rowD["destination_id"] . "'>" . $rowD["destination_name"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No destinations found</option>";
                        }
                        ?>
                    </select>
                </div>            
            </div>
            <!-- penjelasan -->
            <div class="col-12 mt-2">
                <label for="content" class="form-label ms-3">Artikel</label>
                <textarea name="content" id="content" cols="30" rows="50" class="form-control border-black rounded-5 shadow-sm" placeholder="Isi artikel anda"><?= $row['content']?></textarea>
            </div>
            <div class="col-3 mx-auto mt-5">
                <button type="submit" class="form-control btn btn-dark">Submit</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



</body>

</html>