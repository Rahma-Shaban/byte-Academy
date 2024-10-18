<?php

include_once("../../shared/head.php");

auth('instructor');
?>
<body>
  <?php

  if(isset($_GET['new'])){
    $id=$_GET['new'];

    $select= " SELECT * from students_round ";
    $s= mysqli_query($conn,$select);
  
  }


  if (isset($_POST["btn"])) {

    $title=$_POST["title"];
    $desc=$_POST["description"];
    $link=$_POST["link"];
    $round=$_POST["round"];

    $insert="INSERT INTO `projects` VALUES (null,'$title','$desc', '$link','$round') ";
    $query=mysqli_query($conn,$insert);

    header('Location: ' . baseUrl('app/courses/index.php'));

}


include_once("../../shared/header.php");
include_once("../../shared/aside.php");









  
  ?>
 <main id="main" class="main">

<div class="pagetitle">
  <h1>Form projects</h1>
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
          <h5 class="card-title">Add Project Form</h5>

          <!-- Horizontal Form -->
          <form method="post">
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Project Title</label>
              <div class="col-sm-10">
                <input name="title" type="text" class="form-control" id="inputText">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Project description</label>
              <div class="col-sm-10">
                <input name="description" type="text" class="form-control" id="inputText">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Demo Link</label>
              <div class="col-sm-10">
                <input name="link" type="text" class="form-control" id="inputText">
              </div>
            </div>


            <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Round & Course</label>
                  <div class="col-sm-10">
                    <select name="round" class="form-control" required>
                      <option value="" disabled selected>Select a round and course</option>
                      <?php foreach($s as $item): ?>
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