<?php
include "dataOperation.php";

$obj = new DataOperation;


if(isset($_POST['addSub']))
{
    $myarray = array(
        "s_code" => $_POST['code'],
        "s_name" => $_POST['sname'],
        "nu_lectures" => $_POST['nu_lec'],
        "LAB" => $_POST['lab'],
        "dept_id" => $_POST['dpt'],
        "u_id" => $_POST['lec'],
        "std_group" => $_POST['grp'],
        "nu_std" => $_POST['nu_std']
    );

    if($obj->insert_record(subject,$myarray)){
        header("location:../subject.php?msg=Subject Added Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Record Insert Failed");
    }
}

if(isset($_POST["edit"])){

    $id = $_POST['id'];
    $where = array("s_id"=>$id);
    $myarray = array(
        "s_code" => $_POST['code'],
        "s_name" => $_POST['sname'],
        "nu_lectures" => $_POST['nu_lec'],
        "LAB" => $_POST['lab'],
        "dept_id" => $_POST['dpt'],
        "u_id" => $_POST['lec'],
        "std_group" => $_POST['grp'],
        "nu_std" => $_POST['nu_std']
    );
    if($obj->update_record("subject", $where, $myarray)){
        header("location:../subject.php?msg=Subject Updated Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Update Failed");
    }
}

if(isset($_GET["delete"])){
    $id = $_GET["id"];
    $where = array("s_id"=>$id);
    if($obj->delete_record(subject,$where)){
        header("location:../subject.php?msg= Subject Deleted Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Delete Failed");
    }
}
?>