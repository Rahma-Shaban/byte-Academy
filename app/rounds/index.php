<?php

include_once("../../shared/head.php");
auth();
?>
<body>
  <?php


  $select="SELECT * FROM rounds_courses ";
  $data = mysqli_query($conn, $select);
  $counter=0;
   if (isset($_GET["delete"])){
    $id=$_GET['delete'];
    $delete="DELETE  FROM `rounds` where id = $id ";
      mysqli_query($conn, $delete);
      header('Location: ' . baseUrl('app/rounds/index.php'));


   }
   include_once("../../shared/header.php");
   include_once("../../shared/aside.php");
  
  ?>





<main id="main" class="main">

<div class="pagetitle">
  <h1>The Rounds</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=baseUrl()?>">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">General</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
<div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">list of all Rounds <a class="float-end btn btn-primary" href="./create.php">Create New</a></h5>

    <!-- Table with stripped rows -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Round number</th>
          <th scope="col">Courses title  </th>
          <th scope="col">action</th>
          <th scope="col">action</th>


          

        </tr>
      </thead>
      <tbody>
        <?php foreach($data as $item):?>
        <tr>
          <th scope="row"><?=++$counter?></th>
          <td><?=$item['round_number']?></td>
          <td><?=$item['course_titles']?></td>


          <td><a class="btn btn-primary" href="./view.php?view=<?=$item['round_number']?>">view</a></td>
          <td><a class="btn btn-danger" href="./index.php?delete=<?=$item['id']?>">delete</a></td>



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
  