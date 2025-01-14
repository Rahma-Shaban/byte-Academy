<?php

include_once("./shared/head.php");

?>
<body>
  <?php
  include_once("./shared/header.php");
  include_once("./shared/aside.php");
  
  ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Contact</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=baseUrl()?>">Home</a></li>

    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section contact">

  <div class="row gy-4">

    <div class="col-xl-12">

      <div class="row">
        <div class="col-lg-6">
          <div class="info-box card">
            <i class="bi bi-geo-alt"></i>
            <h3>Address</h3>
            <p>A108 Adam Street,<br>New York, NY 535022</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="info-box card">
            <i class="bi bi-telephone"></i>
            <h3>Call Us</h3>
            <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="info-box card">
            <i class="bi bi-envelope"></i>
            <h3>Email Us</h3>
            <p>info@example.com<br>contact@example.com</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="info-box card">
            <i class="bi bi-clock"></i>
            <h3>Open Hours</h3>
            <p>Monday - Friday<br>9:00AM - 05:00PM</p>
          </div>
        </div>
      </div>

    </div>

   

  </div>

</section>

</main><!-- End #main -->
<?php
include_once("./shared/footer.php");
include_once("./shared/script.php");
?>




</body>

</html>