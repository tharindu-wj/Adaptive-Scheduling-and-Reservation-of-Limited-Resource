<?php
include "dataOperation.php";

$obj = new DataOperation;

if(isset($_POST['addgrp']))
{
    $myarray = array(

        "semester" => $_POST['g_name'],
        "nu_std" => $_POST['nu']

    );

    if($obj->insert_record(std_group,$myarray)){
        header("location:../group.php?msg=Student Group Added Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Record Insert Failed");
    }
}

if(isset($_POST["edit"])){

    $id = $_POST['id'];
    $where = array("std_group"=>$id);
    $myarray = array(
        "semester" => $_POST['g_name'],
        "nu_std" => $_POST['nu']
    );
    if($obj->update_record(std_group, $where, $myarray)){
        header("location:../group.php?msg=Student Group Updated Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Update Failed");
    }
}

if(isset($_GET["delete"])){
    $id = $_GET["id"];
    $where = array("std_group"=>$id);
    if($obj->delete_record(std_group,$where)){
        header("location:../group.php?msg=Student Group Deleted Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Delete Failed");
    }
}
?>