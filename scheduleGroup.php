<?php
session_start();
require 'models/connect.php';
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
                        Find Free Slot  <small>Search by student group</small>
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
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Find Free Timeslot</h3>
                        </div>
                        <div class="panel-body">
                            <form action="#" method="post">
                                <?php
                                if(isset($_POST["search"]))
                                {
                                    $date_s=$_POST["date_s"];
                                    $time_s=$_POST["time_s"];
                                }
                                else
                                {
                                    $date_s="";
                                    $time_s="";
                                }
                                ?>
                                <div class="form-group">
                                    <label>Student Group</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                                        <select class="form-control" id="g_id" name="g_id">
                                            <option value="1" selected>1st year 1st semester</option>
                                            <option value="2">2nd year 1st semester</option>
                                            <option value="3">3rd year 1st semester</option>
                                            <option value="4">3rd year 2nd semester</option>

                                        </select>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label>Duration</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-time"></span></div>
                                        <select class="form-control" id="g_id" name="g_id">
                                            <option value="1" selected>1 Hour</option>
                                            <option value="2">2 Hour</option>
                                            <option value="3">3 Hour</option>
                                            <option value="4">4 Hour</option>

                                        </select>
                                    </div>
                                </div>


                                <input type="submit" name="search" class="form-control btn btn-primary" value="Search"/>


                            </form> <br>





                        </div>
                    </div>
                </div>

                <div class="col-sm-1 text-left"></div>
            </div>

            <hr>
            <div class="row content">
                <div class="col-sm-1 text-left"></div>
                <div class="col-sm-10 text-left">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>  Free Timeslots</h3>
                        </div>
                        <div class="panel-body">

                            <?php
                            if(isset($_POST["search"]))
                            {

                                $date_s=$_POST["date_s"];
                                $time_s=$_POST["time_s"];

                                function skip_row($r_id, $date_s, $time_s){

                                    $query=mysql_query("SELECT COUNT(*) FROM `schedule` WHERE date='".$date_s."' ANd time='".$time_s."' AND r_id='".$r_id."'");

                                    $count=mysql_fetch_array($query);

                                    $count=$count[0];

                                }
                                ?>


                                <div class="table-responsive " style="">
                                    <table class="table table-bordered" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>
                                                Classroom
                                            </th>
                                            <th>
                                                Building
                                            </th>
                                            <th>
                                                Type
                                            </th>
                                            <th>
                                                Condition
                                            </th>
                                            <th>
                                                Max capacity
                                            </th>
                                            <th>
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <?php
                                        $query_ac=mysqli_query($con, "SELECT * FROM `classroom` WHERE AC='A/C'");
                                        $query_n=mysqli_query($con, "SELECT * FROM `classroom` WHERE AC='Non_A/C'");

                                        while($row_ac=mysqli_fetch_array($query_ac)){

                                            $r_id=$row_ac["r_id"];

                                            //$s_count=skip_row($r_id, $date_s, $time_s);

                                            $query=mysqli_query($con, "SELECT COUNT(*) FROM `schedule` WHERE date='".$date_s."' ANd time='".$time_s."' AND r_id='".$r_id."'");

                                            $count=mysqli_fetch_array($query);

                                            $s_count=$count[0];

                                            if($s_count){
                                                continue;
                                            }

                                            ?>

                                            <tr class="table_info">
                                                <td>
                                                    <?php echo $row_ac["r_id"]; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row_ac["b_id"]; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row_ac["type"]; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row_ac["AC"]; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row_ac["capacity"]; ?>
                                                </td>

                                                <td>
                                                    <form action="shec.php" method="post">
                                                        <input type="hidden" name="class" value="<?php echo $row_ac["r_id"]; ?>"/>
                                                        <input type="hidden" name="date_s" value="<?php echo $date_s; ?>"/>
                                                        <input type="hidden" name="time_s" value="<?php echo $time_s; ?>"/>
                                                        <input type="hidden" name="search" value="search"/>
                                                        <input type="hidden" name="type" value="<?php echo $row_ac["type"]; ?>"/>
                                                        <input type="hidden" name="AC" value="<?php echo $row_ac["AC"]; ?>"/>
                                                        <input type="hidden" name="capacity" value="<?php echo $row_ac["capacity"]; ?>"/>

                                                        <input type="hidden" name="date_s" value="<?php echo $date_s; ?>"/>

                                                        <input type="hidden" name="time_s" value="<?php echo $time_s; ?>" />

                                                        <input type="submit" name="select" value="Select" class="btn btn-success"/>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }

                                        while($row_ac=mysqli_fetch_array($query_n)){

                                            $query=mysqli_query($con, "SELECT COUNT(*) FROM `schedule` WHERE date='".$date_s."' ANd time='".$time_s."' AND r_id='".$r_id."'");

                                            $count=mysqli_fetch_array($query);

                                            $s_count=$count[0];

                                            if($s_count){
                                                continue;
                                            }

                                            ?>
                                            <tr class="table_info">
                                                <td>
                                                    <?php echo $row_ac["r_id"]; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row_ac["b_id"]; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row_ac["type"]; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row_ac["AC"]; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row_ac["capacity"]; ?>
                                                </td>

                                                <td>
                                                    <form action="shec.php" method="post">
                                                        <input type="hidden" name="class" value="<?php echo $row_ac["r_id"]; ?>"/>
                                                        <input type="hidden" name="date_s" value="<?php echo $date_s; ?>"/>
                                                        <input type="hidden" name="time_s" value="<?php echo $time_s; ?>"/>
                                                        <input type="hidden" name="search" value="search"/>
                                                        <input type="hidden" name="type" value="<?php echo $row_ac["type"]; ?>"/>
                                                        <input type="hidden" name="AC" value="<?php echo $row_ac["AC"]; ?>"/>
                                                        <input type="hidden" name="capacity" value="<?php echo $row_ac["capacity"]; ?>"/>

                                                        <input type="hidden" name="date_s" value="<?php echo $date_s; ?>"/>

                                                        <input type="hidden" name="time_s" value="<?php echo $time_s; ?>" />

                                                        <input type="submit" name="select" value="Select" class="btn btn-success"/>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }


                                        ?>

                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                        </tr>




                                        </tbody>


                                    </table>
                                </div>


                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="col-lg-12" style="min-height:242px;">
                                    <div class="alert alert-danger">Please select a Date and Time</div>
                                </div>
                                <?php
                            }
                            ?>

                            <div class="col-sm-1 text-left"></div>
                            <div class="col-sm-2 text-left"></div>
                        </div>
                        <br>





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
