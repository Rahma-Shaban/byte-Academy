<?php

include_once("./shared/head.php");
auth('instructor', 'student');

if(isset($_POST["edit"])) {
$user_id = $_SESSION["auth"]["id"];
if(empty($_FILES['image']['name'])) {
  $image_name=$_SESSION['auth']['image'];
}
else {
  $old_image=$_SESSION['auth']['image'];
  if($old_image!='download.jpg') {
    unlink("app/admins/uploads/$old_image");
  }
 
  $image_name= rand(1,5000) . "_" . $_FILES['image']['name'];
  $tmp_name=$_FILES['image']['tmp_name'];
  $location="./app/admins/uploads/$image_name";
  move_uploaded_file($tmp_name, $location);
}
$name= $_POST['name'];
$email= $_POST['email'];

$query="UPDATE `users` SET `name`='$name',`email`='$email',`image`='$image_name' WHERE id=$user_id";
$i= mysqli_query($conn,$query);
$_SESSION['auth']['name']= $name;
$_SESSION['auth']['email']= $email;
$_SESSION['auth']['image']= $image_name;


 
}
      $errors=null;
      $message;

      if(isset($_POST['changepass'])){
        $user_id = $_SESSION["auth"]["id"];
      $current=$_POST['password'];
      $hash_current=sha1($current);
      $select="SELECT * FROM users WHERE id=$user_id";
      $s=mysqli_query($conn,$select);
      $data=mysqli_fetch_assoc($s);

      if($hash_current==$data['password']){
        $user_id=$_SESSION['auth']['id'];
      $newpass=$_POST['newpassword'];
      $renew=$_POST['renewpassword'];
      if($newpass==$renew){
      $hash_new=sha1($renew);
      $update="UPDATE users SET password='$hash_new' WHERE id=$user_id";
      $u=mysqli_query($conn,$update);
      $message='your password has been changed successfully';
      }else{
        $errors="The Confirmation Password is Wrong";
      }
      }else{
        $errors="Your Current Password is Wrong";

      }
      }





?>
<body>
  <?php
  include_once("./shared/header.php");
  include_once("./shared/aside.php");
  
  ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=baseUrl();?>">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

        <?php if($_SESSION['auth']['image']=='download.jpg'):?>
        <img src="<?=baseUrl('shared/')?><?=$_SESSION['auth']['image']?>" alt="Profile" class="rounded-circle">
        <?php else:?>
        <img src="<?=baseUrl('app/admins/uploads/')?><?=$_SESSION['auth']['image']?>" alt="Profile" class="rounded-circle">
        <?php endif;?>   
         <h2><?=$_SESSION['auth']['name']?></h2>
          <h3><?=$_SESSION['auth']['type']?></h3>
          <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
            <?php if(!empty($message)):?>
                    <div class="alert alert-success" role="alert">
            <?=$message?>
              </div>
               <?php endif;?>
               
            <?php if(!empty($errors)):?>
                    <div class="alert alert-danger" role="alert">
            <?=$errors?>
              </div>
              <?php endif;?>

              <h5 class="card-title">About</h5>
              <p class="small fst-italic">work Smart not hard</p>

              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8"><?=$_SESSION['auth']['name']?></div>
              </div>


              <div class="row">
                <div class="col-lg-3 col-md-4 label">Rule</div>
                <div class="col-lg-9 col-md-8"><?=$_SESSION['auth']['type']?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8"><?=$_SESSION['auth']['email']?></div>
              </div>

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                  <?php if($_SESSION['auth']['image']=='download.jpg'):?>
        <img src="<?=baseUrl('shared/')?><?=$_SESSION['auth']['image']?>" alt="Profile" >
        <?php else:?>
        <img src="<?=baseUrl('app/admins/uploads/')?><?=$_SESSION['auth']['image']?>" alt="Profile" >
        <?php endif;?>
                    <div class="pt-2">
                      <input type="file" class="form-control" name="image">
                      <a href="./index.php?id=<?=$items['id']?>"><i class="text-danger fa-solid fa-trash"></i></a>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="name" type="text" class="form-control" id="fullName" value="<?=$_SESSION['auth']['name']?>">
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="Email" value="<?=$_SESSION['auth']['email']?>">
                  </div>
                </div>


                <div class="text-center">
                  <button name="edit" type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-settings">

              <!-- Settings Form -->
              <form>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                  <div class="col-md-8 col-lg-9">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="changesMade" checked>
                      <label class="form-check-label" for="changesMade">
                        Changes made to your account
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="newProducts" checked>
                      <label class="form-check-label" for="newProducts">
                        Information on new products and services
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="proOffers">
                      <label class="form-check-label" for="proOffers">
                        Marketing and promo offers
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                      <label class="form-check-label" for="securityNotify">
                        Security alerts
                      </label>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End settings Form -->

            </div>
            <div class="tab-pane fade pt-3" id="profile-change-password">
                  
              <!-- Change Password Form -->
              <form method="post">

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="currentPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="newpassword" type="password" class="form-control" id="newPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                  </div>
                </div>

                <div class="text-center">
                  <button name="changepass" type="changepass" class="btn btn-primary">Change Password</button>
                </div>
              </form><!-- End Change Password Form -->

            </div>

          </div><!-- End Bordered Tabs -->

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