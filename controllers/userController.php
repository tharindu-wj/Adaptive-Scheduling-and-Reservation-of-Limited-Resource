<?php
include "../models/dataOperation.php";

$obj = new DataOperation;

if(isset($_POST['add_user']))
{
    $myarray = array(
        "name" => $_POST['name'],
        "age" => $_POST['age'],
        "password" => $_POST['password']
    );

    if($obj->insert_record(user,$myarray)){
        header("location:../user.php?msg=Record Inserted");
    }

    else{
        header("location:../user.php?msg=Record Insert Failed");
    }
}

if(isset($_POST["edit"])){
    $id = $_POST['id'] ?? null;
    $where = array("m_id"=>$id);
    $myarray = array(
        "m_name" => $_POST['name'],
        "qty" => $_POST['qty']
    );
    if($obj->update_record("medicine", $where, $myarray)){
        header("location:../lecturer.php?msg=Record Updated Successfully");
    }

    else{
        header("location:../lecturer.php?msg=Update Failed");
    }
}

if(isset($_GET["delete"])){
    $id = $_GET["id"] ?? null;
    $where = array("m_id"=>$id);
    if($obj->delete_record("medicine",$where)){
        header("location:../lecturer.php?msg=Record Deleted Successfully");
    }

    else{
        header("location:../lecturer.php?msg=Delete Failed");
    }
}
?>