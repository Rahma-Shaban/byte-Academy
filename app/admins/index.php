<?php

include_once("../../shared/head.php");
auth();
?>
<body>
  <?php


  $select="SELECT * FROM users WHERE types = 'admin'";
  $data = mysqli_query($conn, $select);
  $counter=0;
   if (isset($_GET["delete"])){
    $id=$_GET['delete'];
    $delete="DELETE  FROM `users` where id = $id ";
      mysqli_query($conn, $delete);
      header('Location: ' . baseUrl('app/admins/index.php'));


   }
   include_once("../../shared/header.php");
   include_once("../../shared/aside.php");
  
  ?>





<main id="main" class="main">

<div class="pagetitle">
  <h1>Admins Tables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=baseUrl()?>">Home</a></li>

    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
<div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">list of all admins <a class="float-end btn btn-primary" href="./create.php">Create New</a></h5>

    <!-- Table with stripped rows -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Create At</th>
          <th scope="col">action</th>
          <th scope="col">action</th>


          

        </tr>
      </thead>
      <tbody>
        <?php foreach($data as $item):?>
        <tr>
          <th scope="row"><?=++$counter?></th>
          <td><?=$item['name']?></td>
          <td><?=$item['email']?></td>
          <td><?=$item['created_at']?></td>

          <td><a class="btn btn-primary" href="./view.php?view=<?=$item['id']?>">view</a></td>
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
  