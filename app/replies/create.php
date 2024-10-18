<?php

include_once("../../shared/head.php");

auth('student');
?>
<body>
  <?php
      $select= " SELECT * from projects ";
      $s= mysqli_query($conn,$select);

    if (isset($_POST["btn"])) {
      
      $title=$_POST["title"];
      $link=$_POST["link"];
      $project=$_POST["project"];
      $user=$_SESSION["auth"]["id"];
      $message=null;

  
      $insert2= " INSERT INTO replies values (null, '$title' , '$link' ,$project ,$user)";
      $query2=mysqli_query($conn,$insert2);
      $message='your reply has been created succsefully';
  

  
      // header('Location: ' . baseUrl('app/replies/create.php'));
  
  }




include_once("../../shared/header.php");
include_once("../../shared/aside.php");









  
  ?>
 <main id="main" class="main">

<div class="pagetitle">
  <h1>Form Reply</h1>
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
       
          <h5 class="card-title">Add reply Form</h5>
          <?php if(!empty($message)):?>
                    <div class="alert alert-success" role="alert">
            <?=$message?>
              </div>
                                <?php endif;?>

          <!-- Horizontal Form -->
          <form method="post">



          <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Reply Title</label>
              <div class="col-sm-10">
                <input name="title" type="text" class="form-control" id="inputText">
              </div>
            </div>
            
          <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Reply Demo Link</label>
              <div class="col-sm-10">
                <input name="link" type="text" class="form-control" id="inputText">
              </div>
            </div>
            


                    <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Project Title</label>
          <div class="col-sm-10">
            <select name="project" class="form-control" required>
              <option value="" disabled selected>Select a project</option>
              <?php foreach($s as $item): ?>
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