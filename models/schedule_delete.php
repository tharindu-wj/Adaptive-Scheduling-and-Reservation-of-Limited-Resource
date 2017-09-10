<?php
include "dataOperation.php";

$obj = new DataOperation;

if(isset($_GET["delete"])){
    $id = $_GET["id"] ;
    $where = array("id"=>$id);
    if($obj->delete_record(schedule,$where)){
        header("location:../ownReservation.php?msg=Reservation Canceled Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Delete Failed");
    }
}

?>