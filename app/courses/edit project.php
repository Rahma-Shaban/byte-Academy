<?php

include_once("../../shared/head.php");

auth('instructor');
?>
<body>
  <?php





    if (isset($_GET["id"])){
    $id= $_GET["id"];
    
    $select="SELECT * FROM show_project WHERE id= $id ";
    $s = mysqli_query($conn, $select);
    $data= mysqli_fetch_assoc($s);

}




  if (isset($_POST["btn"])) {
    $name=$_POST["title"];
    $desc=$_POST["description"];
    $link=$_POST["link"];


    
    $insert="UPDATE `projects` SET `title`='$name',`description`='$desc',`demo_link`='$link' WHERE id=$id";
    $query=mysqli_query($conn,$insert);

    header('Location: ' . baseUrl('app/courses/show.php?show='). $data['course_id']);

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
          <h5 class="card-title">Edit Project Form</h5>

          <!-- Horizontal Form -->
          <form method="post">
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Project title</label>
              <div class="col-sm-10">
                <input name="title" value="<?=$data['title']?>" type="text" class="form-control" id="inputText" >
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Project description</label>
              <div class="col-sm-10">
                <input name="description"   value="<?=$data['description']?>" type="text" class="form-control" id="inputText">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Demo Link</label>
              <div class="col-sm-10">
                <input name="link"   value="<?=$data['demo_link']?>" type="text" class="form-control" id="inputText">
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