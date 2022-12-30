<?php

include '../general/configdb.php';
include '../general/function.php';
include '../shared/head.php';
include '../shared/nav.php';



if(isset($_POST['login'])){
    $username = $_POST['username'];
    $pass = $_POST['password'];

   $selectAdmin = "SELECT * FROM `admin` where name = '$username' and password = '$pass'";
    $select = mysqli_query($conn , $selectAdmin);
    $row = mysqli_fetch_assoc($select);
    $count = mysqli_num_rows($select);

    
    if($count == 1){
        $_SESSION['Admin'] = $row['name'];
    }else if($count == 0){
        header("location:/SSDG2/HospitalSystem/admin/loginAdmin.php");
    }
}


?>

<div class="home">
    <h1 class="text-info  text-center b mt-5 ">Welcome To Login page</h1>

    <div class="container col-6 mt-5">
        <div class="card" style="  background-color: #333 !important;color: white;">
            <div class="card-body">

            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="enter you name">
                </div>
                <div class="form-group">
                    <label for="">password</label>
                    <input type="password" name="password" class="form-control" placeholder="enter your password"> 
                </div>
                <button name="login" class="btn btn-block btn-success w-50 mx-auto">Login</button>
            </form>
            </div>
        </div>
    </div>
</div>








<?php  include '../shared/script.php' ?>