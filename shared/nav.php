<?php 

session_start();


if(isset($_GET['logout']))
{
  session_unset();
  session_destroy();
}

?>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Veztta</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

    <?php    if(isset($_SESSION['Admin'])):  ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Doctors
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/SSDG2/HospitalSystem/doctor/add.php">Add Doctor</a>
          <a class="dropdown-item" href="/SSDG2/HospitalSystem/doctor/list.php">List Doctor</a>

        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Fields
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/SSDG2/HospitalSystem/field/add.php">Add Field</a>
          <a class="dropdown-item" href="/SSDG2/HospitalSystem/field/list.php">List Fields</a>

        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Patients
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/SSDG2/HospitalSystem/patient/add.php">Add Patient</a>
          <a class="dropdown-item" href="/SSDG2/HospitalSystem/patient/list.php">List Patients</a>

        </div>
      </li>
      <?php  endif;?>
    </ul>




    <?php    if($_SESSION['Admin'] ):  ?>
    <form action="" method="GET">
      <button name="logout" class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
    </form>
    <?php   else:  ?>

    <a href="/SSDG2/HospitalSystem/admin/loginAdmin.php" class="btn btn-outline-success my-2 my-sm-0"
      type="submit">Login</a>
    <?php endif;?>
  </div>
</nav>