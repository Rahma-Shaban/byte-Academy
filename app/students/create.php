<?php
include_once("../../shared/head.php");

auth();

$successMessage = ""; // Variable to hold success message

if (isset($_GET['view'])) {
    $user_id= $_GET['view'];
    $select= "SELECT * from students_round";
    $s= mysqli_query($conn, $select);

    if (isset($_POST["btn"])) {
        $round = $_POST["course"];
        $insert2 = "INSERT INTO students VALUES (null, $round, $user_id)";
        $query2 = mysqli_query($conn, $insert2);

        if ($query2) {
            // Set success message if insert was successful
            $successMessage = "Course added successfully!";
        } else {
            // Handle the case when insert fails
            $successMessage = "Failed to add course!";
        }
    }
}

include_once("../../shared/header.php");
include_once("../../shared/aside.php");
?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Form students</h1>
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
          <h5 class="card-title">Add Round Form</h5>

          <?php
          // Display success or failure message
          if (!empty($successMessage)) {
              echo "<div class='alert alert-success'>$successMessage</div>";
          }
          ?>

          <!-- Horizontal Form -->
          <form method="post">
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Course & Round</label>
              <div class="col-sm-10">
                <select name="course" class="form-control">
                  <option value="" disabled selected>Select a course</option>
                  <?php foreach ($s as $item): ?>
                      <option value="<?=$item['id']?>">ROUND <?=$item['round_number']?>: <?=$item['course_title']?></option>
                  <?php endforeach; ?>
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
include_once("../../shared/footer.php");
include_once("../../shared/script.php");
?>
