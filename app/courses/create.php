<?php

include_once("../../shared/head.php");

auth();
?>
<body>
  <?php


  if (isset($_POST["btn"])) {
    $name=$_POST["title"];
    $desc=$_POST["description"];

    
    $insert="INSERT INTO `courses` VALUES (null,'$name','$desc', DEFAULT) ";
    $query=mysqli_query($conn,$insert);

    header('Location: ' . baseUrl('app/courses/index.php'));

}


include_once("../../shared/header.php");
include_once("../../shared/aside.php");









  
  ?>
 <main id="main" class="main">

<div class="pagetitle">
  <h1>Form courses</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=baseUrl()?>">Home</a></li>
      <li class="breadcrumb-item">Forms</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section container">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add Courses Form</h5>

          <!-- Horizontal Form -->
          <form method="post">
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Course Title</label>
              <div class="col-sm-10">
                <input name="title" type="text" class="form-control" id="inputText">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Course description</label>
              <div class="col-sm-10">
                <input name="description" type="text" class="form-control" id="inputText">
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