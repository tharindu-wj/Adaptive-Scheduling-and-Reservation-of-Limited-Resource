<?php
include "dataOperation.php";

include "connect.php";

$grp = $_POST['grp'];
$date = $_POST['date'];
$time = $_POST['time'];

echo $grp."<br>";
echo $date."<br>";
echo $time."<br>";

$sql1 = "SELECT * FROM schedule WHERE date= '$date' &&  time= $time && std_group= $grp";
$result1 = mysqli_query($con, $sql1) or die("View erorr!!");

if ($num1 = mysqli_num_rows($result1) > 0) {

    header("location:../scheduleDay.php?msg=This student group have reserved this time");
}

else{
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
            header("location:../roomSchedule.php?msg=Successfully Reserved");
        }

        else{
            // header("location:../lecturer.php?msg=Reservation Failed");
        }
    }
}

/*
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
        header("location:../roomSchedule.php?msg=Successfully Reserved");
    }

    else{
       // header("location:../lecturer.php?msg=Reservation Failed");
    }
}

*/
?>



