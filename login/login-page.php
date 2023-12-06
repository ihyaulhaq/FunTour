<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="login-style.css">
  <title>Login|FunTour</title>

</head>

<body class="gambar-bg d-flex justify-content-center align-items-center min-vh-100">

  <div class="container mt-5 pt-5 p-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card bg-white pb-4 pt-4 p-2 rounded-4 shadow-lg">
          <div class="card-header text-center bg-white card-header-tabs mt-3">
            <h2>Login</h2>
          </div>

          <div class="card-body">
            <form action="login.php" method="post">
              <div class="" >
                <?php if (isset($_SESSION['error'])) : ?>
                  <p class="error"> <?php echo $_SESSION['error']; ?> </p>
                <?php
                  session_destroy();
                endif;
                ?>
              </div>
              <div class="mb-4 form-floating">
                <input type="text" class="form-control border-black font-kecil" id="username" name="username" placeholder="Enter username">
                <label for="username" class="font-kecil">Username</label>
              </div>
              <div class="mb-4 form-floating">
                <input type="password" class="form-control border-black font-kecil" id="password" name="password" placeholder="Enter password">
                <label for="password" class="font-kecil">Password</label>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-dark container" name="login">Login</button>
              </div>
              <div class=" text-center font-kecil">
                <p>Belum punya akun? <a href="register-page.php" class="text-decoration-none">Sign up</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>