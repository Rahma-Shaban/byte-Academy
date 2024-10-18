<?php

include_once("../../shared/head.php");

auth();
?>
<body>
  <?php
  include_once("../../shared/header.php");
  include_once("../../shared/aside.php");
 if (isset($_GET["view"])) {
    $id=$_GET['view'];
  $select="SELECT * FROM `users` where id = $id";
  $data = mysqli_query($conn, $select);
  $allData=  mysqli_fetch_assoc($data);
  $select2="SELECT * FROM `students_view` where user_id = $id";
  $data2 = mysqli_query($conn, $select2);
  $numrows= mysqli_num_rows($data2) ;
  $allData2=  mysqli_fetch_assoc($data2);

  
 }

  
  ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>students Data</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=baseurl()?>">Home </a></li>

    </ol>
  </nav>
</div><!-- End Page Title -->



<section class="section ">
      <div class="row align-items-top">
        <div class="col-lg-8">







<div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
              <?php if($allData['image']=='download.jpg'):?>
                <img src="<?= baseurl('shared/'); ?><?= $allData['image']?>" class="img-fluid rounded-start" alt="...">
                <?php else:?>
                  <img src="<?= baseurl('app/admins/uploads/'); ?><?= $allData['image']?>" class="img-fluid rounded-start" alt="..gf.">
                  <?php endif?>

              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $allData['name']?></h5>
                  <div class="row my-2">
                <div class="col-lg-4 col-md-4 label ">Full Name</div>
                <div class="col-lg-8 col-md-8"><?= $allData['name']?></div>
                </div>
                <div class="row my-2">
                <div class="col-lg-4 col-md-4 label ">Email</div>
                <div class="col-lg-8 col-md-8"><?= $allData['email']?></div>
                </div>
                <div class="row my-2">
                <div class="col-lg-4 col-md-4 label ">Rule</div>
                <div class="col-lg-8 col-md-8"><?= $allData['types']?></div>
                </div>

                  <table class="table ">
              <thead>
                <tr>
                  <th scope="col">Round Number</th>
                  <th scope="col">Courses</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($data2 as $item):?>
                <tr>
                  <td><?=$item['round_number']?></td>
                  <td><?=$item['title']?></td>


                </tr>
                <?php endforeach; ?>

              </tbody>
            </table>

                  <a class="btn btn-primary my-2" href="./index.php">Go Back</a>
                </div>
              </div>
            </div>
          </div><!-- End Card with an image on left -->


</div>

</div>
</section>

</main><!-- End #main -->




<?php
include_once("../../shared/footer.php");
include_once("../../shared/script.php");
?>
  