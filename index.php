<?php

include_once("./shared/head.php");

?>
<body>
  <?php
  include_once("./shared/header.php");
  include_once("./shared/aside.php");

  if (isset($_SESSION["auth"]["id"])) {
    $id=$_SESSION["auth"]["id"];
  $select="SELECT * FROM `users` where id = $id";
  $data = mysqli_query($conn, $select);
  $allData=  mysqli_fetch_assoc($data);
  $select2="SELECT * FROM `students_view` where user_id = $id";
  $data2 = mysqli_query($conn, $select2);
  $numrows= mysqli_num_rows($data2) ;
  $allData2=  mysqli_fetch_assoc($data2);

  
 }

  ?>






    <?php if($_SESSION['auth']['type']=='student' || $_SESSION['auth']['type']=='instructor'):?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Your Data</h1>
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
                <?php if($_SESSION['auth']['type']=='student'):?>

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
            <?php endif; ?>


                </div>
              </div>
            </div>
          </div><!-- End Card with an image on left -->



</div>

</div>
</section>

</main><!-- End #main -->
<?php else:?>



<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">


              <!-- Customers Card -->
              
              <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Students <a class="" href="<?=baseUrl('app/students/')?>"><span>| click here</span></a></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>1244</h6>
                  <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                </div>
              </div>

            </div>
          </div>

              </div><!-- End Customers Card -->
              


              <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

          
            <div class="card-body">
              <h5 class="card-title">Instructors <a class="" href="<?=baseUrl('app/instructors/')?>"><span>| click here</span></a></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-person-check"></i>
                </div>
                <div class="ps-3">
                  <h6>22</h6>
                  <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            

            <div class="card-body">
              <h5 class="card-title">Rounds <a class="" href="<?=baseUrl('app/rounds/')?>"><span>| click here</span></a></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-123"></i>
                </div>
                <div class="ps-3">
                  <h6>35</h6>
                  <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->





  





      </div>
    </div><!-- End Left side columns -->


  </div>
</section>

</main><!-- End #main -->
<?php endif;?>


<?php
include_once("./shared/footer.php");
include_once("./shared/script.php");
?>




</body>

</html>