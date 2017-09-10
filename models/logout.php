<?php
session_start();
$_SESSION['username'] = $username;
header('location:../index.php');
?>