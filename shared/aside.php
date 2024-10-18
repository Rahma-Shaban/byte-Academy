<?php
include_once 'C:\xampp\htdocs\NiceAdmin\vendor/functions.php';


?>





<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link" href="<?=baseUrl()?>">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->


    <?php if($_SESSION['auth']['type']=='student'): ?>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#replies-nav" data-bs-toggle="collapse" href="#" aria-expanded="false" aria-controls="replies-nav">
        <i class="bi bi-layout-text-window-reverse"></i>
        <span>Replies</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="replies-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?=baseUrl('app/replies/create.php')?>">
            <i class="bi bi-circle"></i><span>Create Reply</span>
          </a>
        </li>

      </ul>
    </li><!-- End Replies Nav -->
    <?php else: ?>

  

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#" aria-expanded="false" aria-controls="users-nav">
        <i class="bi bi-layout-text-window-reverse"></i>
        <span>Users</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="users-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?=baseUrl('app/createUser.php')?>">
            <i class="bi bi-circle"></i><span>Create User</span>
          </a>
        </li>
        <li>
          <a href="<?=baseUrl('app/admins/')?>">
            <i class="bi bi-circle"></i><span>Admins</span>
          </a>
        </li>
        <li>
          <a href="<?=baseUrl('app/instructors/')?>">
            <i class="bi bi-circle"></i><span>Instructors</span>
          </a>
        </li>
        <li>
          <a href="<?=baseUrl('app/students/')?>">
            <i class="bi bi-circle"></i><span>Students</span>
          </a>
        </li>
      </ul>
    </li><!-- End Users Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?=baseUrl('app/courses/')?>">
        <i class="bi bi-journal-text"></i>
        <span>Courses</span>
      </a>
    </li><!-- End Courses Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?=baseUrl('app/rounds/')?>">
        <i class="bi bi-journal-text"></i>
        <span>Rounds</span>
      </a>
    </li><!-- End Rounds Nav -->


    <?php endif; ?>


    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?=baseUrl('profile.php')?>">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->
 
    <li class="nav-item">
    <a class="nav-link collapsed" href="<?= baseurl('contact.php') ?>">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li><!-- End Contact Page Nav -->





    <li class="nav-item">
      <a class="nav-link collapsed" href="<?=baseUrl('login.php')?>">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Login</span>
      </a>
    </li><!-- End Login Page Nav -->

    

  </ul>
 


</aside><!-- End Sidebar -->
