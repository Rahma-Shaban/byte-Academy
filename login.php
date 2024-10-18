<?php

include_once("./shared/head.php");
$error_message = ''; 

if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"]; 
  $hash_password = sha1($password);

  $select = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$hash_password'";
  $i = mysqli_query($conn, $select);
  $user_data = mysqli_fetch_assoc($i);

  $numrows = mysqli_num_rows($i);
  if ($numrows == 1) {
    setcookie('auth_user', $user_data['id'], time() + 60 * 60 * 24, '/');
    $_SESSION['auth'] = [
      "id" => $user_data['id'],
      "name" => $user_data['name'],
      "email" => $user_data['email'],
      "image" => $user_data['image'],
      "type" => $user_data['types']
    ];
    header('Location: ' . baseUrl());
  } else {
    $error_message = "Wrong email or password"; 
  }
}

if (isset($_GET['logout'])) {
  session_destroy();
  session_unset();
  setcookie('auth_user', $user_data['id'], time() - 60 * 60 * 24, '/');
  header('Location: ' . baseUrl('login.php'));
}
?>

<body>

<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo2.png" alt="">
                <span class="d-none d-lg-block">Byte Academy</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your email & password to login</p>
                </div>

                <!-- Display error message if login fails -->
                <?php if (!empty($error_message)) : ?>
                  <div class="alert alert-danger text-center">
                    <?= $error_message; ?>
                  </div>
                <?php endif; ?>

                <form class="row g-3 needs-validation" method="post">

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Email</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="email" name="email" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your email.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button name="login" class="btn btn-primary w-100" type="submit">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Don't have an account? <a href="<?=baseUrl('register.php')?>">Create an account</a></p>
                  </div>
                </form>

              </div>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->
<?php

include_once("./shared/script.php");
?>

</body>

</html>
