<?php
include "dataOperation.php";

$obj = new DataOperation;


if(isset($_POST['addLec']))
{
    $pssword = $_POST['psswrd'];
    //Generate random salt
    $salt = bin2hex(mcrypt_create_iv(32,MCRYPT_DEV_URANDOM));
    $saltedPW = $pssword . $salt;
    $hashedPW = hash('sha512', $pssword);

    $myarray = array(
        "username" => $_POST['uname'],
        "fullName" => $_POST['fname'],
        "email" => $_POST['email'],
        "contact" => $_POST['contact'],
        "password" => $hashedPW,
        "salt" => $salt,
        "u_type" => "lecturer",
        "subjects" => $_POST['subject']
    );

    if($obj->insert_record(user,$myarray)){
        header("location:../lecturer.php?msg=Lecturer Added Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Record Insert Failed");
    }
}

if(isset($_POST["edit"])){
    $password = mysqli_real_escape_string($con, $_POST['psswrd']);
    //Generate random salt
    $salt = bin2hex(mcrypt_create_iv(32,MCRYPT_DEV_URANDOM));
    $saltedPW = $password . $salt;
    $hashedPW = hash('sha512', $saltedPW);

    $id = $_POST['id'];
    $where = array("u_id"=>$id);
    $myarray = array(
        "username" => $_POST['uname'],
        "fullName" => $_POST['fname'],
        "email" => $_POST['email'],
        "contact" => $_POST['contact'],
        "password" => $hashedPW,
        "salt" => $salt,
        "subjects" => $_POST['subject']
    );
    if($obj->update_record("user", $where, $myarray)){
        header("location:../lecturer.php?msg=Lecturer Updated Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Update Failed");
    }
}

if(isset($_GET["delete"])){
    $id = $_GET["id"];
    $where = array("u_id"=>$id);
    if($obj->delete_record(user,$where)){
        header("location:../lecturer.php?msg=Lecturer Deleted Successfully");
    }

    else{
        //header("location:../lecturer.php?msg=Delete Failed");
    }
}
?>