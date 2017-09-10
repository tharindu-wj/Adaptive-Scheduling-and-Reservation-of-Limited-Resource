<?php
session_start();
require 'connection.php';

if(isset($_POST['login'])) {
    $username = $_POST['txtName'];
    $pssword = $_POST['psswrd'];

echo $username;

    $query = "select * from user where username = '$username';";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $saltQuery = "select salt from user where username = '$username';";
        $result = mysqli_query($con, $saltQuery);
        $row = mysqli_fetch_assoc($result);
        $salt = $row['salt'];

        $saltedPW = $pssword . $salt;
        $hashedPW = hash('sha512',$pssword);



        $query = "select * from user where username = '$username' and password = '$hashedPW';";
        $result_set = mysqli_query($con, $query);
        echo $hashedPW;
        if(mysqli_num_rows($result_set) > 0 ){
            echo "user loggged";


            $_SESSION['username'] = $username;
            header('location:../index.php');

        }

        else{
            //session_start();
            $_SESSION['msg'] = "Password incorrect";
            header('location:../login.php');
            echo $_SESSION['msg'];

        }

    }

    else{
        //session_start();
        $_SESSION['msg'] = "Username and Password incorrect";
        header('location:../login.php');
        echo $_SESSION['msg'];
    }
}
?>