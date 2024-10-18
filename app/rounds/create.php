<?php

include_once("../../shared/head.php");

auth();
?>
<body>
  <?php
 $select= " SELECT * FROM courses " ;
 $i= mysqli_query($conn,$select);

  if (isset($_POST["btn"])) {
    $round=$_POST["num"];
    $course=$_POST["course"];



    
    $insert="INSERT INTO `rounds` VALUES (null,'$round','$course', DEFAULT) ";
    $query=mysqli_query($conn,$insert);


    header('Location: ' . baseUrl('app/rounds/index.php'));

}


include_once("../../shared/header.php");
include_once("../../shared/aside.php");









  
  ?>
 <main id="main" class="main">

<div class="pagetitle">
  <h1>Form Rounds</h1>
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
          <h5 class="card-title">Add Rounds Form</h5>

          <!-- Horizontal Form -->
          <form method="post">
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Round Number </label>
              <div class="col-sm-10">
                <input name="num" type="text" class="form-control" id="inputText">
              </div>
            </div>
            
          <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Course</label>
          <div class="col-sm-10">
            <select name="course" class="form-control" required>
              <option value="" disabled selected>Select a course</option>
              <?php foreach($i as $item): ?>
                <option value="<?=$item['id']?>"><?=$item['title']?></option>
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