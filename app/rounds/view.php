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


  $select="SELECT * FROM `user_rounds` where round_numbers = $id";
  $data = mysqli_query($conn, $select);
  
 }
 $counter=0;
  
  ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Round <?=$id?> Data</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=baseurl()?>">Home</a></li>
      <li class="breadcrumb-item">Components</li>
      <li class="breadcrumb-item active">Cards</li>
    </ol>
  </nav>
</div><!-- End Page Title -->



<section class="section">
  <div class="row">
<div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">list of all Students <a class="float-end  btn btn-primary" href="./index.php"> Go Back</a></h5>

    <!-- Table with stripped rows -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Student Name</th>
          <th scope="col">Student Email </th>
          <th scope="col">Student Course </th>



          

        </tr>
      </thead>
      <tbody>
        <?php foreach($data as $item):?>
        <tr>
          <th scope="row"><?=++$counter?></th>
          <td><?=$item['name']?></td>
          <td><?=$item['email']?></td>
          <td><?=$item['courses']?></td>








        </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
    <!-- End Table with stripped rows -->

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
  