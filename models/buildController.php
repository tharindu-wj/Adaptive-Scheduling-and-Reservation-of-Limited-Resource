<?php
include "dataOperation.php";

$obj = new DataOperation;

if(isset($_POST['addbuild']))
{
    $myarray = array(

        "b_name" => $_POST['b_name'],
        "b_location" => $_POST['loc']

    );

    if($obj->insert_record(building,$myarray)){
        header("location:../building.php?msg=Building Added Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Record Insert Failed");
    }
}

if(isset($_POST["edit"])){

    $id = $_POST['id'];
    $where = array("b_id"=>$id);
    $myarray = array(
        "b_name" => $_POST['b_name'],
        "b_location" => $_POST['loc']
    );
    if($obj->update_record(building, $where, $myarray)){
        header("location:../building.php?msg=Building Updated Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Update Failed");
    }
}

if(isset($_GET["delete"])){
    $id = $_GET["id"];
    $where = array("b_id"=>$id);
    if($obj->delete_record("building",$where)){
        header("location:../building.php?msg=Building Deleted Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Delete Failed");
    }
}
?>