<?php
include "dataOperation.php";

$obj = new DataOperation;

if(isset($_POST['S_add']))
{

    $myarray = array(
        "date" => $_POST['date'],
        "time" => $_POST['time'],
        "r_id" => $_POST['room'],
        "u_id" => $_POST['lec_id'],
        "s_code" => $_POST['Subject_Code'],
        "std_group" => $_POST['grp'],
        "dept_id" => $_POST['dpt']
    );

    if($obj->insert_record(schedule,$myarray)){
        header("location:../groupSchedule.php?msg=Successfully Reserved");
    }

    else{
        //header("location:../lecturer.php?msg=Reservation Failed");
    }
}


?>