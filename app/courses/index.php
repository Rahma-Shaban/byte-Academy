<?php

include_once("../../shared/head.php");
auth('instructor');

?>
<body>
  <?php


  $select="SELECT * FROM courses ";
  $data = mysqli_query($conn, $select);
  $counter=0;
   if (isset($_GET["delete"])){
    $id=$_GET['delete'];
    $delete="DELETE  FROM `courses` where id = $id ";
      mysqli_query($conn, $delete);
      header('Location: ' . baseUrl('app/courses/index.php'));


   }
   include_once("../../shared/header.php");
   include_once("../../shared/aside.php");
  
  ?>





<main id="main" class="main">

<div class="pagetitle">
  <h1>Courses Tables</h1>
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
    <h5 class="card-title">list of all courses <a class="float-end btn btn-primary" href="./create.php">Create New</a></h5>
    
    <!-- Table with stripped rows -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">title</th>
          <th scope="col">description</th>
          <th scope="col">Create At</th>
          <th scope="col">action</th>
          <th scope="col">action</th>
          <?php if($_SESSION['auth']['type']!='instructor'): ?>

          <th scope="col">action</th>
          <?php endif; ?>





          

        </tr>
      </thead>
      <tbody>
        <?php foreach($data as $item):?>
        <tr>
          <th scope="row"><?=++$counter?></th>
          <td><?=$item['title']?></td>
          <td><?=$item['desciption']?></td>
          <td><?=$item['created_at']?></td>

          <td><a class="btn btn-primary" href="./create project.php?new=<?=$item['id']?>">Create Project</a></td>

          <td><a class="btn btn-success" href="./show.php?show=<?=$item['id']?>">Show Project</a></td>
          <?php if($_SESSION['auth']['type'] !='instructor'): ?>

          <td><a class="btn btn-danger" href="./index.php?delete=<?=$item['id']?>">delete</a></td>
          <?php endif; ?>




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
  