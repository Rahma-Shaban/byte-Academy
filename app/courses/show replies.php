<?php

include_once("../../shared/head.php");
auth('instructor');

?>
<body>
  <?php


  $select="SELECT * FROM show_replies ";
  $data = mysqli_query($conn, $select);
  $counter=0;
   if (isset($_GET["id"])){
    $id=$_GET['id'];
    $select="SELECT * FROM show_replies WHERE peoject_id=$id ";
    $data = mysqli_query($conn, $select);
    $counter=0;


   }
   if (isset($_GET["delete"])){
    $id=$_GET['delete'];
    $delete="DELETE  FROM `replies` where id = $id ";
      mysqli_query($conn, $delete);
      header('Location: ' . baseUrl('app/courses/show replies.php'));


   }
   include_once("../../shared/header.php");
   include_once("../../shared/aside.php");
  
  ?>





<main id="main" class="main">

<div class="pagetitle">
  <h1>Replies Table</h1>
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
    <h5 class="card-title">list of all Replies </h5>

    <!-- Table with stripped rows -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Reply title</th>
          <th scope="col">Demo link</th>
          <th scope="col">Student Name</th>

          <th scope="col">action</th>






          

        </tr>
      </thead>
      <tbody>
        <?php foreach($data as $item):?>
        <tr>
          <th scope="row"><?=++$counter?></th>
          <td><?=$item['title']?></td>
          <td><?=$item['demo_link']?></td>
          <td><?=$item['name']?></td>

          <td><a class="text-danger" href="./show replies.php?delete=<?=$item['reply_id']?>">delete</a></td>


 



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
  