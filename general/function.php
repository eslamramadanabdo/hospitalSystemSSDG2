

<?php

function testMessage( $condition ,  $mess ){
    if($condition){
        echo "$mess true ";
    }else{
        echo " $mess false";
    }
}

function Auth(){
    if( ($_SESSION['Admin'] ==  'islam') || ($_SESSION['Admin'] ==  'ahmed')){

    }
    else{
        header("location:/SSDG2/HospitalSystem/admin/loginAdmin.php");
    }
}


?>