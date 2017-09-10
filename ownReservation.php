<?php
session_start();
$lec_id = $_SESSION['username'];
require 'models/connection.php';
if(isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Adaptive Scheduling</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'template\navigation.php';?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        View Own Reservations  <small></small>
                    </h1>

                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if(isset($_GET["msg"])){ ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php $msg = $_GET['msg'];
                        echo $msg;

                        }
                        ?>
                    </div>



                </div>
            </div>

            <!-- /.row -->

            <div class="row content">
                <div class="col-sm-1 text-left"></div>
                <div class="col-sm-10 text-left">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> My Reservations</h3>
                        </div>
                        <div class="panel-body">


                            <?php
                            $sql = "SELECT * FROM schedule WHERE u_id= '$lec_id' && date='monday' ";
                            $result = mysqli_query($con, $sql) or die("View erorr!!");
                            ?>


                            <table class="table">
                                <tr class="danger">
                                    <th colspan="4"> <center >Monday </center> </th>
                                </tr>
                                <tr class="danger">

                                    <th> Time </th>
                                    <th> Lecture Room </th>
                                    <th> Subject </th>
                                    <th> &nbsp;</th>
                                </tr>
                                <?php
                                if($num = mysqli_num_rows($result) > 0 )
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {

                                        $del_id = $row["r_id"];

                                        ?>
                                        <tr class="success">

                                            <td> <?php echo $row["time"]." A.M" ?> </td>

                                            <td><?php $rm =  $row["r_id"];


                                                $sql2 = "SELECT * FROM room WHERE r_id = $rm";
                                                $result2 = mysqli_query($con, $sql2) or die("View erorr!!");

                                                if ($num1 = mysqli_num_rows($result2) > 0) {
                                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                                        echo $row2["r_name"];
                                                    }
                                                }
                                                ?>
                                            </td>

                                            <td> <?php echo $row["s_code"] ?> </td>
                                            <td> <a href="models/schedule_delete.php?delete=1&id=<?php echo $row["id"]; ?>
                                                                    "> <button type="button" class="btn btn-default"> Cancel </button> </a> </td>


                                        </tr>

                                        <?php
                                    }
                                }

                                else
                                {

                                }
                                ?>

                            </table>

                            <?php
                            $sql = "SELECT * FROM schedule WHERE u_id= '$lec_id' && date='tuesday' ";
                            $result = mysqli_query($con, $sql) or die("View erorr!!");
                            ?>


                            <table class="table">
                                <tr class="danger">
                                    <th colspan="4"> <center >Tuesday </center> </th>
                                </tr>
                                <tr class="danger">

                                    <th> Time </th>
                                    <th> Lecture Room </th>
                                    <th> Subject </th>
                                    <th> &nbsp;</th>
                                </tr>
                                <?php
                                if($num = mysqli_num_rows($result) > 0 )
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {

                                        $del_id = $row["r_id"];

                                        ?>
                                        <tr class="success">

                                            <td> <?php echo $row["time"." A.M"] ?> </td>
                                            <td><?php $rm =  $row["r_id"];


                                                $sql2 = "SELECT * FROM room WHERE r_id = $rm";
                                                $result2 = mysqli_query($con, $sql2) or die("View erorr!!");

                                                if ($num1 = mysqli_num_rows($result2) > 0) {
                                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                                        echo $row2["r_name"];
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td> <?php echo $row["s_code"] ?> </td>
                                            <td> <a href="models/schedule_delete.php?delete=1&id=<?php echo $row["id"]; ?>
                                                                    "> <button type="button" class="btn btn-default"> Cancel </button> </a> </td>


                                        </tr>

                                        <?php
                                    }
                                }

                                else
                                {

                                }
                                ?>

                            </table>


                            <?php
                            $sql = "SELECT * FROM schedule WHERE u_id='$lec_id' && date='wednesday' ";
                            $result = mysqli_query($con, $sql) or die("View erorr!!");
                            ?>


                            <table class="table">
                                <tr class="danger">
                                    <th colspan="4"> <center >Wednesday </center> </th>
                                </tr>
                                <tr class="danger">

                                    <th> Time </th>
                                    <th> Lecture Room </th>
                                    <th> Subject </th>
                                    <th> &nbsp;</th>
                                </tr>
                                <?php
                                if($num = mysqli_num_rows($result) > 0 )
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {

                                        $del_id = $row["r_id"];

                                        ?>
                                        <tr class="success">

                                            <td> <?php echo $row["time"]." A.M" ?> </td>


                                            <td><?php $rm =  $row["r_id"];


                                                $sql2 = "SELECT * FROM room WHERE r_id = $rm";
                                                $result2 = mysqli_query($con, $sql2) or die("View erorr!!");

                                                if ($num1 = mysqli_num_rows($result2) > 0) {
                                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                                        echo $row2["r_name"];
                                                    }
                                                }
                                                ?>
                                            </td>

                                            <td> <?php echo $row["s_code"] ?> </td>
                                            <td> <a href="models/schedule_delete.php?delete=1&id=<?php echo $row["id"]; ?>
                                                                    "> <button type="button" class="btn btn-default"> Cancel </button> </a> </td>


                                        </tr>

                                        <?php
                                    }
                                }

                                else
                                {

                                }
                                ?>

                            </table>



                            <?php
                            $sql = "SELECT * FROM schedule WHERE u_id='$lec_id' && date='thursday' ";
                            $result = mysqli_query($con, $sql) or die("View erorr!!");
                            ?>


                            <table class="table">
                                <tr class="danger">
                                    <th colspan="4"> <center >Thursday </center> </th>
                                </tr>
                                <tr class="danger">

                                    <th> Time </th>
                                    <th> Lecture Room </th>
                                    <th> Subject </th>
                                    <th> &nbsp;</th>
                                </tr>
                                <?php
                                if($num = mysqli_num_rows($result) > 0 )
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {

                                        $del_id = $row["r_id"];

                                        ?>
                                        <tr class="success">

                                            <td> <?php echo $row["time"." A.M"] ?> </td>
                                            <td><?php $rm =  $row["r_id"];


                                                $sql2 = "SELECT * FROM room WHERE r_id = $rm";
                                                $result2 = mysqli_query($con, $sql2) or die("View erorr!!");

                                                if ($num1 = mysqli_num_rows($result2) > 0) {
                                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                                        echo $row2["r_name"];
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td> <?php echo $row["s_code"] ?> </td>
                                            <td> <a href="models/schedule_delete.php?delete=1&id=<?php echo $row["id"]; ?>
                                                                    "> <button type="button" class="btn btn-default"> Cancel </button> </a> </td>


                                        </tr>

                                        <?php
                                    }
                                }

                                else
                                {

                                }
                                ?>

                            </table>


                            <?php
                            $sql = "SELECT * FROM schedule WHERE u_id='$lec_id' && date='friday' ";
                            $result = mysqli_query($con, $sql) or die("View erorr!!");
                            ?>


                            <table class="table">
                                <tr class="danger">
                                    <th colspan="4"> <center >Friday </center> </th>
                                </tr>
                                <tr class="danger">

                                    <th> Time </th>
                                    <th> Lecture Room </th>
                                    <th> Subject </th>
                                    <th> &nbsp;</th>
                                </tr>
                                <?php
                                if($num = mysqli_num_rows($result) > 0 )
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {

                                        $del_id = $row["r_id"];

                                        ?>
                                        <tr class="success">

                                            <td> <?php echo $row["time"]." A.M" ?> </td>
                                            <td><?php $rm =  $row["r_id"];


                                                $sql2 = "SELECT * FROM room WHERE r_id = $rm";
                                                $result2 = mysqli_query($con, $sql2) or die("View erorr!!");

                                                if ($num1 = mysqli_num_rows($result2) > 0) {
                                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                                        echo $row2["r_name"];
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td> <?php echo $row["s_code"] ?> </td>
                                            <td> <a href="models/schedule_delete.php?delete=1&id=<?php echo $row["id"]; ?>
                                                                    "> <button type="button" class="btn btn-default"> Cancel </button> </a> </td>


                                        </tr>

                                        <?php
                                    }
                                }

                                else
                                {
                                }
                                ?>

                            </table>





                        </div>
                    </div>
                </div>

                <div class="col-sm-1 text-left"></div>
            </div>


            <div class="col-sm-1 text-left"></div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
    <?php
}

else{
    $_SESSION['msg'] = "Login to continue";
    header('location:login.php');
    echo $_SESSION['msg'];
}
?>