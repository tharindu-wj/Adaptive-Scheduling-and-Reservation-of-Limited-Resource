<?php
include "dataOperation.php";

$obj = new DataOperation;

if(isset($_POST['adddpt']))
{
    $myarray = array(
        "dept_name" => $_POST['d_name']
    );

    if($obj->insert_record(department,$myarray)){
        header("location:../department.php?msg=Department Added Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Record Insert Failed");
    }
}

if(isset($_POST["edit"])){

    $id = $_POST['id'];
    $where = array("dept_id"=>$id);
    $myarray = array(
        "dept_name" => $_POST['d_name']
    );
    if($obj->update_record(department, $where, $myarray)){
        header("location:../department.php?msg=Department Updated Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Update Failed");
    }
}

if(isset($_GET["delete"])){
    $id = $_GET["id"];
    $where = array("dept_id"=>$id);
    if($obj->delete_record(department,$where)){
        header("location:../department.php?msg=Department Deleted Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Delete Failed");
    }
}
?>