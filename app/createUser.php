<?php

include_once("../shared/head.php");

auth();

$success_message = ''; 

if (isset($_POST["btn"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hash_password = sha1($password);
    $id = $_COOKIE['auth_user'];
    $image = 'download.jpg';
    $type = $_POST['type'];

    $insert = "INSERT INTO `users` VALUES (null, '$name', '$email', '$hash_password', '$type', '$image', DEFAULT)";
    $query = mysqli_query($conn, $insert);

    if ($query) {
        $success_message = "User successfully created!";
    } else {
        $success_message = "Failed to create user. Please try again.";
    }
}

include_once("../shared/header.php");
include_once("../shared/aside.php");

?>
<body>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Form users</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=baseUrl()?>">Home</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section container">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add User Form</h5>

          <!-- Display success message -->
          <?php if (!empty($success_message)) : ?>
            <div class="alert alert-success text-center">
              <?= $success_message; ?>
            </div>
          <?php endif; ?>

          <!-- Horizontal Form -->
          <form method="post">
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
              <div class="col-sm-10">
                <input name="name" type="text" class="form-control" id="inputText" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input name="email" type="email" class="form-control" id="inputEmail" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input name="password" type="password" class="form-control" id="inputPassword" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputType" class="col-sm-2 col-form-label">Type</label>
              <div class="col-sm-10">
                <select name="type" class="form-control" required>
                  <option value="" disabled selected>Select an option</option>
                  <option value="student">Student</option>
                  <option value="admin">Admin</option>
                  <option value="instructor">Instructor</option>
                </select>
              </div>
            </div>

            <div class="text-center">
              <button name="btn" type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- End Horizontal Form -->

        </div>
      </div>
    </div>
  </div>
</section>

</main><!-- End #main -->

<?php
include_once("../shared/footer.php");
include_once("../shared/script.php");
?>