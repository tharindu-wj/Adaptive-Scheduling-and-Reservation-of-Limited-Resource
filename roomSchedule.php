<?php
session_start();
require 'models/connection.php';
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
                        View Schedule  <small>Search by Lecture Room</small>
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
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>  <?php

                                $id = $_POST['r_id']; echo "Lecture Room : ".$id; ?></h3>
                        </div>
                        <div class="panel-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="type">Enter Room Id:</label>
                            <select class="form-control" id="r_id" name="r_id">
                                <option value="2" selected>L10</option>
                                <option value="3">L8</option>
                                <option value="4">L11</option>
                                <option value="7">CS LAB</option>
                                <option value="1">ICT LAB</option>

                            </select>
                        </div>
                        <button type="submit" name="search" class="btn btn-success btn-block" ><span class="glyphicon glyphicon-search"></span> &nbsp; Search </button>
                    </form>
                    <br>



                    <table class="table table-bordered table-hover" style ="border: 1px solid black;">
                        <tr>
                            <th class ="danger"> Timeslot </th>
                            <th class ="danger"> Monday </th>
                            <th class ="danger"> Tuesday </td>
                            <th class ="danger"> Wednesday </th>
                            <th class ="danger"> Thursday </th>
                            <th class ="danger"> Friday </th>
                        </tr>

                        <?php
                        include "models/viewSchedule.php";

                        $obj = new ViewSchedule;
                        /*function viewSchedule($id,$time,$date){

                            $sql = "SELECT * FROM schedule WHERE r_id='$id' && time='$time' && date='$date' ";
                            $result = mysqli_query($con, $sql) or die("View erorr!!");

                            if($num = mysqli_num_rows($result) > 0 )
                            {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    //echo $row["u_id"];
                                    echo $row["s_code"];


                                }
                            }

                        } */
                        ?>

                        <tr class="success">

                            <td class ="success"> 8.00-9.00 A.M</td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'8','monday');
                                ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'8','tuesday');
                                ?>


                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'8','wednesday');
                                ?>


                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'8','thursday');
                                ?>

                            </td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'8','friday');
                                ?>
                            </td>

                        </tr>

                        <tr class="success">
                            <td class ="success"> 9.00-10.00 A.M</td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'9','monday');
                                 ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'9','tuesday'); ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'9','wednesday'); ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'9','thursday'); ?>
                            </td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'9','friday');
                                 ?>
                            </td>
                        </tr>

                        <tr class="success">
                            <td class ="success"> 10.00-11.00 A.M</td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'10','monday'); ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'10','tuesday'); ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'10','wednesday'); ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'10','thursday'); ?>
                            </td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'10','friday'); ?>
                            </td>
                        </tr>

                        <tr class="success">
                            <td class ="success"> 11.00-12.00 A.M</td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'11','monday'); ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'11','tuesday'); ?>   </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'11','wednesday'); ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'11','thursday'); ?>
                            </td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'11','friday'); ?>
                            </td>
                        </tr>

                        <tr class="danger">
                            <th class ="danger" colspan="6"> <center>Lunch Break </center> </th>

                        </tr>

                        <tr class="success">

                            <td class ="success"> 1.00-2.00 P.M</td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'13','monday');
                                ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'13','tuesday');
                                ?>


                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'13','wednesday');
                                ?>


                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'13','thursday');
                                ?>

                            </td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'13','friday');
                                ?>
                            </td>

                        </tr>

                        <tr class="success">
                            <td class ="success"> 2.00-3.00 P.M</td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'14','monday');
                                ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'14','tuesday'); ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'14','wednesday'); ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'14','thursday'); ?>
                            </td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'14','friday');
                                ?>
                            </td>
                        </tr>

                        <tr class="success">
                            <td class ="success"> 3.00-4.00 P.M</td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'15','monday'); ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'15','tuesday'); ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'15','wednesday'); ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'15','thursday'); ?>
                            </td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'15','friday'); ?>
                            </td>
                        </tr>

                        <tr class="success">
                            <td class ="success"> 4.00-5.00 P.M</td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'16','monday'); ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'16','tuesday'); ?>   </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'16','wednesday'); ?>
                            </td>

                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'16','thursday'); ?>
                            </td>
                            <td class ="success">
                                <?php
                                $obj->view_schedule($id,'16','friday'); ?>
                            </td>
                        </tr>




                    </table>


                </div>
                    </div>
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
