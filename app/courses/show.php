<?php

include_once("../../shared/head.php");
auth('instructor');

?>
<body>
  <?php


   if (isset($_GET["show"])){
  $course_id= $_GET["show"];
  $select="SELECT * FROM show_project WHERE course_id=$course_id ";
  $s = mysqli_query($conn, $select);

   }


   if(isset($_GET['id'])){
    $id= $_GET['id'];
    $d= "DELETE  FROM projects WHERE id =$id";
    $query= mysqli_query($conn,$d);
    $_SESSION['auth']['message']='the project has been deleted successfully ';
    header('Location: ' . baseUrl('app/courses/'));

    
   }


   include_once("../../shared/header.php");
   include_once("../../shared/aside.php");
  
  ?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Projects Cards</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>

    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row align-items-top">
    <div class="col-lg-6">
                <?php foreach($s as $data):?>
    <div class="card mb-3 shadow-sm">
  <div class="card-body">
    <h5 class="card-title"><?= $data['title']; ?> <a href="./show Replies.php?id=<?=$data['id']?>" class="float-end btn btn-success">Show All Replies</a> </h5>
    <h6 class="card-subtitle mb-2 text-muted">Round Number: <?= $data['round_number']; ?></h6>
    <p class="card-text"><?= $data['description']; ?></p>
    <a target="_blank" href="<?= $data['demo_link']; ?>" class="card-link btn btn-outline-secondary">DEMO LINK</a>
    <a href="./edit project.php?id=<?=$data['id']?>" class="btn btn-primary">Edit</a>
    <a href="./show.php?id=<?=$data['id']?>" class="btn btn-danger">delete</a>

  </div>
</div>
           <?php endforeach;?>







        </div>

      </div>
    </section>

  </main><!-- End #main -->

<?php
include_once("../../shared/footer.php");
include_once("../../shared/script.php");
?>
  