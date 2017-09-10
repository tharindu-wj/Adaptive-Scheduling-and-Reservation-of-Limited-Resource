<?php
session_start();
include "models/roomController.php";

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
                        Generate Schedule
                    </h1>

                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">

                    <?php
                    //$_GET['button1'] = "";

                    if($_GET['button1']){fun1();}


                    function fun1()
                    {
                        shell_exec("java -jar Timetable.jar");
                        //$file = fopen("timetable.csv","r");

                    }


                    if(isset($_GET["button1"])){ ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Timetable Generated! <br>

                        <a href="generate_view.php" class="btn btn-info btn-block">
                            <span class="glyphicon glyphicon-home"></span> &nbsp; &nbsp; View Generated Schedule
                        </a> <br>
<?php
                        }


                        ?>
                    </div>



                </div>
            </div>

            <!-- /.row -->

            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Generate Timetable</h3>
                        </div>
                        <div class="panel-body">
                            <br>
                            <button id="btnfun1" class="btn-lg btn-success btn-block" name="btnfun1" onClick='location.href="?button1=1"'>Generate Schedule</button>

<br> <br>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                    40%
                                </div>
                            </div>

                            <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
                        </div>

                    </div>

                </div>
                <div class="col-lg-2">
                </div>
            </div>
            <!-- /.row -->



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
