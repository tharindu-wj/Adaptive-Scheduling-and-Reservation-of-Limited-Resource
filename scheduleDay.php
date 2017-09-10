<?php
session_start();
include "models/connect.php";
include "models/lecturerController.php";
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
                        Find Free Time Slots <small>Statistics Overview</small>
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


                        ?>
                            <script>
                                alert("Reservation Failed! This group reserved this time");
                                </script>
                        <?php
                        }
                        ?>
                    </div>



                </div>
            </div>

            <!-- /.row -->

            <div class="row">
                <div class="col-lg-1">
                </div>
                <div class="col-lg-10">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Select date & time</h3>
                        </div>
                        <div class="panel-body">
                             <form method="post" action="#">


                                    <div class="form-group">
                                        <label>Day</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                                            <select class="form-control" name="date_s">
                                                <option value="monday">Monday</option>
                                                <option value="tuesday">Tuesday</option>
                                                <option value="wednesday">Wednesday</option>
                                                <option value="thursday">Thursday</option>
                                                <option value="friday">Friday</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label>Time</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-time"></span></div>
                                            <select class="form-control" name="time_s">
                                                <option value="8" >8 A.M</option>
                                                <option value="9" >9 A.M</option>
                                                <option value="10" >10 A.M</option>
                                                <option value="11" >11 A.M</option>
                                                <option value="13" >1 P.M</option>
                                                <option value="14" >2 P.M</option>
                                                <option value="15" >3 P.M</option>
                                                <option value="16" >4 P.M</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Lecture Room Type</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
                                            <select class="form-control" name="type_s">
                                                <option value="true" >LAB</option>
                                                <option value="false" >Classroom</option>

                                            </select>
                                        </div>
                                    </div>




                                    <input type="submit" name="search" class="form-control btn btn-primary" value="Search"/>

                            </form>


                        </div>

                    </div>

                </div>
                <div class="col-lg-1">
                </div>
            </div>
            <!-- /.row -->
            <hr>
            <div class="row">
                <div class="col-lg-1">
                </div>
                <div class="col-lg-10">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Free Slots</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">

                                <tr class="success">
                                    <th >Classroom</th>
                                    <th>Building</th>
                                    <th>Capacity</th>
                                    <th>Type</th>
                                    <th>&nbsp;Condition</th>
                                    <th>&nbsp;Department </th>
                                    <th> </th>

                                </tr>
                                <?php
                                if(isset($_POST["search"])) {
                                    $date = $_POST['date_s'];
                                    $time = $_POST['time_s'];
                                    //$myrow = $obj->view_record("std_group");
                                    $sql = "SELECT * FROM project.room WHERE r_id NOT IN
                                        (
                                          SELECT p2r.r_id FROM project.room p2r
                                          INNER JOIN project.schedule p2s
                                          ON p2r.r_id = p2s.r_id
                                          WHERE p2s.date = '$date' 
                                          AND p2s.time = $time
                                          
                                          
                                        )";
                                    $result = mysqli_query($con, $sql) or die("View erorr!!");

                                    if ($num = mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            ?>
                                            <tr>
                                                <td><?php echo $row["r_name"]; ?></td>
                                                <td><?php
                                                    $b_id = $row["b_id"];
                                                    $sql1 = "SELECT * FROM building WHERE b_id = $b_id";
                                                    $result1 = mysqli_query($con, $sql1) or die("View erorr!!");

                                                    if ($num1 = mysqli_num_rows($result1) > 0) {
                                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                                            echo $row1["b_name"];
                                                        }
                                                    }
                                                    ?></td>
                                                <td><?php echo $row["capacity"]; ?></td>
                                                <td><?php if ($row["LAB"]=="true") { echo "LAB";}
                                                            else if ($row["LAB"]=="false") { echo "Classroom";}

                                                    ?></td>
                                                <td><?php $ac =  $row["AC"];
                                                    if($ac=="true"){echo "A/C";}
                                                    else if($ac=="false"){echo "None A/C";}
                                                    ?></td>
                                                <td><?php $dept =  $row["dept_id"];


                                                    $sql2 = "SELECT * FROM department WHERE dept_id = $dept";
                                                    $result2 = mysqli_query($con, $sql2) or die("View erorr!!");

                                                    if ($num1 = mysqli_num_rows($result2) > 0) {
                                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                                            echo $row2["dept_name"];
                                                        }
                                                    }
                                                    ?>
                                                    </td>

                                                <td>
                                                    <a href="booking3.php?id=<?php echo $row["r_id"]; ?> &time=<?php echo $time; ?> &date=<?php echo $date; ?>"
                                                    <button type="button" class="btn btn-default">Book</button>
                                                    </a></td>

                                            </tr>

                                            <?php
                                        }
                                    }
                                }
                                else{
                                    ?>

                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                   <?php
                                    echo "Select Date and Time";



                                }
                                ?>

                                </div>

                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-lg-1">
                </div>

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