<?php

include '../general/configdb.php';
include '../general/function.php';
include '../shared/head.php';
include '../shared/nav.php';


// insert doctor
if(isset( $_POST['btn'] )){
    $name = $_POST['name'];
    $fieldid = $_POST['fieldid'];
    $insert = "INSERT INTO doctor VALUES(null , '$name' , $fieldid)";
    $in = mysqli_query($conn , $insert);

}

// slect fields
$select = "SELECT * FROM fields";
$ss = mysqli_query($conn , $select);

// update
$dname ='';
$flage = false;
if(isset( $_GET['edit'] )){
    $flage =true;
    $id = $_GET['edit'];
    
    // select docotr
    $selectDo = "SELECT * FROM doctor where id =$id";
    $sd   = mysqli_query($conn , $selectDo);
    $row = mysqli_fetch_assoc($sd);
    $dname = $row['name'];

    if(isset($_POST['updatedoctor'] )){
        $name = $_POST['name'];
        $fieldid = $_POST['fieldid'];

        $updatedo = "UPDATE doctor SET name = '$name' , fieldid = $fieldid where id = $id";
        $up = mysqli_query($conn , $updatedo);
        // testMessage($up , "update");

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
                        <input type="text" value="<?php echo $dname?>"  name="name" class="form-control" placeholder="enter name">
                    </div>

                    <div class="form-group">
                        <label for="">field ID</label>
                        <select name="fieldid" class="form-control">
                            <?php   foreach($ss as $data){ ?>
                                <option value="<?php echo $data['id']?>"> <?php echo $data['name'] ?> </option>
                            <?php } ?>
                        </select>
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