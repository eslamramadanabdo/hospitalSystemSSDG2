<?php

include '../general/configdb.php';
include '../general/function.php';
include '../shared/head.php';
include '../shared/nav.php';

// select doctors
$select = "SELECT doctor.id , doctor.name as dname , fields.name from doctor JOIN `fields`  on doctor.fieldid = fields.id;";
$ss = mysqli_query($conn , $select);

// delete doctor
if(isset( $_GET['delete']  )){
    $id = $_GET['delete'];
    $delete = "DELETE FROM doctor where id = $id";
    $dd = mysqli_query($conn , $delete);
    // testMessage($dd , "delete");
    header("location:/SSDG2/HospitalSystem/doctor/list.php");
}



Auth();
?>


<div class="home">
    <h1 class="text-info  text-center b mt-5 ">Welcome To List Doctors</h1>

    <div class="container col-6 mt-5">
        <div class="card" style="  background-color: #333 !important;color: white;">
            <div class="card-body">
                <table class="table table-dark">
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Field id</td>
                        <td>Action</td>
                    </tr>
                    <?php  foreach($ss as $data){ ?>
                    <tr>
                        <td> <?php echo $data['id']?> </td>
                        <td> <?php echo $data['dname']?> </td>
                        <td> <?php echo $data['name']?> </td>
                        
                        <?php  if($_SESSION['Admin'] == 'islam'): ?>
                        <td>
                            <a href="list.php?delete=<?php echo $data['id']?>" class="btn btn-danger">Delete</a>
                            <a href="add.php?edit=<?php echo $data['id']?>" class="btn btn-primary">Edit</a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

</div>


<?php  include '../shared/script.php' ?>