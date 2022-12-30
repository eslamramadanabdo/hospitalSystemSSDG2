<?php

include '../general/configdb.php';
include '../general/function.php';
include '../shared/head.php';
include '../shared/nav.php';


// insert doctor
if(isset( $_POST['btn'] )){
    $name = $_POST['name'];
    $insert = "INSERT INTO fields VALUES(null , '$name' )";
    $in = mysqli_query($conn , $insert);

}


// update
$fname ='';
$flage = false;
if(isset( $_GET['edit'] )){
    $flage =true;
    $id = $_GET['edit'];
    
    // select docotr
    $selectDo = "SELECT * FROM fields where id =$id";
    $sd   = mysqli_query($conn , $selectDo);
    $row = mysqli_fetch_assoc($sd);
    $fname = $row['name'];

    if(isset($_POST['updatedoctor'] )){
        $name = $_POST['name'];

        $updatedo = "UPDATE fields SET name = '$name'  where id = $id";
        $up = mysqli_query($conn , $updatedo);


    }

}

Auth();
?>


<div class="home">
    <h1 class="text-info  text-center b mt-5 ">Welcome To Add page</h1>

    <div class="container col-6 mt-5">
        <div class="card" style="  background-color: #333 !important;color: white;">
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" value="<?php echo $fname?>"  name="name" class="form-control" placeholder="enter name">
                    </div>



                    <?php   if($flage): ?>
                        <button name="updatedoctor" class="btn btn-success btn-block w-50 mx-auto">Update</button>
                
                    <?php   else: ?>
                        <button name="btn" class="btn btn-success btn-block w-50 mx-auto">Submit</button>
                    <?php endif; ?>        
                </form>
            </div>
        </div>
    </div>

</div>


<?php  include '../shared/script.php' ?>