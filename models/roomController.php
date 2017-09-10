<?php
include "dataOperation.php";

$obj = new DataOperation;

if(isset($_POST['addroom']))
{
    $myarray = array(
        "r_name" => $_POST['rname'],
        "b_id" => $_POST['building'],
        "capacity" => $_POST['cap'],
        "LAB" => $_POST['lab'],
        "AC" => $_POST['ac'],
        "dept_id" => $_POST['dpt']
    );

    if($obj->insert_record(room,$myarray)){
        header("location:../room.php?msg=Lecture Room Added Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Record Insert Failed");
    }
}

if(isset($_POST["edit"])){

    $id = $_POST['id'];
    $where = array("r_id"=>$id);
    $myarray = array(
        "r_name" => $_POST['rname'],
        "b_id" => $_POST['building'],
        "capacity" => $_POST['cap'],
        "LAB" => $_POST['lab'],
        "AC" => $_POST['ac'],
        "dept_id" => $_POST['dpt']
    );
    if($obj->update_record(room, $where, $myarray)){
        header("location:../room.php?msg=Lecture Room Updated Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Update Failed");
    }
}

if(isset($_GET["delete"])){
    $id = $_GET["id"];
    $where = array("r_id"=>$id);
    if($obj->delete_record(room,$where)){
        header("location:../room.php?msg=Lecture Room Deleted Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Delete Failed");
    }
}
?>