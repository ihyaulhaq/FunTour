<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Register | FunTour</title>
  <link rel="stylesheet" href="register-style.css">
</head>

<body class="gambar-back d-flex justify-content-center align-items-center min-vh-100">
  <div class="container mt-5 pt-5 p-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card bg-white pb-4 pt-4 p-4 rounded-4 shadow-lg">
          <div class="card-header text-center bg-white card-header-tabs mt-3">
            <h2>Sign up</h2>
          </div>
          <div class="card-body">
            <form action="register.php" method="post">
              <div class="">
                <?php if (isset($_SESSION['error'])) : ?>
                  <p class="error mb-0"> <?php echo $_SESSION['error']; ?> </p>
                <?php
                  session_destroy();
                endif;
                ?>
              </div>

              <div class="mb-4">
                <label for="username" class="">Username</label>
                <input type="text" class="form-control border-black" name="username" id="username" placeholder="Enter username" required>
              </div>

              <div class="row mb-4 mt-5">
                <div class="col">
                  <input type="text" class="form-control border-black" name="first_name" placeholder="First name" aria-label="First name">
                </div>
                <div class="col">
                  <input type="text" class="form-control border-black" name="last_name" placeholder="Last name" aria-label="Last name">
                </div>
              </div>

              <div class="mb-4">
                <label for="phone" class="">Phone</label>
                <input type="number" class="form-control border-black" name="phone" id="phone" placeholder="Enter phone" required>
              </div>
              <div class="mb-4">
                <label for="address" class="">Address</label>
                <input type="text" class="form-control border-black h-100" name="address" id="address" placeholder="Enter address" required>
              </div>
              <div class="mb-4">
                <label for="email" class="">Email</label>
                <input type="email" class="form-control border-black" name="email" id="email" placeholder="Enter email" required>
              </div>
              <div class="mb-4">
                <label for="password" class="">Password</label>
                <input type="password" class="form-control border-black" name="password" id="password" placeholder="Enter password" required>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-dark container">Register</button>
              </div>
              <div class="text-center font-kecil">
                <p>Sudah punya akun? <a href="login-page.php" class="text-decoration-none">Log in</a></p>
              </div>
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